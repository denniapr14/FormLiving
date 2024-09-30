<?php

use Illuminate\Support\Facades\Http;



if (!function_exists('rupiah')) {
    function rupiah($angka)
    {
        $hasil_rupiah = number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }
}

if (!function_exists('penyebut')) {
    function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = ['', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh', 'sebelas'];
        $temp = '';
        if ($nilai < 12) {
            $temp = ' ' . $huruf[$nilai];
        } elseif ($nilai < 20) {
            $temp = penyebut($nilai - 10) . ' belas';
        } elseif ($nilai < 100) {
            $temp = penyebut($nilai / 10) . ' puluh' . penyebut($nilai % 10);
        } elseif ($nilai < 200) {
            $temp = ' seratus' . penyebut($nilai - 100);
        } elseif ($nilai < 1000) {
            $temp = penyebut($nilai / 100) . ' ratus' . penyebut($nilai % 100);
        } elseif ($nilai < 2000) {
            $temp = ' seribu' . penyebut($nilai - 1000);
        } elseif ($nilai < 1000000) {
            $temp = penyebut($nilai / 1000) . ' ribu' . penyebut($nilai % 1000);
        } elseif ($nilai < 1000000000) {
            $temp = penyebut($nilai / 1000000) . ' juta' . penyebut($nilai % 1000000);
        } elseif ($nilai < 1000000000000) {
            $temp = penyebut($nilai / 1000000000) . ' milyar' . penyebut(fmod($nilai, 1000000000));
        } elseif ($nilai < 1000000000000000) {
            $temp = penyebut($nilai / 1000000000000) . ' trilyun' . penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }
}

if (!function_exists('terbilang')) {
    function terbilang($nilai)
    {
        if ($nilai < 0) {
            $hasil = 'minus ' . trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }
        return $hasil;
    }
}

if (!function_exists('tgl_indo')) {
    function tgl_indo($tanggal)
    {
        $bulan = [
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        ];
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }
}

function round_up($value, $precision)
{
    $pow = pow(10, $precision);
    return (ceil($pow * $value) + ceil($pow * $value - ceil($pow * $value))) / $pow;
}

function RandomCode($counter, $projek)
{

    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'; // Define the characters to use
    $randomString = '';

    // Generate a random code of length 2 (you can adjust the length as needed)
    for ($i = 0; $i < $counter; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    $kodePromo = "";
    switch ($projek) {
        case 'Greenland':
            $kodePromo = 'GL' .  $randomString;
            break;

        case "Kalm":
            $kodePromo = 'KR' .  $randomString;
            break;
    }
    return $kodePromo;
}

if (!function_exists('sendWhatsappMessage')) {
    function sendWhatsappMessage($from, $number, $message)
    {
        $apiUrl = 'https://wa.srv18.wapanels.com/send-message';

        $data = [
            'api_key' => '1mRAXDdNpaDcYPnbetRdHvLgWqwWVR',
            'sender' => $from,
            'number' => $number,
            'message' => $message,
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
            ],
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
}

if (!function_exists('removePeriods')) {
    function removePeriods($number) {
        // Use str_replace to remove periods (.) from the number
        return str_replace('.', '', $number);
    }
}
