<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //
    public function index()
    {

        $details = [
            'title' => 'UPPD SAMSAT KANDANGAN',
            'body' => 'Pendaftaran Anda Telah Selesai'
        ];

        //nbelputra437@gmail.com adalah alamat tujuan email

        Mail::to('maukbnr15@gmail.com')->send(new SendEmail($details));

        echo "Email berhasil dikirim!";
    }
}
