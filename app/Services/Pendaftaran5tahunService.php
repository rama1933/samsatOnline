<?php

namespace App\Services;

use App\Models\PendaftaranBalik;
use App\Models\PendaftaranKuasa;
use App\Models\Pendaftaran5tahun;
use App\Models\PendaftaranDuplikat;
use App\Services\PendaftaranService;
use App\Repositories\UploadRepository;

class Pendaftaran5tahunService
{
    public function __construct()
    {
        //
        $this->repo = new UploadRepository;
    }


    function getDataPendaftaran5tahun($id = null, $user_id = null)
    {
        if ($id === null && $user_id == null) {
            $data = Pendaftaran5tahun::with('biodata')->get();
        } elseif ($id === null && $user_id != null) {
            $data = Pendaftaran5tahun::where('user_id', $user_id)->get();
        } else {
            $data =  Pendaftaran5tahun::where('id', $id)->first();
        }
        return $data;
    }




    public static function storePendafataran5tahun(array $data)
    {

        $repo = new UploadRepository();
        $upload = $repo->uploadpendaftaran5tahun($data['ktp'], $data['pajak'], $data['stnk'], $data['bpkb'], $data['no_rangka_upload'], $data['no_mesin_upload']);

        $pendaftaran = Pendaftaran5tahun::create([
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
            "no_rangka_upload" => $upload['no_rangka_upload'],
            "no_mesin_upload" => $upload['no_mesin_upload'],
            "tanggal" =>  now(),
            "created_at" => now(),
            "updated_at" => now(),
        ]);
        return true;
    }

    public static function updatePendaftaran5tahun($id, array $data)
    {
        $find = Pendaftaran5tahun::find($id);
        $ser = new Pendaftaran5tahunService;
        $val = $ser->getDataPendaftaran5tahun($id);
        if (!isset($data['ktp']) and !isset($data['stnk']) and !isset($data['pajak']) and !isset($data['bpkb']) and !isset($data['no_rangka_upload']) and !isset($data['no_mesin_upload'])) {
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

            if (!isset($data['no_rangka_upload'])) {
                $no_rangka_upload_data = null;
            } else {
                $no_rangka_upload_data = $data['no_rangka_upload'];
            }

            if (!isset($data['no_mesin_upload'])) {
                $no_mesin_upload_data = null;
            } else {
                $no_mesin_upload_data = $data['no_mesin_upload'];
            }

            $upload = $repo->uploadpendaftaran5tahun($ktp_data, $pajak_data, $stnk_data, $bpkb_data, $no_rangka_upload_data, $no_mesin_upload_data);
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

            if ($upload['no_rangka_upload'] == 'kosong') {
                $no_rangka_upload = $val->no_rangka_upload;
            } else {
                $no_rangka_upload = $upload['no_rangka_upload'];
            }

            if ($upload['no_mesin_upload'] == 'kosong') {
                $no_mesin_upload = $val->no_mesin_upload;
            } else {
                $no_mesin_upload = $upload['no_mesin_upload'];
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
                    "no_rangka_upload" => $no_rangka_upload,
                    "no_mesin_upload" => $no_mesin_upload,
                    "tanggal" =>  now(),
                    "created_at" => now(),
                    "updated_at" => now(),
                ];

            $find->update($toward);
            return true;
        }
    }

    public static function deleteDataPendaftaran5tahun($id)
    {
        try {
            Pendaftaran5tahun::find($id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
