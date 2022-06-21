<?php

namespace App\Services;

use App\Models\Biodata;
use App\Models\User;

class MasterService
{
    public function __construct()
    {
        //
    }

    function getDataBiodata($id = null)
    {
        if ($id === null) {
            $data = Biodata::all();
        } else {
            $data =  Biodata::where('id', $id)->first();
        }
        return $data;
    }

    public static function storeBiodata(array $data)
    {
        $store =
            Biodata::create([
                "nik" => $data['nik'],
                "nama" => $data['nama'],
                "no_hp" => $data['no_hp'],
                "email" => $data['email'],
                "alamat" => $data['alamat'],
                // "tanggal_lahir" => $data['tanggal_lahir'],
                // "tempat_lahir" => $data['tempat_lahir'],
                "created_at" => now(),
                "updated_at" => now()
            ]);
        return true;
    }


    public static function updateBiodata($id, array $data)
    {
        $find = Biodata::find($id);
        $toward =
            [
                "nik" => $data['nik'],
                "nama" => $data['nama'],
                "no_hp" => $data['no_hp'],
                "alamat" => $data['alamat'],
                "email" => $data['email'],
                // "tanggal_lahir" => $data['tanggal_lahir'],
                // "tempat_lahir" => $data['tempat_lahir'],
                "created_at" => now(),
                "updated_at" => now()
            ];
        $find->update($toward);
        return true;
    }

    public static function deleteDataBiodata($id)
    {
        try {
            Biodata::find($id)->delete();
            User::where('biodata_id', $id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
