<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Fisik;
use App\Models\Biodata;
use App\Models\SuratKuasa;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\MasterService;
use App\Models\PendaftaranBalik;
use App\Models\PendaftaranKuasa;
use App\Models\Pendaftaran1tahun;
use App\Models\Pendaftaran5tahun;
use App\Models\PendaftaranDuplikat;
use App\Services\SuratKuasaService;
use App\Services\PendaftaranService;
use App\Models\Pendaftaran1tahunonline;
use App\Services\PendaftaranBalikService;
use App\Services\PendaftaranFisikService;
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
        $this->pendaftaranfisikService = new PendaftaranFisikService();
        $this->masterService = new MasterService();
        $this->userService = new UserService();
        $this->SuratKuasaService = new SuratKuasaService();
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

    public function indexpendaftaran1tahunonlinepdf(Request $request)
    {
        $user_id = auth()->user()->id;
        $data['data'] = $this->pendaftaran1tahunService->getDataPendaftaran1tahunonline(user_id: $user_id);
        $pdf = PDF::loadview('pdf.user.pendaftaran.pendaftaran1tahunonline.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('1tahun.pdf');
    }

    public function indexpendaftaran1tahunonlinedetailpdf(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = Pendaftaran1tahunonline::with('biodata')->where('id', $id)->get();
        $pdf = PDF::loadview('pdf.user.pendaftaran.pendaftaran1tahunonline.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('1tahun.pdf');
    }

    public function indexpendaftaranfisikpdf(Request $request)
    {
        $user_id = auth()->user()->id;
        $data['data'] = $this->pendaftaranfisikService->getDataPendaftaranfisik(user_id: $user_id);
        $pdf = PDF::loadview('pdf.user.pendaftaran.pendaftaranfisik.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('fisik.pdf');
    }

    public function indexpendaftaranfisikdetailpdf(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = Fisik::with('biodata')->where('id', $id)->get();
        $pdf = PDF::loadview('pdf.user.pendaftaran.pendaftaranfisik.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('fisik.pdf');
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

    public function indexsuratkuasapdf(Request $request)
    {
        $user_id = auth()->user()->id;
        $data['data'] = $this->SuratKuasaService->getDataSuratKuasa(user_id: $user_id);
        $pdf = PDF::loadview('pdf.user.pendaftaran.suratkuasa.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('kuasa.pdf');
    }

    public function indexsuratkuasadetailpdf(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = suratkuasa::with('biodata')->where('id', $id)->get();
        $pdf = PDF::loadview('pdf.user.pendaftaran.suratkuasa.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('kuasa.pdf');
    }

    public function indexpendaftaransuratkuasapdf(Request $request)
    {
        $data['data'] = $request->all();
        // dd($data['data']);
        $pdf = PDF::loadview('pdf.user.pendaftaran.pendaftarankuasa.surat', $data)->setPaper('a4', 'landscape');
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
        if ($request->input('status') == "0") {
            $data['data'] = Pendaftaran1tahun::with('biodata')->where('status', '0')->get();
        } elseif ($request->input('status') == "1") {
            $data['data'] = Pendaftaran1tahun::with('biodata')->where('status', '1')->get();
        } elseif ($request->input('status') == "2") {
            $data['data'] = Pendaftaran1tahun::with('biodata')->where('status', '2')->get();
        } else {
            $data['data'] = Pendaftaran1tahun::with('biodata')->get();
        }

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

    public function indexpendaftaran1tahunonlineadminpdf(Request $request)
    {
        $user_id = auth()->user()->id;
        if ($request->input('status') == "0") {
            $data['data'] = Pendaftaran1tahunonline::with('biodata')->where('status', '0')->get();
        } elseif ($request->input('status') == "1") {
            $data['data'] = Pendaftaran1tahunonline::with('biodata')->where('status', '1')->get();
        } elseif ($request->input('status') == "2") {
            $data['data'] = Pendaftaran1tahunonline::with('biodata')->where('status', '2')->get();
        } else {
            $data['data'] = Pendaftaran1tahunonline::with('biodata')->get();
        }

        $pdf = PDF::loadview('pdf.admin.pendaftaran.pendaftaran1tahunonline.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('1tahun.pdf');
    }

    public function indexpendaftaran1tahunonlinedetailadminpdf(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = Pendaftaran1tahunonline::with('biodata')->where('id', $id)->get();
        $pdf = PDF::loadview('pdf.admin.pendaftaran.pendaftaran1tahunonline.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('1tahun.pdf');
    }

    public function indexpendaftaranfisikadminpdf(Request $request)
    {
        $user_id = auth()->user()->id;
        if ($request->input('status') == "0") {
            $data['data'] = Fisik::with('biodata')->where('status', '0')->get();
        } elseif ($request->input('status') == "1") {
            $data['data'] = Fisik::with('biodata')->where('status', '1')->get();
        } elseif ($request->input('status') == "2") {
            $data['data'] = Fisik::with('biodata')->where('status', '2')->get();
        } else {
            $data['data'] = Fisik::with('biodata')->get();
        }

        $pdf = PDF::loadview('pdf.admin.pendaftaran.pendaftaranfisik.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('1tahun.pdf');
    }

    public function indexpendaftaranfisikdetailadminpdf(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = Fisik::with('biodata')->where('id', $id)->get();
        $pdf = PDF::loadview('pdf.admin.pendaftaran.pendaftaranfisik.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('1tahun.pdf');
    }

    public function indexpendaftaran5tahunadminpdf(Request $request)
    {
        $user_id = auth()->user()->id;
        if ($request->input('status') == "0") {
            $data['data'] = Pendaftaran5tahun::with('biodata')->where('status', '0')->get();
        } elseif ($request->input('status') == "1") {
            $data['data'] = Pendaftaran5tahun::with('biodata')->where('status', '1')->get();
        } elseif ($request->input('status') == "2") {
            $data['data'] = Pendaftaran5tahun::with('biodata')->where('status', '2')->get();
        } else {
            $data['data'] = Pendaftaran5tahun::with('biodata')->get();
        }
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
        if ($request->input('status') == "0") {
            $data['data'] = PendaftaranKuasa::with('biodata')->where('status', '0')->get();
        } elseif ($request->input('status') == "1") {
            $data['data'] = PendaftaranKuasa::with('biodata')->where('status', '1')->get();
        } elseif ($request->input('status') == "2") {
            $data['data'] = PendaftaranKuasa::with('biodata')->where('status', '2')->get();
        } else {
            $data['data'] = PendaftaranKuasa::with('biodata')->get();
        }
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
        if ($request->input('status') == "0") {
            $data['data'] = PendaftaranBalik::with('biodata')->where('status', '0')->get();
        } elseif ($request->input('status') == "1") {
            $data['data'] = PendaftaranBalik::with('biodata')->where('status', '1')->get();
        } elseif ($request->input('status') == "2") {
            $data['data'] = PendaftaranBalik::with('biodata')->where('status', '2')->get();
        } else {
            $data['data'] = PendaftaranBalik::with('biodata')->get();
        }
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
        if ($request->input('status') == "0") {
            $data['data'] = PendaftaranDuplikat::with('biodata')->where('status', '0')->get();
        } elseif ($request->input('status') == "1") {
            $data['data'] = PendaftaranDuplikat::with('biodata')->where('status', '1')->get();
        } elseif ($request->input('status') == "2") {
            $data['data'] = PendaftaranDuplikat::with('biodata')->where('status', '2')->get();
        } else {
            $data['data'] = PendaftaranDuplikat::with('biodata')->get();
        }
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

    public function indexsuratkuasaadminpdf(Request $request)
    {
        $data['data'] = $this->SuratKuasaService->getDataSuratKuasa();
        $pdf = PDF::loadview('pdf.admin.pendaftaran.suratkuasa.index', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('kuasa.pdf');
    }

    public function indexsuratkuasaadmindetailpdf(Request $request, $id)
    {
        $id = $request->id;
        $data['data'] = suratkuasa::with('biodata')->where('id', $id)->get();
        $pdf = PDF::loadview('pdf.admin.pendaftaran.suratkuasa.detail', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('kuasa.pdf');
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
