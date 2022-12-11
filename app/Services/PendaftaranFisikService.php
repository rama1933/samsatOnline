<?php

namespace App\Services;

use App\Models\Fisik;
use App\Repositories\UploadRepository;

class PendaftaranFisikService
{
    public function __construct()
    {
        //
        $this->repo = new UploadRepository;
    }


    public function getDataPendaftaranfisik($id = null, $user_id = null)
    {
        if ($id === null && $user_id == null) {
            $data = Fisik::with('biodata')->get();
        } elseif ($id === null && $user_id != null) {
            $data = Fisik::where('user_id', $user_id)->get();
        } else {
            $data =  Fisik::where('id', $id)->first();
        }
        return $data;
    }

    public static function storePendafataranfisik(array $data)
    {

        $repo = new UploadRepository();
        $upload = $repo->uploadfisik($data['file']);

        $pendaftaran = Fisik::create([
            "user_id" => $data['user_id'],
            "biodata_id" => $data['biodata_id'],
            "nopol" => $data['nopol'],
            "tempat" => $data['tempat'],
            "no_rangka" => $data['no_rangka'],
            "no_mesin" => $data['no_mesin'],
            "file" => $upload['file'],
            "tanggal" =>  now(),
            "created_at" => now(),
            "updated_at" => now(),
        ]);
        return true;
    }

    public static function updatePendaftaranfisik($id, array $data)
    {
        $find = Fisik::find($id);
        $ser = new PendaftaranFisikService;
        $val = $ser->getDataPendaftaranfisik($id);
        if (!isset($data['file'])) {
            $toward =
                [
                    "nopol" => $data['nopol'],
                    "tempat" => $data['tempat'],
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
            if (!isset($data['file'])) {
                $file_data = null;
            } else {
                $file_data = $data['file'];
            }


            $upload = $repo->uploadfisik($file_data);
            if ($upload['file'] == 'kosong') {
                $file = $val->file;
            } else {
                $file = $upload['file'];
            }

            $toward =
                [
                    "nopol" => $data['nopol'],
                    "tempat" => $data['tempat'],
                    "no_rangka" => $data['no_rangka'],
                    "no_mesin" => $data['no_mesin'],
                    "file" => $file,
                    "tanggal" =>  now(),
                    "created_at" => now(),
                    "updated_at" => now(),
                ];

            $find->update($toward);
            return true;
        }
    }

    public static function deleteDataPendaftaranfisik($id)
    {
        try {
            Fisik::find($id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
