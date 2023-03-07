<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SimpleQRcodeController extends Controller
{
    // L'action "generate" de la route "simple-qrcode" (GET)
    public function generate ($hash) {

        $response = Http::get('https://chart.apis.google.com/chart?', [
            'chs' => '180x180',
            'choe' => 'UTF-8',
            'cht' => 'qr',
            'chl' => $hash
        ]);

        Storage::put("qr-code/".$hash.".png",$response);

    }
}
