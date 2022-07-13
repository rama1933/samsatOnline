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



        $date = date('Y-m-d');
        $date = strtotime($date);
        $date = strtotime("+7 day", $date);
        $after = date('d-m-Y', $date);
        // dd($after);
        $text = '';
        if ($data['status'] == 0) {
            $details = [
                'title' => 'UUPD SAMSAT KANDANGAN',
                'body' => 'Pendaftaran Anda sedang diverifikasi'
            ];
        }
        if ($data['status'] == 1) {
            $details = [
                'title' => 'UUPD SAMSAT KANDANGAN',
                'body' => 'Pendaftaran Formulir Pajak Kendaraan Bermotor Anda tanggal ' . $find['tanggal'] . ' sedang diproses.
                            Silahkan upload ulang berkas.
                            '
            ];
        }
        if ($data['status'] == 2) {
            $details = [
                'title' => 'UUPD SAMSAT KANDANGAN',
                'body' => 'Pendaftaran Formulir Pajak Kendaraan Bermotor Anda ' . $find['tanggal'] . ' telah selesai.
                           Silahkan datang ke Kantor SAMSAT Kandangan
                           untuk Melanjutkan proses
                           Pendaftaran Pajak Kendaraan Bermotor
                           pada Layanan 6
                           (pendaftaran berlaku 7hari kalender (tgl ' . date('d-m-Y') . ' - ' . $after . ')
'
            ];
        }


        Mail::to($bio['email'])->send(new SendEmail($details));
        return true;
    }
}
