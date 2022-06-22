<?php

namespace App\Services;

use App\Models\Pendaftaran;
use App\Models\TrxPendaftaran;
use App\Models\Pendaftaran1tahun;
use App\Models\Pendaftaran5tahun;
use App\Models\PendaftaranBalik;
use App\Models\PendaftaranDuplikat;
use App\Models\PendaftaranKuasa;
use App\Mail\SendEmail;
use App\Models\Biodata;
use Illuminate\Support\Facades\Mail;

class TrxPendaftaranService
{
    public function __construct()
    {
        //
    }

    public static function updateStatus($id, $type, array $data)
    {
        if ($type == '1tahun') {
            $find = Pendaftaran1tahun::find($id);
        }
        if ($type == '5tahun') {
            $find = Pendaftaran5tahun::find($id);
        }

        if ($type == 'kuasa') {
            $find = PendaftaranKuasa::find($id);
        }

        if ($type == 'duplikat') {
            $find = PendaftaranDuplikat::find($id);
        }

        if ($type == 'balik') {
            $find = PendaftaranBalik::find($id);
        }

        $toward =
            [
                "status" => $data['status'],
            ];
        $bio = Biodata::find($find['biodata_id']);
        $find->update($toward);



        $text = '';
        if ($data['status'] == 0) {
            $text = 'belum di verifikasi';
        }
        if ($data['status'] == 1) {
            $text = 'di proses';
        }
        if ($data['status'] == 2) {
            $text = 'Selesai';
        }

        $details = [
            'title' => 'UUPD SAMSAT KANDANGAN',
            'body' => 'Pendaftaran Anda Tanggal ' . $find['tanggal'] . ' Telah ' . $text . ''
        ];
        Mail::to($bio['email'])->send(new SendEmail($details));
        return true;
    }
}
