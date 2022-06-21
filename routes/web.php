<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);
Route::get('/daftar', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('daftar');
Route::post('/register', [App\Http\Controllers\UserController::class, 'storeuser'])->name('register.store');

Route::middleware('role:admin')->group(function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.admin');
    Route::post('updatestatus', [App\Http\Controllers\TrxPendaftaranController::class, 'updatestatus'])->name('update.status');
    Route::prefix('/master')->group(function () {
        Route::prefix('/data')->group(function () {
            Route::get('/', [App\Http\Controllers\MasterController::class, 'data'])->name('master.data');
            Route::get('/show', [App\Http\Controllers\MasterController::class, 'showdata'])->name('master.show');
            Route::post('/delete', [App\Http\Controllers\MasterController::class, 'deletedata'])->name('master.delete');
        });
        Route::prefix('/biodata')->group(function () {
            Route::get('/', [App\Http\Controllers\MasterController::class, 'indexbiodata'])->name('biodata.index');
            Route::post('/store', [App\Http\Controllers\MasterController::class, 'storebiodata'])->name('biodata.store');
            Route::post('/update', [App\Http\Controllers\MasterController::class, 'updatebiodata'])->name('biodata.update');
        });
    });
    Route::prefix('/user')->group(function () {
        Route::get('/', [App\Http\Controllers\UserController::class, 'indexuser'])->name('user.index');
        Route::get('/data', [App\Http\Controllers\UserController::class, 'data'])->name('user.data');
        Route::get('/show', [App\Http\Controllers\UserController::class, 'showdata'])->name('user.show');
        Route::post('/delete', [App\Http\Controllers\UserController::class, 'deletedata'])->name('user.delete');
        Route::post('/update', [App\Http\Controllers\UserController::class, 'updateuser'])->name('user.update');
        Route::post('/store', [App\Http\Controllers\UserController::class, 'storeuser'])->name('user.store');
        Route::post('/filter', [App\Http\Controllers\UserController::class, 'filterdata'])->name('user.filter');
    });
    Route::prefix('/admin')->group(function () {

        Route::get('profile', [App\Http\Controllers\HomeController::class, 'indexprofileadmin'])->name('profile.admin');
        Route::get('/show', [App\Http\Controllers\MasterController::class, 'showdata'])->name('dashboard.show');
        Route::post('/update', [App\Http\Controllers\MasterController::class, 'updatebiodata'])->name('dahsboard.update');

        Route::prefix('/pendaftaran')->group(function () {
            Route::prefix('/pendaftaran1tahun')->group(function () {
                Route::get('/', [App\Http\Controllers\PendaftaranController::class, 'indexpendaftaran1tahunadmin'])->name('pendaftaran1tahunadmin.index');
                Route::get('/data', [App\Http\Controllers\PendaftaranController::class, 'data'])->name('pendaftaran1tahunadmin.data');
                Route::post('/store', [App\Http\Controllers\PendaftaranController::class, 'storependaftaran1tahun'])->name('pendaftaran1tahunadmin.store');
                Route::get('/show', [App\Http\Controllers\PendaftaranController::class, 'showpendaftaran1tahun'])->name('pendaftaran1tahunadmin.show');
                Route::post('/update', [App\Http\Controllers\PendaftaranController::class, 'updatependaftaran1tahun'])->name('pendaftaran1tahunadmin.update');
                Route::post('/delete', [App\Http\Controllers\PendaftaranController::class, 'deletependaftaran1tahun'])->name('pendaftaran1tahunadmin.delete');
            });

            Route::prefix('/pendaftaran5tahun')->group(function () {
                Route::get('/', [App\Http\Controllers\Pendaftaran5tahunController::class, 'indexpendaftaran5tahunadmin'])->name('pendaftaran5tahunadmin.index');
                Route::get('/data', [App\Http\Controllers\Pendaftaran5tahunController::class, 'data'])->name('pendaftaran5tahunadmin.data');
                Route::post('/store', [App\Http\Controllers\Pendaftaran5tahunController::class, 'storependaftaran5tahun'])->name('pendaftaran5tahunadmin.store');
                Route::get('/show', [App\Http\Controllers\Pendaftaran5tahunController::class, 'showpendaftaran5tahun'])->name('pendaftaran5tahunadmin.show');
                Route::post('/update', [App\Http\Controllers\Pendaftaran5tahunController::class, 'updatependaftaran5tahun'])->name('pendaftaran5tahunadmin.update');
                Route::post('/delete', [App\Http\Controllers\Pendaftaran5tahunController::class, 'deletependaftaran5tahun'])->name('pendaftaran5tahunadmin.delete');
            });

            Route::prefix('/pendaftarankuasa')->group(function () {
                Route::get('/', [App\Http\Controllers\PendaftaranKuasaController::class, 'indexpendaftarankuasaadmin'])->name('pendaftarankuasaadmin.index');
                Route::get('/data', [App\Http\Controllers\PendaftaranKuasaController::class, 'data'])->name('pendaftarankuasaadmin.data');
                Route::post('/store', [App\Http\Controllers\PendaftaranKuasaController::class, 'storependaftarankuasa'])->name('pendaftarankuasaadmin.store');
                Route::get('/show', [App\Http\Controllers\PendaftaranKuasaController::class, 'showpendaftarankuasa'])->name('pendaftarankuasaadmin.show');
                Route::post('/update', [App\Http\Controllers\PendaftaranKuasaController::class, 'updatependaftarankuasa'])->name('pendaftarankuasaadmin.update');
                Route::post('/delete', [App\Http\Controllers\PendaftaranKuasaController::class, 'deletependaftarankuasa'])->name('pendaftarankuasaadmin.delete');
            });

            Route::prefix('/pendaftaranbalik')->group(function () {
                Route::get('/', [App\Http\Controllers\PendaftaranBalikController::class, 'indexpendaftaranbalikadmin'])->name('pendaftaranbalikadmin.index');
                Route::get('/data', [App\Http\Controllers\PendaftaranBalikController::class, 'data'])->name('pendaftaranbalikadmin.data');
                Route::post('/store', [App\Http\Controllers\PendaftaranBalikController::class, 'storependaftaranbalik'])->name('pendaftaranbalikadmin.store');
                Route::get('/show', [App\Http\Controllers\PendaftaranBalikController::class, 'showpendaftaranbalik'])->name('pendaftaranbalikadmin.show');
                Route::post('/update', [App\Http\Controllers\PendaftaranBalikController::class, 'updatependaftaranbalik'])->name('pendaftaranbalikadmin.update');
                Route::post('/delete', [App\Http\Controllers\PendaftaranBalikController::class, 'deletependaftaranbalik'])->name('pendaftaranbalikadmin.delete');
            });

            Route::prefix('/pendaftaranduplikat')->group(function () {
                Route::get('/', [App\Http\Controllers\PendaftaranDuplikatController::class, 'indexpendaftaranduplikatadmin'])->name('pendaftaranduplikatadmin.index');
                Route::get('/data', [App\Http\Controllers\PendaftaranDuplikatController::class, 'data'])->name('pendaftaranduplikatadmin.data');
                Route::post('/store', [App\Http\Controllers\PendaftaranDuplikatController::class, 'storependaftaranduplikat'])->name('pendaftaranduplikatadmin.store');
                Route::get('/show', [App\Http\Controllers\PendaftaranDuplikatController::class, 'showpendaftaranduplikat'])->name('pendaftaranduplikatadmin.show');
                Route::post('/update', [App\Http\Controllers\PendaftaranDuplikatController::class, 'updatependaftaranduplikat'])->name('pendaftaranduplikatadmin.update');
                Route::post('/delete', [App\Http\Controllers\PendaftaranDuplikatController::class, 'deletependaftaranduplikat'])->name('pendaftaranduplikatadmin.delete');
            });
        });

        Route::prefix('/pdf')->group(function () {
            Route::prefix('/pendaftaran1tahunadmin')->group(function () {
                Route::get('/', [App\Http\Controllers\PdfController::class, 'indexpendaftaran1tahunadminpdf'])->name('pdf.1tahunadmin');
                Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indexpendaftaran1tahundetailadminpdf'])->name('pdf.1tahunadmindetail');
            });

            Route::prefix('/pendaftaran5tahunadmin')->group(function () {
                Route::get('/', [App\Http\Controllers\PdfController::class, 'indexpendaftaran5tahunadminpdf'])->name('pdf.5tahunadmin');
                Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indexpendaftaran5tahundetailadminpdf'])->name('pdf.5tahunadmindetail');
            });

            Route::prefix('/pendaftarankuasaadmin')->group(function () {
                Route::get('/', [App\Http\Controllers\PdfController::class, 'indexpendaftarankuasaadminpdf'])->name('pdf.kuasaadmin');
                Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indexpendaftarankuasaadmindetailadminpdf'])->name('pdf.kuasaadmindetail');
            });

            Route::prefix('/pendaftaranbalikadmin')->group(function () {
                Route::get('/', [App\Http\Controllers\PdfController::class, 'indexpendaftaranbalikadminpdf'])->name('pdf.balikadmin');
                Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indexpendaftaranbalikadminpdf'])->name('pdf.balikadmindetail');
            });

            Route::prefix('/pendaftaranduplikatadmin')->group(function () {
                Route::get('/', [App\Http\Controllers\PdfController::class, 'indexpendaftaranduplikatadminpdf'])->name('pdf.duplikatadmin');
                Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indexpendaftaranduplikatadmindetailpdf'])->name('pdf.duplikatadmindetail');
            });

            Route::prefix('/biodataadmin')->group(function () {
                Route::get('/', [App\Http\Controllers\PdfController::class, 'indexbiodataadminpdf'])->name('pdf.biodataadmin');
                Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indexbiodataadminpdfdetailpdf'])->name('pdf.biodataadmindetail');
            });

            Route::prefix('/user')->group(function () {
                Route::get('/', [App\Http\Controllers\PdfController::class, 'indexuserpdf'])->name('pdf.user');
                Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indexuserpdfdetailpdf'])->name('pdf.userdetail');
            });

            Route::get('laporan', [App\Http\Controllers\PdfController::class, 'indexlaporanadmin'])->name('laporan.admin');
        });
    });
});




