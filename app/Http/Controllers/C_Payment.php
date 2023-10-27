<?php

namespace App\Http\Controllers;

use App\Models\Projek;
use App\Models\UserAdmin;
use App\Models\UserMenu;
use App\Models\UserNotif;
use App\Models\UserProjek;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class C_Payment extends Controller
{
    public $userAdmin;
    public $userNotif;
    public $userProjek;

    public $projek;
    public $userMenu;
    public $job;
    public function __construct()
    {

        $this->userAdmin = new UserAdmin();
        $this->userNotif = new UserNotif();
        $this->userProjek = new UserProjek();

        $this->projek = new Projek();
        $this->userMenu = new UserMenu();
    }

    public function showPaymentForm()
    {


        // dd($getJob);
        if (session()->has('user')) {
            $user = $this->userAdmin->getUserKategoriWhere('user_admin.id_user_admin', '=', Session::get('user'));

            $projekUser = $this->userProjek->getProjectUserWhere('user_admin.id_user_admin', '=', session::get('user'));
            $getUserMenu = $this->userMenu->getUserMenuWhereArr('*', [
                'user_menu.status_um' => 'aktif',
                'user_menu.id_kategori' => $user->id_kategori,
            ])->collect();
            // dd($getUserMenu);
            $foundMatchingMenu = false;

            foreach ($getUserMenu as $menu) {
                if ($menu->url_menu == request()->segment(1)) {
                    $foundMatchingMenu = true;
                    break;
                }
            }

            return view('V_admin.dokuTest',
                compact(
                    'user',
                    'projekUser',

                    'getUserMenu'

                )
            );
        } else {
            return redirect('/login');
        }

    }

    public function generatePayment(Request $request)
    {
        // Get the form data from the request
        $amount = $request->input('amount');
        $expiredTime = 10080;
        $customerName = $request->input('customerName');
        $email = $request->input('email');
        $phoneNumber = $request->input('phoneNumber');
        $address = $request->input('address');
        $country = $request->input('country');

        // Fetch DOKU credentials from .env
        $mallId = env('DOKU_MALL_ID');
        $sharedKey = env('DOKU_SHARED_KEY');
        $isSandbox = env('DOKU_SANDBOX');

        // DOKU API endpoint (sandbox or production)
        $apiBaseUrl = $isSandbox ? 'https://sandbox.doku.com' : 'https://api.doku.com';

        // Construct the request payload
        $requestBody = [
            'order' => [
                'amount' => $amount,
                'invoice_number' => 'INV-' . rand(1, 10000),
                'currency' => 'IDR',
                'callback_url' => 'https://merchant.com/return-url',
                'line_items' => [
                    [
                        'name' => 'DOKU Plate',
                        'price' => $amount,
                        'quantity' => 1,
                    ],
                ],
            ],
            'payment' => [
                'payment_due_date' => $expiredTime,
            ],
            'customer' => [
                'id' => 'CUST-' . rand(1, 1000),
                'name' => $customerName,
                'email' => $email,
                'phone' => $phoneNumber,
                'address' => $address,
                'country' => $country,
            ],
        ];

        // Generate request headers
        $clientId = $mallId;
        $requestId = rand(1, 100000000);
        $dateTime = gmdate('Y-m-d H:i:s');
        $isoDateTime = date(DATE_ISO8601, strtotime($dateTime));
        $dateTimeFinal = substr($isoDateTime, 0, 19) . 'Z';

        // Generate digest
        $digestValue = base64_encode(hash('sha256', json_encode($requestBody), true));

        // Prepare signature component
        $componentSignature = "Client-Id:" . $clientId . "\n" .
            "Request-Id:" . $requestId . "\n" .
            "Request-Timestamp:" . $dateTimeFinal . "\n" .
            "Request-Target:/checkout/v2/payment" . "\n" .
            "Digest:" . $digestValue;

        // Generate signature
        $signature = base64_encode(hash_hmac('sha256', $componentSignature, $sharedKey, true));

        // Construct the final URL
        $url = $apiBaseUrl . '/checkout/v2/payment';

        // Create a Guzzle HTTP client
        $client = new Client();

        // Make a POST request to DOKU API
        $response = $client->post($url, [
            'json' => $requestBody,
            'headers' => [
                'Content-Type' => 'application/json',
                'Client-Id' => $clientId,
                'Request-Id' => $requestId,
                'Request-Timestamp' => $dateTimeFinal,
                'Signature' => 'HMACSHA256=' . $signature,
            ],
        ]);
        $dataDoku = array(
            'Request-Id' => $requestId
        );
        // Get the response as JSON
        $responseJson = $response->getBody()->getContents();
        array_push($dataDoku,$responseJson);
        $dataTest = json_decode($dataDoku[0], true);
        dd($dataTest['payment']['url']);


        // $apiEndpoint = 'https://api.doku.com/orders/v2/status/' . $requestId;

        // // Fetch DOKU credentials from .env


        // // Make a GET request to DOKU API
        // $responseStatus = $client->get($apiEndpoint, [
        //     'json' => $requestBody,
        //     'headers' => [
        //         'Content-Type' => 'application/json',
        //         'Client-Id' => $clientId,
        //         'Request-Id' => $requestId,
        //         'Request-Timestamp' => $dateTimeFinal,
        //         'Signature' => 'HMACSHA256=' . $signature,
        //     ],
        // ]);

        // // Get the response as JSON
        // $responseJsonStatus = $responseStatus->getBody()->getContents();
        // Return the response to the view
        return view('V_admin/dokuTry', ['response' => $responseJson]);
    }

    public function checkPaymentStatus()
    {
        // Check the payment status here
        // You can query your database or make an API call to DOKU to check the status
        $paymentStatus = "https://api.doku.com/orders/v1/status/";// Implement your logic to check the status;

        return response()->json(['status' => $paymentStatus]);
    }


    // public function generatePayment(Request $request)
    // {
    //     // Replace with your DOKU sandbox credentials
    //     $amount = $request->input('amount');
    //     $expiredTime = $request->input('expiredTime');
    //     $customerName = $request->input('customerName');
    //     $email = $request->input('email');
    //     $phoneNumber = $request->input('phoneNumber');
    //     $address = $request->input('address');
    //     $country = $request->input('country');
    //     $clientId = $request->input('clientId');
    //     $sharedKey = $request->input('sharedKey');
    //     $expiredTime = 1;
    //     $requestBody = [
    //         'order' => [
    //             'amount' => $amount,
    //             'invoice_number' => 'INV-' . rand(1, 10000),
    //             'currency' => 'IDR',
    //             'callback_url' => 'https://merchant.com/return-url',
    //             'line_items' => [
    //                 [
    //                     'name' => 'DOKU Plate',
    //                     'price' => $amount,
    //                     'quantity' => 1,
    //                 ],
    //             ],
    //         ],
    //         'payment' => [
    //             'payment_due_date' => $expiredTime,
    //         ],
    //         'customer' => [
    //             'id' => 'CUST-' . rand(1, 1000),
    //             'name' => $customerName,
    //             'email' => $email,
    //             'phone' => $phoneNumber,
    //             'address' => $address,
    //             'country' => $country,
    //         ],
    //     ];
    //     // dd($requestBody);

    //     $requestId = rand(1, 100000);
    //     $dateTime = gmdate('Y-m-d H:i:s');
    //     $isoDateTime = date(DATE_ISO8601, strtotime($dateTime));
    //     $dateTimeFinal = substr($isoDateTime, 0, 19) . 'Z';

    //     $getUrl = 'https://api-sandbox.doku.com';
    //     $targetPath = '/checkout/v2/payment';
    //     $url = $getUrl . $targetPath;

    //     $digestValue = base64_encode(hash('sha256', json_encode($requestBody), true));

    //     $componentSignature = "Client-Id:" . $clientId . "\n" .
    //         "Request-Id:" . $requestId . "\n" .
    //         "Request-Timestamp:" . $dateTimeFinal . "\n" .
    //         "Request-Target:" . $targetPath . "\n" .
    //         "Digest:" . $digestValue;

    //     $signature = base64_encode(hash_hmac('sha256', $componentSignature, $sharedKey, true));

    //     $ch = curl_init($url);

    //     $headers = [
    //         'Content-Type: application/json',
    //         'Client-Id: ' . $clientId,
    //         'Request-Id: ' . $requestId,
    //         'Request-Timestamp: ' . $dateTimeFinal,
    //         'Signature: HMACSHA256=' . $signature,
    //     ];

    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    //     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestBody));
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //     curl_setopt($ch, CURLOPT_HTTPHEADER, [
    //         'Content-Type: application/json',
    //         'Client-Id: ' . $clientId,
    //         'Request-Id: ' . $requestId,
    //         'Request-Timestamp: ' . $dateTimeFinal,
    //         'Signature: HMACSHA256=' . $signature,
    //     ]);

    //     $responseJson = curl_exec($ch);
    //     $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    //     curl_close($ch);

    //     // Return the response as JSON
    //     if (is_string($responseJson) && $httpCode == 200) {
    //         return response($responseJson, 200)->header('Content-Type', 'application/json');
    //     } else {
    //         return response($responseJson, $httpCode)->header('Content-Type', 'application/json');
    //     }
    // }
}
