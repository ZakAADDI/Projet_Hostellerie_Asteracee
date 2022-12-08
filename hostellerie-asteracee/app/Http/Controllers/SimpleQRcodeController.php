<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SimpleQRcodeController extends Controller
{
    // L'action "generate" de la route "simple-qrcode" (GET)
    public function generate ($id) {

        $hash = \Hash::make($id);

        QrCode::size(300)->generate($hash, '../public/codes-qr/QR-site.svg');
    }
}
