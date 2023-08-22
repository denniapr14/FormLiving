<?php

namespace App\Console\Commands;
use App\Models\PreOrder;
use App\Models\Rumah;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Mail\trialMail;
use Mail;

class testingEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testing:email';
    public $PreOrder;
    public $rumah;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Saya mencoba cronjobnya Laravel';

    public function __construct()
    {
        parent::__construct();
        $this->PreOrder = new PreOrder;
        $this->rumah = new Rumah;
    }
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $jamNow = Carbon::now();
        $dataPreOrder = $this->PreOrder->PreOrderRejected($jamNow);
        $dataUser;
        foreach ($dataPreOrder as $data) {
            $dataUser = $this->rumah->RumahPO($data->id_pre_order);
            
                $template = 'mail.mailPORejected';
                
                $dataEmail = [
                    'to' => $dataUser->email_plgn,
                    "subject" => "Forms Living Pre Order Kalm Residence Rejected",
                    "body" => "",
                    "id_rumah" => $dataUser->id_rumah,
                    'nama' => $dataUser->nama_plgn,
                    'blok' => $dataUser->blok,
                    'nomor' => $dataUser->nomor,
                    'harga' => $dataUser->index_po,
                    'status' => $dataUser->status_po,
                    'tipe' => $dataUser->tipe_booking_po,
                    'tgl_input' => $dataUser->tgl_input_po,
                    'expire' => $dataUser->expire_date,
                ];

                if ($dataUser->status == "KeepRefundable") {
                    DB::table('pre_order')
                ->where('id_rumah', $dataUser->id_rumah)
                ->update(
                    ['status' => 'Available']
                );
                }elseif($dataUser->status == "Keep"){
                    DB::table('rumah')
                    ->where('id_rumah', $dataUser->id_rumah)
                    ->update(
                        ['status' => 'KeepRefundable']
                    );
                }

                DB::table('pre_order')
                ->where('id_pre_order', $data->id_pre_order)
                ->update(
                    ['status_po' => 'rejected']
                );

                Mail::to('gaming2.ameliac@gmail.com')->send(new MailNotify($dataEmail,$template));
                $this->info('testing;email command run success');
            }
    }
}
