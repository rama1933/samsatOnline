<?php

namespace App\Services;

use App\Models\PendaftaranKuasa;
use App\Services\PendaftaranService;
use App\Repositories\UploadRepository;

class PendaftaranKuasaService
{
    public function __construct()
    {
        //
        $this->repo = new UploadRepository;
    }

    public function getDataPendaftaranKuasa($id = null, $user_id = null)
    {
        if ($id === null && $user_id == null) {
            $data = PendaftaranKuasa::with('biodata')->get();
        } elseif ($id === null && $user_id != null) {
            $data = PendaftaranKuasa::where('user_id', $user_id)->get();
        } else {
            $data =  PendaftaranKuasa::where('id', $id)->first();
        }
        return $data;
    }



    public static function storePendafataranKuasa(array $data)
    {

        $repo = new UploadRepository();
        $upload = $repo->uploadpendaftaranKuasa($data['ktp'], $data['pajak'], $data['stnk'], $data['bpkb'], $data['surat_kuasa'], $data['no_mesin_upload'], $data['no_rangka_upload'], $data['surat_keterangan']);

        $pendaftaran = PendaftaranKuasa::create([
            "user_id" => $data['user_id'],
            "biodata_id" => $data['biodata_id'],
            "jenis" => $data['jenis'],
            "nopol" => $data['nopol'],
            "merk" => $data['merk'],
            "tahun" => $data['tahun'],
            "no_rangka" => $data['no_rangka'],
            "no_mesin" => $data['no_mesin'],
            "ktp" => $upload['ktp'],
            "pajak" => $upload['pajak'],
            "stnk" => $upload['stnk'],
            "bpkb" => $upload['bpkb'],
            "surat_kuasa" => $upload['surat_kuasa'],
            "no_mesin_upload" => $upload['no_mesin_upload'],
            "no_rangka_upload" => $upload['no_rangka_upload'],
            "surat_keterangan" => $upload['surat_keterangan'],
            "tanggal" =>  now(),
            "created_at" => now(),
            "updated_at" => now(),
        ]);
        return true;
    }

    public static function updatePendaftaranKuasa($id, array $data)
    {
        $find = PendaftaranKuasa::find($id);
        $ser = new PendaftaranKuasaService();
        $val = $ser->getDataPendaftaranKuasa($id);
        if (!isset($data['ktp']) and !isset($data['stnk']) and !isset($data['pajak']) and !isset($data['bpkb']) and !isset($data['surat_kuasa']) and !isset($data['surat_keterangan']) and !isset($data['no_rangka_upload']) and !isset($data['no_mesin_upload'])) {
            $toward =
                [
                    "jenis" => $data['jenis'],
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

            if (!isset($data['surat_kuasa'])) {
                $surat_kuasa_data = null;
            } else {
                $surat_kuasa_data = $data['surat_kuasa'];
            }

            if (!isset($data['surat_keterangan'])) {
                $surat_keterangan_data = null;
            } else {
                $surat_keterangan_data = $data['surat_keterangan'];
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


            $upload = $repo->uploadpendaftaranKuasa($ktp_data, $pajak_data, $stnk_data, $bpkb_data, $surat_kuasa_data, $surat_keterangan_data, $no_rangka_upload_data, $no_mesin_upload_data);
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

            if ($upload['surat_kuasa'] == 'kosong') {
                $surat_kuasa = $val->surat_kuasa;
            } else {
                $surat_kuasa = $upload['surat_kuasa'];
            }

            if ($upload['surat_keterangan'] == 'kosong') {
                $surat_keterangan = $val->surat_keterangan;
            } else {
                $surat_keterangan = $upload['surat_keterangan'];
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
                    "jenis" => $data['jenis'],
                    "nopol" => $data['nopol'],
                    "merk" => $data['merk'],
                    "tahun" => $data['tahun'],
                    "no_rangka" => $data['no_rangka'],
                    "no_mesin" => $data['no_mesin'],
                    "ktp" => $ktp,
                    "pajak" => $pajak,
                    "stnk" => $stnk,
                    "bpkb" => $bpkb,
                    "surat_kuasa" => $surat_kuasa,
                    "surat_keterangan" => $surat_keterangan,
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

    public static function deleteDataPendaftaranKuasa($id)
    {
        try {
            PendaftaranKuasa::find($id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
