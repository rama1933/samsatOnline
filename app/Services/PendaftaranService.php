<?php

namespace App\Services;

use App\Models\Pendaftaran;
use App\Models\TrxPendaftaran;
use App\Models\PendaftaranBalik;
use App\Models\PendaftaranKuasa;
use App\Models\Pendaftaran1tahun;
use App\Models\Pendaftaran5tahun;
use Illuminate\Support\Facades\DB;
use App\Models\PendaftaranDuplikat;
use App\Repositories\UploadRepository;

class PendaftaranService
{
    public function __construct()
    {
        //
        $this->repo = new UploadRepository;
    }

    public function getDataPendaftaran1tahun($id = null, $user_id = null)
    {
        if ($id === null && $user_id == null) {
            $data = Pendaftaran1tahun::with('biodata')->get();
        } elseif ($id === null && $user_id != null) {
            $data = Pendaftaran1tahun::where('user_id', $user_id)->get();
        } else {
            $data =  Pendaftaran1tahun::where('id', $id)->first();
        }
        return $data;
    }




    public static function storePendafataran1tahun(array $data)
    {

        $repo = new UploadRepository();
        $upload = $repo->uploadpendaftaran1tahun($data['ktp'], $data['pajak'], $data['stnk'], $data['bpkb']);

        $pendaftaran = Pendaftaran1tahun::create([
            "user_id" => $data['user_id'],
            "biodata_id" => $data['biodata_id'],
            "nopol" => $data['nopol'],
            "merk" => $data['merk'],
            "tahun" => $data['tahun'],
            "no_rangka" => $data['no_rangka'],
            "no_mesin" => $data['no_mesin'],
            "ktp" => $upload['ktp'],
            "pajak" => $upload['pajak'],
            "stnk" => $upload['stnk'],
            "bpkb" => $upload['bpkb'],
            "tanggal" =>  now(),
            "created_at" => now(),
            "updated_at" => now(),
        ]);
        return true;
    }

    public static function updatePendaftaran1tahun($id, array $data)
    {
        $find = Pendaftaran1tahun::find($id);
        $ser = new PendaftaranService;
        $val = $ser->getDataPendaftaran1tahun($id);
        if (!isset($data['ktp']) and !isset($data['stnk']) and !isset($data['pajak']) and !isset($data['bpkb'])) {
            $toward =
                [
                    "nopol" => $data['nopol'],
                    "merk" => $data['merk'],
                    "tahun" => $data['tahun'],
                    "no_rangka" => $data['no_rangka'],
                    "no_mesin" => $data['no_mesin'],
                    "tanggal" =>  now(),
                    "created_at" => now(),
                    "updated_at" => now(),
                ];

            $find->update($toward);
            return true;
        } else {
            $repo = new UploadRepository();
            if (!isset($data['ktp'])) {
                $ktp_data = null;
            } else {
                $ktp_data = $data['ktp'];
            }

            if (!isset($data['stnk'])) {
                $stnk_data = null;
            } else {
                $stnk_data = $data['stnk'];
            }

            if (!isset($data['pajak'])) {
                $pajak_data = null;
            } else {
                $pajak_data = $data['pajak'];
            }

            if (!isset($data['bpkb'])) {
                $bpkb_data = null;
            } else {
                $bpkb_data = $data['bpkb'];
            }

            $upload = $repo->uploadpendaftaran1tahun($ktp_data, $pajak_data, $stnk_data, $bpkb_data);
            if ($upload['ktp'] == 'kosong') {
                $ktp = $val->ktp;
            } else {
                $ktp = $upload['ktp'];
            }

            if ($upload['stnk'] == 'kosong') {
                $stnk = $val->stnk;
            } else {
                $stnk = $upload['stnk'];
            }

            if ($upload['pajak'] == 'kosong') {
                $pajak = $val->pajak;
            } else {
                $pajak = $upload['pajak'];
            }

            if ($upload['bpkb'] == 'kosong') {
                $bpkb = $val->bpkb;
            } else {
                $bpkb = $upload['bpkb'];
            }
            $toward =
                [
                    "nopol" => $data['nopol'],
                    "merk" => $data['merk'],
                    "tahun" => $data['tahun'],
                    "no_rangka" => $data['no_rangka'],
                    "no_mesin" => $data['no_mesin'],
                    "ktp" => $ktp,
                    "pajak" => $pajak,
                    "stnk" => $stnk,
                    "bpkb" => $bpkb,
                    "tanggal" =>  now(),
                    "created_at" => now(),
                    "updated_at" => now(),
                ];

            $find->update($toward);
            return true;
        }
    }

    public static function deleteDataPendaftaran1tahun($id)
    {
        try {
            Pendaftaran1tahun::find($id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
