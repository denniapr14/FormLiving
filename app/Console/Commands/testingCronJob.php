<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserPelanggan;

class testingCronJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tambah:dataAswin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'mencoba menambahkan data Aswin per 5 menit';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = new UserPelanggan;
        $nama = "Aswin";
        $user->nama_plgn = $nama;
        $user->save();
    }
}