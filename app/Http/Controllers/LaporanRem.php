<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Helpers;
use Illuminate\Support\Facades\URL;
use PhpParser\Builder\Function_;

class LaporanRem extends Controller
{
    public function test_message($param)
    {
        $pesan = "Hallo
ini testing apakah bisa enter
juga link
https://formsliving.com";
        sendWhatsappMessage(
            "082229997190",
            "6281227476463",
            $pesan
        );

        $simpen = url::current();
        return ($simpen);
    }
}
