<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Biodata;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Models\Pendaftaran1tahun;
use App\Models\Pendaftaran5tahun;
use App\Models\PendaftaranBalik;
use App\Models\PendaftaranDuplikat;
use App\Models\PendaftaranKuasa;
use App\Services\MasterService;
use App\Services\PendaftaranService;
use App\Services\PendaftaranBalikService;
use App\Services\PendaftaranKuasaService;
use App\Services\Pendaftaran5tahunService;
use App\Services\PendaftaranDuplikatService;


class PdfController extends Controller
{
    //
    public function __construct()
    {
        $this->pendaftaran1tahunService = new PendaftaranService();
        $this->pendaftaran5tahunService = new Pendaftaran5tahunService();
        $this->pendaftarankuasaService = new PendaftaranKuasaService();
        $this->pendaftaranbalikService = new PendaftaranBalikService();
        $this->pendaftaranduplikatService = new PendaftaranDuplikatService();
        $this->masterService = new MasterService();
        $this->userService = new UserService();
    }

    public function indexlaporanuser(Request $request)
    {
        return view('user.laporan');
    }

    public function indexlaporanadmin(Request $request)
    {
        return view('admin.laporan');
    }

    public function indexpendaftaran1tahunpdf(Request $request)
    {
        $user_id = auth()->user()->id;
        $data['data'] = $this->pendaftaran1tahunService->getDataPendaftaran1tahun(user_id: $user_id);
        $pdf = PDF::loadview('pdf.user.pendaftaran.pendaftaran1tahun.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('1tahun.pdf');
    }

    public function indexpendaftaran1tahundetailpdf(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = Pendaftaran1tahun::with('biodata')->where('id', $id)->get();
        $pdf = PDF::loadview('pdf.user.pendaftaran.pendaftaran1tahun.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('1tahun.pdf');
    }

    public function indexpendaftaran5tahunpdf(Request $request)
    {
        $user_id = auth()->user()->id;
        $data['data'] = $this->pendaftaran5tahunService->getDataPendaftaran5tahun(user_id: $user_id);
        $pdf = PDF::loadview('pdf.user.pendaftaran.pendaftaran5tahun.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('5tahun.pdf');
    }

    public function indexpendaftaran5tahundetailpdf(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = Pendaftaran5tahun::with('biodata')->where('id', $id)->get();
        $pdf = PDF::loadview('pdf.user.pendaftaran.pendaftaran5tahun.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('5tahun.pdf');
    }

    public function indexpendaftarankuasapdf(Request $request)
    {
        $user_id = auth()->user()->id;
        $data['data'] = $this->pendaftarankuasaService->getDataPendaftaranKuasa(user_id: $user_id);
        $pdf = PDF::loadview('pdf.user.pendaftaran.pendaftarankuasa.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('kuasa.pdf');
    }

    public function indexpendaftarankuasadetailpdf(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = PendaftaranKuasa::with('biodata')->where('id', $id)->get();
        $pdf = PDF::loadview('pdf.user.pendaftaran.pendaftarankuasa.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('kuasa.pdf');
    }

    public function indexpendaftaranbalikpdf(Request $request)
    {
        $user_id = auth()->user()->id;
        $data['data'] = $this->pendaftaranbalikService->getDataPendaftaranBalik(user_id: $user_id);
        $pdf = PDF::loadview('pdf.user.pendaftaran.pendaftaranbalik.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('balik.pdf');
    }

    public function indexpendaftaranbalikdetailpdf(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = PendaftaranBalik::with('biodata')->where('id', $id)->get();
        $pdf = PDF::loadview('pdf.user.pendaftaran.pendaftaranbalik.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('balik.pdf');
    }

    public function indexpendaftaranduplikatpdf(Request $request)
    {
        $user_id = auth()->user()->id;
        $data['data'] = $this->pendaftaranduplikatService->getDataPendaftaranDuplikat(user_id: $user_id);
        $pdf = PDF::loadview('pdf.user.pendaftaran.pendaftaranduplikat.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('duplikat.pdf');
    }

    public function indexpendaftaranduplikatdetailpdf(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = PendaftaranDuplikat::with('biodata')->where('id', $id)->get();
        $pdf = PDF::loadview('pdf.user.pendaftaran.pendaftaranduplikat.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('duplikat.pdf');
    }

    public function indexbiodatapdf(Request $request)
    {
        $data['data'] = $this->masterService->getDataBiodata();
        $pdf = PDF::loadview('pdf.master.biodata.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('biodata.pdf');
    }

    public function indexbiodatapdfdetailpdf(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = Biodata::where('id', $id)->get();
        $pdf = PDF::loadview('pdf.master.biodata.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('biodata.pdf');
    }



    public function indexpendaftaran1tahunadminpdf(Request $request)
    {
        $user_id = auth()->user()->id;
        $data['data'] = $this->pendaftaran1tahunService->getDataPendaftaran1tahun();
        $pdf = PDF::loadview('pdf.admin.pendaftaran.pendaftaran1tahun.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('1tahun.pdf');
    }

    public function indexpendaftaran1tahundetailadminpdf(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = Pendaftaran1tahun::with('biodata')->where('id', $id)->get();
        $pdf = PDF::loadview('pdf.admin.pendaftaran.pendaftaran1tahun.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('1tahun.pdf');
    }

    public function indexpendaftaran5tahunadminpdf(Request $request)
    {
        $user_id = auth()->user()->id;
        $data['data'] = $this->pendaftaran5tahunService->getDataPendaftaran5tahun();
        $pdf = PDF::loadview('pdf.admin.pendaftaran.pendaftaran5tahun.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('5tahun.pdf');
    }

    public function indexpendaftaran5tahundetailadminpdf(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = Pendaftaran5tahun::with('biodata')->where('id', $id)->get();
        $pdf = PDF::loadview('pdf.admin.pendaftaran.pendaftaran5tahun.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('5tahun.pdf');
    }

    public function indexpendaftarankuasaadminpdf(Request $request)
    {
        $user_id = auth()->user()->id;
        $data['data'] = $this->pendaftarankuasaService->getDataPendaftaranKuasa();
        $pdf = PDF::loadview('pdf.admin.pendaftaran.pendaftarankuasa.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('kuasa.pdf');
    }

    public function indexpendaftarankuasaadmindetailadminpdf(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = PendaftaranKuasa::with('biodata')->where('id', $id)->get();
        $pdf = PDF::loadview('pdf.admin.pendaftaran.pendaftarankuasa.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('kuasa.pdf');
    }

    public function indexpendaftaranbalikadminpdf(Request $request)
    {
        $user_id = auth()->user()->id;
        $data['data'] = $this->pendaftaranbalikService->getDataPendaftaranBalik();
        $pdf = PDF::loadview('pdf.admin.pendaftaran.pendaftaranbalik.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('balik.pdf');
    }

    public function indexpendaftaranbalikadmindetailpdf(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = PendaftaranBalik::with('biodata')->where('id', $id)->get();
        $pdf = PDF::loadview('pdf.admin.pendaftaran.pendaftaranbalik.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('balik.pdf');
    }

    public function indexpendaftaranduplikatadminpdf(Request $request)
    {
        $user_id = auth()->user()->id;
        $data['data'] = $this->pendaftaranduplikatService->getDataPendaftaranDuplikat();
        $pdf = PDF::loadview('pdf.admin.pendaftaran.pendaftaranduplikat.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('duplikat.pdf');
    }

    public function indexpendaftaranduplikatadmindetailpdf(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = PendaftaranDuplikat::with('biodata')->where('id', $id)->get();
        $pdf = PDF::loadview('pdf.admin.pendaftaran.pendaftaranduplikat.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('duplikat.pdf');
    }

    public function indexbiodataadminpdf(Request $request)
    {
        $data['data'] = $this->masterService->getDataBiodata();
        $pdf = PDF::loadview('pdf.master.biodata.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('biodata.pdf');
    }

    public function indexbiodataadminpdfdetailpdf(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = Biodata::where('id', $id)->get();
        $pdf = PDF::loadview('pdf.master.biodata.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('biodata.pdf');
    }

    public function indexuserpdf(Request $request)
    {
        $data['data'] = $this->userService->getDataUser();
        $pdf = PDF::loadview('pdf.master.user.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('user.pdf');
    }

    public function indexuserpdfdetailpdf(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = User::where('id', $id)->get();
        $pdf = PDF::loadview('pdf.master.user.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('user.pdf');
    }
}
