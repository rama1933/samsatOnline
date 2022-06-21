<?php

namespace App\Services;

use App\Models\Pendaftaran;
use App\Models\TrxPendaftaran;
use App\Models\Pendaftaran1tahun;
use App\Models\Pendaftaran5tahun;
use App\Models\PendaftaranBalik;
use App\Models\PendaftaranDuplikat;
use App\Models\PendaftaranKuasa;

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

        $find->update($toward);
        return true;
    }
}
