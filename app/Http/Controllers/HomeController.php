<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Pendaftaran1tahun;
use App\Models\Pendaftaran5tahun;
use App\Models\PendaftaranBalik;
use App\Models\PendaftaranDuplikat;
use App\Models\PendaftaranKuasa;
use App\Models\TrxPendaftaran;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['jumlah_1tahun'] = Pendaftaran1tahun::count();
        $data['jumlah_5tahun'] = Pendaftaran5tahun::count();
        $data['jumlah_kuasa'] = PendaftaranKuasa::count();
        $data['jumlah_balik'] = PendaftaranBalik::count();
        $data['jumlah_duplikat'] = PendaftaranDuplikat::count();

        return view('admin.home', $data);
    }

    public function indexuser()
    {
        $pen1 = Pendaftaran1tahun::where('user_id', auth()->user()->id)->count();
        $pen5 = Pendaftaran5tahun::where('user_id', auth()->user()->id)->count();
        $penkuasa = PendaftaranKuasa::where('user_id', auth()->user()->id)->count();
        $penbalik = PendaftaranBalik::where('user_id', auth()->user()->id)->count();
        $penduplikat = PendaftaranDuplikat::where('user_id', auth()->user()->id)->count();
        $pen1_belum = Pendaftaran1tahun::where('status', "0")->where('user_id', auth()->user()->id)->count();
        $pen5_belum = Pendaftaran5tahun::where('status', "0")->where('user_id', auth()->user()->id)->count();
        $penkuasa_belum = PendaftaranKuasa::where('status', "0")->where('user_id', auth()->user()->id)->count();
        $penbalik_belum = PendaftaranBalik::where('status', "0")->where('user_id', auth()->user()->id)->count();
        $penduplikat_belum = PendaftaranDuplikat::where('status', "0")->where('user_id', auth()->user()->id)->count();
        $pen1_diproses = Pendaftaran1tahun::where('status', "1")->where('user_id', auth()->user()->id)->count();
        $pen5_diproses = Pendaftaran5tahun::where('status', "1")->where('user_id', auth()->user()->id)->count();
        $penkuasa_diproses = PendaftaranKuasa::where('status', "1")->where('user_id', auth()->user()->id)->count();
        $penbalik_diproses = PendaftaranBalik::where('status', "1")->where('user_id', auth()->user()->id)->count();
        $penduplikat_diproses = PendaftaranDuplikat::where('status', "1")->where('user_id', auth()->user()->id)->count();
        $pen1_selesai = Pendaftaran1tahun::where('status', "2")->where('user_id', auth()->user()->id)->count();
        $pen5_selesai = Pendaftaran5tahun::where('status', "2")->where('user_id', auth()->user()->id)->count();
        $penkuasa_selesai = PendaftaranKuasa::where('status', "2")->where('user_id', auth()->user()->id)->count();
        $penbalik_selesai = PendaftaranBalik::where('status', "2")->where('user_id', auth()->user()->id)->count();
        $penduplikat_selesai = PendaftaranDuplikat::where('status', "2")->where('user_id', auth()->user()->id)->count();
        $data['jumlah_pendaftaran'] = $pen1 + $pen5 + $penkuasa + $penbalik + $penduplikat;
        $data['jumlah_belum'] = $pen1_belum + $pen5_belum + $penkuasa_belum + $penbalik_belum + $penduplikat_belum;
        $data['jumlah_diproses'] = $pen1_diproses + $pen5_diproses + $penkuasa_diproses + $penbalik_diproses + $penduplikat_diproses;
        $data['jumlah_selesai'] = $pen1_selesai + $pen5_selesai + $penkuasa_selesai + $penbalik_selesai + $penduplikat_selesai;
        return view('user.home', $data);
    }
    public function indexprofileuser()
    {
        $data['user'] = User::where('id', auth()->user()->id)->get();
        $data['biodata'] = Biodata::where('id', auth()->user()->biodata_id)->get();
        return view('user.profile', $data);
    }

    public function indexprofileadmin()
    {
        $data['user'] = User::where('id', auth()->user()->id)->get();
        $data['biodata'] = Biodata::where('id', auth()->user()->biodata_id)->get();
        return view('admin.profile', $data);
    }
}
