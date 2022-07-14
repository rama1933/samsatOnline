<?php

namespace App\Http\Controllers;

use App\Models\SuratKuasa;
use App\Services\SuratKuasaService;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreSuratKuasaRequest;
use App\Http\Requests\UpdateSuratKuasaRequest;
use Illuminate\Http\Request;

class SuratKuasaController extends Controller
{
    public function __construct()
    {
        $this->service = new SuratKuasaService();
    }

    public function indexSuratKuasa()
    {
        return view('user.pendaftaran.suratkuasa.index');
    }

    public function indexSuratKuasaadmin()
    {
        return view('admin.trxpendaftaran.suratkuasa.index');
    }

    public function data(Request $request)
    {
        $user = Auth::user()->hasRole('admin');
        if ($user) {
            $data = $this->service->getDataSuratKuasa();
        } else {
            $user_id = auth()->user()->id;
            $data = $this->service->getDataSuratKuasa(user_id: $user_id);
        }


        return DataTables::of($data)
            ->addIndexColumn()
            // ->addColumn('nik', function ($data) use ($request) {
            //     return $data->biodata->nik;
            // })
            // ->addColumn('nama', function ($data) use ($request) {
            //     return $data->biodata->nama;
            // })
            ->addColumn('button', function ($data) use ($request) {
                return '
                 <a href="/pdf/suratkuasa/detail/' . $data->id . '"  class="btn btn-sm btn-flat btn-warning" target="_blank" title="Unduh Dokumen (PDF)"><i class="fa fa-print"></i></a>
                 <button onclick="edit(' . $data->id . ')" data-toggle="modal" data-target="#modal-edit" class="btn btn-sm btn-flat btn-primary my-1"><i class="fa fa-edit"></i></button>
                <button onclick="deletebtn(' . $data->id . ')" class="btn btn-sm btn-flat btn-danger my-1"><i class="fa fa-trash"></i></button>
                                   ';
            })
            ->addColumn('buttonadmin', function ($data) use ($request) {
                return '
                 <a href="/admin/pdf/suratkuasaadmin/detail/' . $data->id . '"  class="btn btn-sm btn-flat btn-warning" target="_blank" title="Unduh Dokumen (PDF)"><i class="fa fa-print"></i></a>
                <button onclick="deletebtn(' . $data->id . ')" class="btn btn-sm btn-flat btn-danger my-1"><i class="fa fa-trash"></i></button>
                                   ';
            })
            ->rawColumns(['button', 'buttonadmin'])
            ->make(true);
    }


    public function storeSuratKuasa(Request $request)
    {
        $validator = Validator::make(request()->all(), []);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        } else {
            $store = $this->service->storeSuratKuasa($request->all());
            if ($store == true) {
                return response()->json([
                    "status" => "success",
                    "messages" => "Berhasil Menambahkan Data",
                ]);
            } else {
                return response()->json([
                    "status" => "failed",
                    "messages" => "Gagal Menambahkan Data",
                ]);
            }
        }
    }

    public function showSuratKuasa(Request $request)
    {
        $id = $request->id;
        $data = $this->service->getDataSuratKuasa($id);
        return response()->json(
            [
                'id' => $data->id,
                "nama1" => $data->nama1,
                "nama2" => $data->nama2,
                "nama3" => $data->nama3,
                "no1" => $data->no1,
                "no2" => $data->no2,
                "tempat_lahir1" => $data->tempat_lahir1,
                "tempat_lahir2" => $data->tempat_lahir2,
                "tanggal_lahir1" => $data->tanggal_lahir1,
                "tanggal_lahir2" => $data->tanggal_lahir2,
                "no_hp1" => $data->no_hp1,
                "no_hp2" => $data->no_hp2,
                "alamat1" => $data->alamat1,
                "alamat2" => $data->alamat2,
                "nopol" => $data->nopol,
                "merk" => $data->merk,
                "no_rangka" => $data->no_rangka,
                "no_mesin" => $data->no_mesin,
            ]
        );
    }


    public function updateSuratKuasa(Request $request)
    {
        // dd(request()->all());
        $id = $request->id;
        $validator = Validator::make(request()->all(), []);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        } else {
            $store = $this->service->updateSuratKuasa($id, $request->all());
            if ($store == true) {
                return response()->json([
                    "status" => "success",
                    "messages" => "Berhasil memperbaharui Data",
                ]);
            } else {
                return response()->json([
                    "status" => "failed",
                    "messages" => "Gagal memperbaharui Data",
                ]);
            }
        }
    }


    public function deleteSuratKuasa(Request $request)
    {
        $id = $request->id;
        $data = $this->service->deleteDataSuratKuasa($id);
        if ($data == true) {
            return response()->json([
                "status" => "success",
                "messages" => "Berhasil Menghapus Data",
            ]);
        } else {
            return response()->json([
                "status" => "failed",
                "messages" => "Gagal Menghapus Data",
            ]);
        }
    }
}