Route::middleware('role:user')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'indexuser'])->name('home.user');
    Route::get('profile', [App\Http\Controllers\HomeController::class, 'indexprofileuser'])->name('profile.user');
    Route::get('/show', [App\Http\Controllers\MasterController::class, 'showdata'])->name('dashboard.show');
    Route::post('/update', [App\Http\Controllers\MasterController::class, 'updatebiodata'])->name('dahsboard.update');
    Route::get('laporan', [App\Http\Controllers\PdfController::class, 'indexlaporanuser'])->name('laporan.user');

    Route::prefix('/pdf')->group(function () {
        Route::prefix('/pendaftaran1tahun')->group(function () {
            Route::get('/', [App\Http\Controllers\PdfController::class, 'indexpendaftaran1tahunpdf'])->name('pdf.1tahun');
            Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indexpendaftaran1tahundetailpdf'])->name('pdf.1tahundetail');
        });

        Route::prefix('/pendaftaran5tahun')->group(function () {
            Route::get('/', [App\Http\Controllers\PdfController::class, 'indexpendaftaran5tahunpdf'])->name('pdf.5tahun');
            Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indexpendaftaran5tahundetailpdf'])->name('pdf.5tahundetail');
        });

        Route::prefix('/pendaftarankuasa')->group(function () {
            Route::get('/', [App\Http\Controllers\PdfController::class, 'indexpendaftarankuasapdf'])->name('pdf.kuasa');
            Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indexpendaftarankuasadetailpdf'])->name('pdf.kuasadetail');
        });

        Route::prefix('/pendaftaranbalik')->group(function () {
            Route::get('/', [App\Http\Controllers\PdfController::class, 'indexpendaftaranbalikpdf'])->name('pdf.balik');
            Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indexpendaftaranbalikdetailpdf'])->name('pdf.balikdetail');
        });

        Route::prefix('/pendaftaranduplikat')->group(function () {
            Route::get('/', [App\Http\Controllers\PdfController::class, 'indexpendaftaranduplikatpdf'])->name('pdf.duplikat');
            Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indexpendaftaranduplikatdetailpdf'])->name('pdf.duplikatdetail');
        });

        Route::prefix('/biodata')->group(function () {
            Route::get('/detail/{id}', [App\Http\Controllers\PdfController::class, 'indexbiodatapdfdetailpdf'])->name('pdf.biodatadetail');
        });
    });

    Route::prefix('/pendaftaran')->group(function () {
        Route::prefix('/pendaftaran1tahun')->group(function () {
            Route::get('/', [App\Http\Controllers\PendaftaranController::class, 'indexpendaftaran1tahun'])->name('pendaftaran1tahun.index');
            Route::get('/data', [App\Http\Controllers\PendaftaranController::class, 'data'])->name('pendaftaran1tahun.data');
            Route::post('/store', [App\Http\Controllers\PendaftaranController::class, 'storependaftaran1tahun'])->name('pendaftaran1tahun.store');
            Route::get('/show', [App\Http\Controllers\PendaftaranController::class, 'showpendaftaran1tahun'])->name('pendaftaran1tahun.show');
            Route::post('/update', [App\Http\Controllers\PendaftaranController::class, 'updatependaftaran1tahun'])->name('pendaftaran1tahun.update');
            Route::post('/delete', [App\Http\Controllers\PendaftaranController::class, 'deletependaftaran1tahun'])->name('pendaftaran1tahun.delete');
        });

        Route::prefix('/pendaftaran5tahun')->group(function () {
            Route::get('/', [App\Http\Controllers\Pendaftaran5tahunController::class, 'indexpendaftaran5tahun'])->name('pendaftaran5tahun.index');
            Route::get('/data', [App\Http\Controllers\Pendaftaran5tahunController::class, 'data'])->name('pendaftaran5tahun.data');
            Route::post('/store', [App\Http\Controllers\Pendaftaran5tahunController::class, 'storependaftaran5tahun'])->name('pendaftaran5tahun.store');
            Route::get('/show', [App\Http\Controllers\Pendaftaran5tahunController::class, 'showpendaftaran5tahun'])->name('pendaftaran5tahun.show');
            Route::post('/update', [App\Http\Controllers\Pendaftaran5tahunController::class, 'updatependaftaran5tahun'])->name('pendaftaran5tahun.update');
            Route::post('/delete', [App\Http\Controllers\Pendaftaran5tahunController::class, 'deletependaftaran5tahun'])->name('pendaftaran5tahun.delete');
        });

        Route::prefix('/pendaftarankuasa')->group(function () {
            Route::get('/', [App\Http\Controllers\PendaftaranKuasaController::class, 'indexpendaftarankuasa'])->name('pendaftarankuasa.index');
            Route::get('/data', [App\Http\Controllers\PendaftaranKuasaController::class, 'data'])->name('pendaftarankuasa.data');
            Route::post('/store', [App\Http\Controllers\PendaftaranKuasaController::class, 'storependaftarankuasa'])->name('pendaftarankuasa.store');
            Route::get('/show', [App\Http\Controllers\PendaftaranKuasaController::class, 'showpendaftarankuasa'])->name('pendaftarankuasa.show');
            Route::post('/update', [App\Http\Controllers\PendaftaranKuasaController::class, 'updatependaftarankuasa'])->name('pendaftarankuasa.update');
            Route::post('/delete', [App\Http\Controllers\PendaftaranKuasaController::class, 'deletependaftarankuasa'])->name('pendaftarankuasa.delete');
        });

        Route::prefix('/pendaftaranbalik')->group(function () {
            Route::get('/', [App\Http\Controllers\PendaftaranBalikController::class, 'indexpendaftaranbalik'])->name('pendaftaranbalik.index');
            Route::get('/data', [App\Http\Controllers\PendaftaranBalikController::class, 'data'])->name('pendaftaranbalik.data');
            Route::post('/store', [App\Http\Controllers\PendaftaranBalikController::class, 'storependaftaranbalik'])->name('pendaftaranbalik.store');
            Route::get('/show', [App\Http\Controllers\PendaftaranBalikController::class, 'showpendaftaranbalik'])->name('pendaftaranbalik.show');
            Route::post('/update', [App\Http\Controllers\PendaftaranBalikController::class, 'updatependaftaranbalik'])->name('pendaftaranbalik.update');
            Route::post('/delete', [App\Http\Controllers\PendaftaranBalikController::class, 'deletependaftaranbalik'])->name('pendaftaranbalik.delete');
        });

        Route::prefix('/pendaftaranduplikat')->group(function () {
            Route::get('/', [App\Http\Controllers\PendaftaranDuplikatController::class, 'indexpendaftaranduplikat'])->name('pendaftaranduplikat.index');
            Route::get('/data', [App\Http\Controllers\PendaftaranDuplikatController::class, 'data'])->name('pendaftaranduplikat.data');
            Route::post('/store', [App\Http\Controllers\PendaftaranDuplikatController::class, 'storependaftaranduplikat'])->name('pendaftaranduplikat.store');
            Route::get('/show', [App\Http\Controllers\PendaftaranDuplikatController::class, 'showpendaftaranduplikat'])->name('pendaftaranduplikat.show');
            Route::post('/update', [App\Http\Controllers\PendaftaranDuplikatController::class, 'updatependaftaranduplikat'])->name('pendaftaranduplikat.update');
            Route::post('/delete', [App\Http\Controllers\PendaftaranDuplikatController::class, 'deletependaftaranduplikat'])->name('pendaftaranduplikat.delete');
        });
    });
});




// Route::get('user-page', [App\Http\Controllers\HomeController::class, 'index'])->middleware('role:user')->name('user.page');
Route::any('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
