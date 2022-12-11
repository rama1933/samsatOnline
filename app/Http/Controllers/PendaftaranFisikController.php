<?php

namespace App\Http\Controllers;

use App\Services\PendaftaranFisikService;
use Illuminate\Http\Request;
use App\Services\PendaftaranService;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PendaftaranFisikController extends Controller
{
    public function __construct()
    {
        $this->service = new PendaftaranFisikService;
    }
    //
    public function indexpendaftaranfisik()
    {
        return view('user.pendaftaran.pendaftaranfisik.index');
    }

    public function indexpendaftaranfisikadmin()
    {
        return view('admin.trxpendaftaran.pendaftaranfisik.index');
    }

    public function data(Request $request)
    {
        $user = Auth::user()->hasRole('admin');
        if ($user) {
            $data = $this->service->getDataPendaftaranfisik();
        } else {
            $user_id = auth()->user()->id;
            $data = $this->service->getDataPendaftaranfisik(user_id: $user_id);
        }


        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('nik', function ($data) use ($request) {
                return $data->biodata->nik;
            })
            ->addColumn('nama', function ($data) use ($request) {
                return $data->biodata->nama;
            })
            ->addColumn('download_file', function ($data) use ($request) {
                return '<a href="' . asset('/storage') . '/' . $data->file . '"
                                                                target="_blank" class="btn btn-sm btn-primary edit">
                                                                <i class="fa fa-download">
                                                                </i>
                                                            </a>';
            })
            ->addColumn('status', function ($data) use ($request) {
                if ($data->status == 0) {
                    return '<select name="status" onchange="status(' . $data->id . ')" class="form-control status' . $data->id . '" >
                  <option value="0">Belum Di Verifikasi</option>
                  <option value="1">Di Proses</option>
                  <option value="2">Selesai</option>
                  </select>';
                }
                if ($data->status == 1) {
                    return '<select name="status" onchange="status(' . $data->id . ')" class="form-control status' . $data->id . '" >
                  <option value="1">Di Proses</option>
                  <option value="2">Selesai</option>
                  <option value="0">Belum Di Verifikasi</option>
                  </select>';
                }
                if ($data->status == 2) {
                    return '<select name="status" onchange="status(' . $data->id . ')" class="form-control status' . $data->id . '" >
                  <option value="2">Selesai</option>
                  <option value="1">Di Proses</option>
                  <option value="0">Belum Di Verifikasi</option>
                  </select>';
                }
            })
            ->addColumn('button', function ($data) use ($request) {
                return '
                 <a href="/pdf/pendaftaranfisik/detail/' . $data->id . '"  class="btn btn-sm btn-flat btn-warning" target="_blank" title="Unduh Dokumen (PDF)"><i class="fa fa-print"></i></a>
                 <button onclick="edit(' . $data->id . ')" data-toggle="modal" data-target="#modal-edit" class="btn btn-sm btn-flat btn-primary my-1"><i class="fa fa-edit"></i></button>
                <button onclick="deletebtn(' . $data->id . ')" class="btn btn-sm btn-flat btn-danger my-1"><i class="fa fa-trash"></i></button>
                                   ';
            })
            ->addColumn('buttonadmin', function ($data) use ($request) {
                return '
                 <a href="/admin/pdf/pendaftaranfisikadmin/detail/' . $data->id . '"  class="btn btn-sm btn-flat btn-warning" target="_blank" title="Unduh Dokumen (PDF)"><i class="fa fa-print"></i></a>

                <button onclick="deletebtn(' . $data->id . ')" class="btn btn-sm btn-flat btn-danger my-1"><i class="fa fa-trash"></i></button>
                                   ';
            })
            ->rawColumns(['button', 'buttonadmin', 'download_file', 'nik', 'nama', 'status'])
            ->make(true);
    }

    public function storependaftaranfisik(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'nopol' => 'required',
            'no_rangka' => 'required',
            'no_mesin' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        } else {
            $store = $this->service->storePendafataranfisik($request->all());
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function showpendaftaranfisik(Request $request)
    {
        $id = $request->id;
        $data = $this->service->getDataPendaftaranfisik($id);
        return response()->json(
            [
                'id' => $data->id,
                'nopol' => $data->nopol,
                'no_rangka' => $data->no_rangka,
                'no_mesin' => $data->no_mesin,
                'file' => $data->file,
                'tempat' => $data->tempat,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendaftaranRequest  $request
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function updatependaftaranfisik(Request $request)
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
            $store = $this->service->updatePendaftaranfisik($id, $request->all());
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function deletependaftaranfisik(Request $request)
    {
        $id = $request->id;
        $data = $this->service->deleteDataPendaftaranfisik($id);
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
