<?php

namespace App\Services;

use App\Models\SuratKuasa;

class SuratKuasaService
{
    public function __construct()
    {
        //
    }


    public function getDataSuratKuasa($id = null, $user_id = null)
    {
        if ($id === null && $user_id == null) {
            $data = SuratKuasa::with('biodata')->get();
        } elseif ($id === null && $user_id != null) {
            $data = SuratKuasa::where('user_id', $user_id)->get();
        } else {
            $data =  SuratKuasa::where('id', $id)->first();
        }
        return $data;
    }



    public static function storeSuratKuasa(array $data)
    {



        $pendaftaran = SuratKuasa::create([
            "user_id" => $data['user_id'],
            "biodata_id" => $data['biodata_id'],
            "nama1" => $data['nama1'],
            "nama2" => $data['nama2'],
            "nama3" => $data['nama3'],
            "no1" => $data['no1'],
            "no2" => $data['no2'],
            "tempat_lahir1" => $data['tempat_lahir1'],
            "tempat_lahir2" => $data['tempat_lahir2'],
            "tanggal_lahir1" => $data['tanggal_lahir1'],
            "tanggal_lahir2" => $data['tanggal_lahir2'],
            "no_hp1" => $data['no_hp1'],
            "no_hp2" => $data['no_hp2'],
            "alamat1" => $data['alamat1'],
            "alamat2" => $data['alamat2'],
            "nopol" => $data['nopol'],
            "merk" => $data['merk'],
            "no_rangka" => $data['no_rangka'],
            "no_mesin" => $data['no_mesin'],
            "created_at" => now(),
            "updated_at" => now(),
        ]);
        return true;
    }

    public static function updateSuratKuasa($id, array $data)
    {
        $find = SuratKuasa::find($id);
        $toward =
            [
                "nama1" => $data['nama1'],
                "nama2" => $data['nama2'],
                "nama3" => $data['nama3'],
                "no1" => $data['no1'],
                "no2" => $data['no2'],
                "tempat_lahir1" => $data['tempat_lahir1'],
                "tempat_lahir2" => $data['tempat_lahir2'],
                "tanggal_lahir1" => $data['tanggal_lahir1'],
                "tanggal_lahir2" => $data['tanggal_lahir2'],
                "no_hp1" => $data['no_hp1'],
                "no_hp2" => $data['no_hp2'],
                "alamat1" => $data['alamat1'],
                "alamat2" => $data['alamat2'],
                "nopol" => $data['nopol'],
                "merk" => $data['merk'],
                "no_rangka" => $data['no_rangka'],
                "no_mesin" => $data['no_mesin'],
                "created_at" => now(),
                "updated_at" => now(),
            ];

        $find->update($toward);
        return true;
    }

    public static function deleteDataSuratKuasa($id)
    {
        try {
            SuratKuasa::find($id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
