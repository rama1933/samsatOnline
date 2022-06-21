<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrxPendaftaran;
use App\Services\MasterService;
use Illuminate\Support\Facades\Auth;
use App\Services\TrxPendaftaranService;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class TrxPendaftaranController extends Controller
{

    public function __construct()
    {
        $this->service = new TrxPendaftaranService();
    }

    public function updatestatus(Request $request)
    {
        // dd(request()->all());
        $id = $request->id;
        $type = $request->type;
        $store = $this->service->updateStatus($id, $type, $request->all());
    }
}
