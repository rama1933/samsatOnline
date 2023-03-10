<?php

namespace App\Services;

use App\Models\PendaftaranDuplikat;
use App\Repositories\UploadRepository;

class PendaftaranDuplikatService
{
    public function __construct()
    {
        //
        $this->repo = new UploadRepository;
    }


    function getDataPendaftaranDuplikat($id = null, $user_id = null)
    {
        if ($id === null && $user_id == null) {
            $data = PendaftaranDuplikat::with('biodata')->orderBy('id', 'DESC')->get();
        } elseif ($id === null && $user_id != null) {
            $data = PendaftaranDuplikat::where('user_id', $user_id)->orderBy('id', 'DESC')->get();
        } else {
            $data =  PendaftaranDuplikat::where('id', $id)->first();
        }
        return $data;
    }




    public static function storePendafataranDuplikat(array $data)
    {

        $repo = new UploadRepository();
        $upload = $repo->uploadPendaftaranDuplikat($data['ktp'], $data['pajak'], $data['stnk'], $data['bpkb'], $data['no_rangka_upload'], $data['no_mesin_upload'], $data['surat_keterangan']);

        $pendaftaran = PendaftaranDuplikat::create([
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
            "surat_keterangan" => $upload['surat_keterangan'],
            "tanggal" =>  now(),
            "created_at" => now(),
            "updated_at" => now(),
        ]);
        return true;
    }

    public static function updatePendaftaranDuplikat($id, array $data)
    {
        $find = PendaftaranDuplikat::find($id);
        $ser = new PendaftaranDuplikatService;
        $val = $ser->getDataPendaftaranDuplikat($id);
        if (!isset($data['ktp']) and !isset($data['stnk']) and !isset($data['pajak']) and !isset($data['bpkb']) and !isset($data['no_rangka_upload']) and !isset($data['no_mesin_upload']) and !isset($data['surat_keterangan'])) {
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

            if (!isset($data['surat_keterangan'])) {
                $surat_keterangan_data = null;
            } else {
                $surat_keterangan_data = $data['surat_keterangan'];
            }


            $upload = $repo->uploadPendaftaranDuplikat($ktp_data, $pajak_data, $stnk_data, $bpkb_data, $no_rangka_upload_data, $no_mesin_upload_data, $surat_keterangan_data);
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

            if ($upload['surat_keterangan'] == 'kosong') {
                $surat_keterangan = $val->surat_keterangan;
            } else {
                $surat_keterangan = $upload['surat_keterangan'];
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
                    "surat_keterangan" => $surat_keterangan,
                    "tanggal" =>  now(),
                    "created_at" => now(),
                    "updated_at" => now(),
                ];

            $find->update($toward);
            return true;
        }
    }

    public static function deleteDataPendaftaranDuplikat($id)
    {
        try {
            PendaftaranDuplikat::find($id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
