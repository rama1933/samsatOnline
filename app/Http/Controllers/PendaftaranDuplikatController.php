<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Services\PendaftaranDuplikatService;

class PendaftaranDuplikatController extends Controller
{
    public function __construct()
    {
        $this->service = new PendaftaranDuplikatService();
    }

    public function indexpendaftaranduplikat()
    {
        return view('user.pendaftaran.pendaftaranduplikat.index');
    }

    public function indexpendaftaranduplikatadmin()
    {
        return view('admin.trxpendaftaran.pendaftaranduplikat.index');
    }

    public function data(Request $request)
    {
        $user = Auth::user()->hasRole('admin');
        if ($user) {
            $data = $this->service->getDataPendaftaranduplikat();
        } else {
            $user_id = auth()->user()->id;
            $data = $this->service->getDataPendaftaranduplikat(user_id: $user_id);
        }


        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('nik', function ($data) use ($request) {
                return $data->biodata->nik;
            })
            ->addColumn('nama', function ($data) use ($request) {
                return $data->biodata->nama;
            })
            ->addColumn('download_ktp', function ($data) use ($request) {
                return '<a href="' . asset('/storage') . '/' . $data->ktp . '"
                                                                target="_blank" class="btn btn-sm btn-primary edit">
                                                                <i class="fa fa-download">
                                                                </i>
                                                            </a>';
            })
            ->addColumn('download_pajak', function ($data) use ($request) {
                return '<a href="' . asset('/storage') . '/' . $data->pajak . '"
                                                                target="_blank" class="btn btn-sm btn-primary edit">
                                                                <i class="fa fa-download">
                                                                </i>
                                                            </a>';
            })
            ->addColumn('download_stnk', function ($data) use ($request) {
                return '<a href="' . asset('/storage') . '/' . $data->stnk . '"
                                                                target="_blank" class="btn btn-sm btn-primary edit">
                                                                <i class="fa fa-download">
                                                                </i>
                                                            </a>';
            })
            ->addColumn('download_bpkb', function ($data) use ($request) {
                return '<a href="' . asset('/storage') . '/' . $data->bpkb . '"
                                                                target="_blank" class="btn btn-sm btn-primary edit">
                                                                <i class="fa fa-download">
                                                                </i>
                                                            </a>';
            })
            ->addColumn('download_surat_keterangan', function ($data) use ($request) {
                return '<a href="' . asset('/storage') . '/' . $data->surat_keterangan . '"
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
                 <a href="/pdf/pendaftaranduplikat/detail/' . $data->id . '"  class="btn btn-sm btn-flat btn-warning" target="_blank" title="Unduh Dokumen (PDF)"><i class="fa fa-print"></i></a>
                 <button onclick="edit(' . $data->id . ')" data-toggle="modal" data-target="#modal-edit" class="btn btn-sm btn-flat btn-primary my-1"><i class="fa fa-edit"></i></button>
                <button onclick="deletebtn(' . $data->id . ')" class="btn btn-sm btn-flat btn-danger my-1"><i class="fa fa-trash"></i></button>
                                   ';
            })
            ->addColumn('buttonadmin', function ($data) use ($request) {
                return '
                 <a href="/admin/pdf/pendaftaranduplikatadmin/detail/' . $data->id . '"  class="btn btn-sm btn-flat btn-warning" target="_blank" title="Unduh Dokumen (PDF)"><i class="fa fa-print"></i></a>
                 <button onclick="edit(' . $data->id . ')" data-toggle="modal" data-target="#modal-edit" class="btn btn-sm btn-flat btn-primary my-1"><i class="fa fa-edit"></i></button>
                <button onclick="deletebtn(' . $data->id . ')" class="btn btn-sm btn-flat btn-danger my-1"><i class="fa fa-trash"></i></button>
                                   ';
            })
            ->rawColumns(['button', 'buttonadmin', 'download_ktp', 'download_pajak', 'download_stnk', 'download_bpkb', 'download_surat_keterangan', 'nik', 'nama', 'status'])
            ->make(true);
    }


    public function storependaftaranduplikat(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'nopol' => 'required',
            'merk' => 'required',
            'tahun' => 'required',
            'no_rangka' => 'required',
            'no_mesin' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "failed",
                "message" => $validator->errors()->first(),
            ]);
        } else {
            $store = $this->service->storePendafataranduplikat($request->all());
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

    public function showpendaftaranduplikat(Request $request)
    {
        $id = $request->id;
        $data = $this->service->getDataPendaftaranduplikat($id);
        return response()->json(
            [
                'id' => $data->id,
                'nopol' => $data->nopol,
                'merk' => $data->merk,
                'tahun' => $data->tahun,
                'no_rangka' => $data->no_rangka,
                'no_mesin' => $data->no_mesin,
                'ktp' => $data->ktp,
                'pajak' => $data->pajak,
                'stnk' => $data->stnk,
                'bpkb' => $data->bpkb,
                'surat_keterangan' => $data->surat_keterangan,
            ]
        );
    }


    public function updatependaftaranduplikat(Request $request)
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
            $store = $this->service->updatePendaftaranduplikat($id, $request->all());
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


    public function deletependaftaranduplikat(Request $request)
    {
        $id = $request->id;
        $data = $this->service->deleteDataPendaftaranduplikat($id);
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
