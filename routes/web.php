<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PengajarController;
use App\Http\Controllers\Admin\SantriController;
use App\Http\Controllers\Admin\GeneralController;
use App\Http\Controllers\Admin\KeluhanController;
use App\Http\Controllers\Admin\GizikuController;
use App\Http\Controllers\Admin\CapaianController;
use App\Http\Controllers\Admin\KonsultasiController;

use App\Http\Controllers\Admin\TestController;

use App\Http\Controllers\Santri\SantriLogController;
use App\Http\Controllers\Santri\DataSantriController;
use App\Http\Controllers\Santri\GiziSController;
use App\Http\Controllers\Santri\KonsultasiSController;

use App\Http\Controllers\Guru\GuruController;
use App\Http\Controllers\Guru\DataGuruController;
use App\Http\Controllers\Guru\KonsultasiGController;

use App\Http\Controllers\Wali\WaliLogController;
use App\Http\Controllers\Wali\DataWaliController;


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



Route::view('/','index')->name('/');
Route::view('/profil','dashboard.wali.profil');
Route::view('/dashboard-wali', 'dashboard.wali.data-general');
Route::get('dynamic-field', [TestController::class,'index']);
Route::post('post/dynamic-field', [TestController::class,'insert'])->name('santri.createAsupan');


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::prefix('user')->name('user.')->group(function(){
  
//     Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
//           Route::view('/login','dashboard.user.login')->name('login');
//           Route::view('/register','dashboard.user.register')->name('register');
//           Route::post('/create',[UserController::class,'create'])->name('create');
//           Route::post('/check',[UserController::class,'check'])->name('check');
//     });

//     Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
//           Route::view('/home','dashboard.user.home')->name('home');
//           Route::post('/logout',[UserController::class,'logout'])->name('logout');
//           Route::get('/add-new',[UserController::class,'add'])->name('add');
//     });

// });



Route::prefix('admin')->name('admin.')->group(function(){
       
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.admin.login')->name('login');
          Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
        Route::get('/change-account', [AdminController::class, 'changeAccount'])->name('changeAccount');
        Route::post('/change-account', [AdminController::class, 'changeAccountSave'])->name('postChangeAccount');
        Route::get('/change-password', [AdminController::class, 'changePassword'])->name('changePassword');
        Route::post('/change-password', [AdminController::class, 'changePasswordSave'])->name('postChangePassword');

        Route::prefix('profil')->group(function () {
            Route::get('/data-pengajar', [PengajarController::class,'view'])->name('data-pengajar');
            Route::post('/data-pengajar/create',[PengajarController::class,'create'])->name('createPengajar');
            Route::get('/data-pengajar/detail/{id}',[PengajarController::class,'detail'])->name('detail-pengajar');
            Route::post('/data-pengajar/update/{id}',[PengajarController::class,'update'])->name('updatePengajar');
            Route::get('/data-pengajar/hapus/{id}',[PengajarController::class,'hapus'])->name('hapusPengajar');

            Route::get('data-santri', [SantriController::class,'view'])->name('data-santri');
            Route::post('/data-santri/create',[SantriController::class,'create'])->name('createSantri');
            Route::get('tambah-santri', [SantriController::class,'viewTambah'])->name('tambah-santri');
            Route::get('/data-santri/hapus/{id}',[SantriController::class,'hapus'])->name('hapusSantri');
            Route::get('/data-santri/detail/{id}',[SantriController::class,'detail'])->name('detail-santri');
            Route::post('/data-santri/update/{id}',[SantriController::class,'update'])->name('updateSantri');

            Route::view('tambah-pengajar', 'use.tambah-pengajar')->name('tambah-pengajar');

            

        
        });

        Route::prefix('diary')->group(function () {
            Route::get('data-generalcheckup', [GeneralController::class,'view'])->name('data-generalcheckup');
            //Route::get('nama-search', [SantriController::class,'selectSearch'])->name('selectSearch');
            Route::get('ajax-autocomplete-search', [TestController::class,'selectSearch']);
            //Route::post('/general/search',[GeneralController::class,'search'])->name('general.search');
            Route::get('detail-generalcheckup/{id}', [GeneralController::class,'detail'])->name('generalcheckup');
            Route::get('viewtambah-generalcheckup/{id}', [GeneralController::class,'viewTambah'])->name('viewTambah');
            Route::post('/general-checkup/create',[GeneralController::class,'create'])->name('createGeneralCU');
            Route::get('/general-checkup/edit/{id}',[GeneralController::class,'viewEdit'])->name('editGeneralCU');
            Route::post('/general-checkup/update/{id}',[GeneralController::class,'update'])->name('updateGeneralCU');
            Route::get('/general-checkup/hapus/{id}',[GeneralController::class,'hapus'])->name('hapusGeneralCU');
            
            Route::get('data-keluhan', [KeluhanController::class,'view'])->name('data-keluhan');
            Route::get('detail-keluhan/{id}', [KeluhanController::class,'detail']);
            Route::get('viewtambah-keluhan-wanita/{id}', [KeluhanController::class,'viewTambahwanita'])->name('viewKeluhwanita');
            Route::get('viewtambah-keluhan-pria/{id}', [KeluhanController::class,'viewTambahpria'])->name('viewKeluhpria');
            Route::post('/keluhan-wanita/create',[KeluhanController::class,'createWanita'])->name('createWanita');
            Route::post('/keluhan-pria/create',[KeluhanController::class,'createPria'])->name('createPria');
            Route::get('edit-keluhan-wanita/{id}', [KeluhanController::class,'editWanita']);
            Route::get('edit-keluhan-pria/{id}', [KeluhanController::class,'editPria']);
            Route::post('update-keluhan-wanita/{id}', [KeluhanController::class,'updateWanita']);
            Route::post('update-keluhan-pria/{id}', [KeluhanController::class,'updatePria']);
            Route::get('hapus-keluhan-wanita/{id}', [KeluhanController::class,'hapusWanita']);
            Route::get('hapus-keluhan-pria/{id}', [KeluhanController::class,'hapusPria']);



            Route::get('data-giziku', [GizikuController::class,'view'])->name('data-giziku');
            Route::get('detail-giziku/{id}', [GizikuController::class,'detail']);
            Route::get('edit-giziku/{id}', [GizikuController::class,'edit']);
            Route::post('update-giziku/{id}', [GizikuController::class,'update']);
            Route::get('hapus-giziku/{id}', [GizikuController::class,'hapus']);

            Route::get('viewtambah-giziku/{id}', [GizikuController::class,'viewTambah']);
            Route::post('giziku/create',[GizikuController::class,'create'])->name('createGiziku');
            Route::get('data-asupan/{id}', [GizikuController::class,'viewAsupan'])->name('data-asupan');
            Route::get('tambah-asupan/{id}', [GizikuController::class,'tambahAsupan']);
            Route::post('asupan/create',     [GizikuController::class,'createAsupan'])->name('createAsupan');
            Route::get('detail-asupan/{id}/{tgl}', [GizikuController::class,'detailAsupan']);
            Route::get('edit-asupan/{id}', [GizikuController::class,'editAsupan']);
            Route::post('update-asupan/{id}', [GizikuController::class,'updateAsupan']);
            Route::get('hapus-asupan/{id}', [GizikuController::class,'hapusAsupan']);
   

            Route::view('tambah-keluhan-wanita', 'use.tambah-keluhan-wanita');
            Route::view('tambah-keluhan-pria', 'use.tambah-keluhan-pria');
            Route::view('tambah-giziku', 'use.tambah-giziku')->name('tambah-giziku');
        });

        Route::prefix('capaian')->group(function () {
            Route::get('data-pelajaran', [CapaianController::class,'viewPelajaran'])->name('data-pelajaran');
            Route::get('pelajaran/detail/{id}', [CapaianController::class,'editPelajaran']);
            Route::post('pelajaran/update/{id}', [CapaianController::class,'updatePelajaran']);
            Route::post('pelajaran/create',[CapaianController::class,'createPelajaran'])->name('createPelajaran');
            Route::get('mapel/hapus/{id}',[CapaianController::class,'hapusPelajaran'])->name('hapusPelajaran');

            Route::get('selectMapel',  [CapaianController::class,'selectMapel']);
            Route::get('selectGuru',   [CapaianController::class,'selectGuru']);
            Route::get('selectKelas',  [CapaianController::class,'selectKelas']);
            Route::get('selectSantri', [CapaianController::class,'selectSantri']);

            Route::get('jadwal', [CapaianController::class,'viewJadwal'])->name('data-japel');
            Route::view('jadwal/tambah', 'use.tambah-jadwalPelajaran')->name('tambah-japel');
            Route::post('jadwal/create',[CapaianController::class,'createJadwal'])->name('createJadwal');
            Route::get('jadwal/detail/{id}', [CapaianController::class,'detailJadwal'])->name('detail-japel');
            Route::post('jadwal/update/{id}',[CapaianController::class,'updateJadwal']);
            Route::get('jadwal/hapus/{id}', [CapaianController::class,'hapusJadwal'])->name('hapus-japel');
            

            Route::get('data-kelas', [CapaianController::class,'viewKelas'])->name('data-kelas');
            Route::post('kelas/create',[CapaianController::class,'createKelas'])->name('createKelas');
            Route::get('listSantri/{id}',[CapaianController::class,'editKelas'])->name('listKelas');
            Route::get('kelas/hapus/{id}',[CapaianController::class,'hapusKelas']);
           // Route::post('listSantri/create',[CapaianController::class,'createList'])->name('createList');
          
            Route::get('data-semester', [CapaianController::class,'viewSemester'])->name('data-semester');
            Route::post('semester/create', [CapaianController::class,'createSemester'])->name('createSemester');
            Route::get('aktif/{id}', [CapaianController::class,'aktifSemester']);
            Route::get('non-aktif/{id}', [CapaianController::class,'nonaktifSemester']);
            Route::get('semester/edit/{id}', [CapaianController::class,'editSemester']);
            Route::post('semester/update/{id}', [CapaianController::class,'updateSemester']);
            Route::get('semester/hapus/{id}', [CapaianController::class,'hapusSemester']);

            Route::get('tambah-nilai/{id}', [CapaianController::class,'tambahNilai']);
            Route::get('data-nilai/{id}', [CapaianController::class,'viewNilai']);
            Route::get('detail-nilai/{id}/{kat}',[CapaianController::class,'detailNilai']);
            Route::get('edit-nilai/{id}',[CapaianController::class,'editNilai']);
            Route::post('update-nilai/{id}',[CapaianController::class,'updateNilai']);
            Route::post('createNilai',[CapaianController::class,'createNilai'])->name('createNilai');

            Route::get('tambah-hafalan/{id}', [CapaianController::class,'viewHafalan']);
            Route::post('hafalan/create/{id}', [CapaianController::class,'createHafalan']);
            Route::get('hafalan/hapus/{id}', [CapaianController::class,'hapusHafalan']);

            Route::get('tambah-prestasi/{id}', [CapaianController::class,'viewPrestasi']);
            Route::post('prestasi/create/{id}', [CapaianController::class,'createPrestasi']);
            Route::get('prestasi/hapus/{id}', [CapaianController::class,'hapusPrestasi']);
          
            Route::view('tambah-pelajaran', 'use.tambah-pelajaran')->name('tambah-pelajaran');
            Route::view('tambah-kelas', 'use.tambah-kelas')->name('tambah-kelas');
            Route::view('tambah-nilai', 'use.tambah-nilai')->name('tambah-nilai');
        });

        
        Route::prefix('konsultasi')->group(function () {
            Route::get('data-konsultasi', [KonsultasiController::class,'view'])->name('data-konsultasi');
            Route::get('selectGuru', [KonsultasiController::class,'selectGuru']);
            Route::get('konfirmasi/{id}', [KonsultasiController::class,'statusKonfir']);
            Route::get('tolak/{id}', [KonsultasiController::class,'statusTolak']);
            Route::get('edit/{id}', [KonsultasiController::class,'edit']);
            Route::post('update/{id}', [KonsultasiController::class,'update']);
            Route::get('hasil/{id}', [KonsultasiController::class,'hasil']);
            Route::post('update-hasil/{id}', [KonsultasiController::class,'hasilUpdate']);
            
          
        
        });

    });

});

Route::prefix('guru')->name('guru.')->group(function(){

       Route::middleware(['guest:guru','PreventBackHistory'])->group(function(){
            Route::view('/login','dashboard.guru.login')->name('login');
            Route::view('/register','dashboard.guru.register')->name('register');
            Route::post('/create',[GuruController::class,'create'])->name('create');
            Route::post('/check',[GuruController::class,'check'])->name('check');

            Route::get('/password/forgot',[GuruController::class,'showForgotForm'])->name('forgot.password.form');
            Route::post('/password/forgot',[GuruController::class,'sendResetLink'])->name('forgot.password.link');
            Route::get('/password/reset/{token}',[GuruController::class,'showResetForm'])->name('reset.password.form');
            Route::post('/password/reset',[GuruController::class,'resetPassword'])->name('reset.password');
       });

       Route::middleware(['auth:guru','PreventBackHistory'])->group(function(){
            Route::get('/home',[DataGuruController::class,'view'])->name('home');
            Route::get('/detail-kelas/{id}',[DataGuruController::class,'detailKelas'])->name('detail-kelas');
            Route::get('/edit-hafalan/{id}',[DataGuruController::class,'editHafalan'])->name('edit-hafalan');
            Route::post('/create-hafalan/{id}',[DataGuruController::class,'createHafalan'])->name('create-hafalan');
            Route::get('/hapus-hafalan/{id}',[DataGuruController::class,'hapusHafalan'])->name('hapus-hafalan');
            Route::get('/edit-prestasi/{id}',[DataGuruController::class,'editPrestasi']);
            Route::post('/create-prestasi/{id}',[DataGuruController::class,'createPrestasi']);
            Route::get('/hapus-prestasi/{id}',[DataGuruController::class,'hapusPrestasi']);
            Route::get('/nilai/{id}',[DataGuruController::class,'viewNilai']);
            Route::get('/tambah-nilai/{id}',[DataGuruController::class,'tambahNilai']);
            Route::post('/create-nilai',[DataGuruController::class,'createNilai'])->name('createNilai');
            Route::get('/detail-nilai/{id}/{kat}',[DataGuruController::class,'detailNilai']);
            Route::get('/edit-nilai/{id}',[DataGuruController::class,'editNilai']);
            Route::post('update-nilai/{id}',[DataGuruController::class,'updateNilai']);
            Route::get('/hapus-nilai/{id}/{kat}',[DataGuruController::class,'hapusNilai']);

            Route::get('/konsultasi',[KonsultasiGController::class,'konsultasi'])->name('konsultasi');
            Route::post('/search',[KonsultasiGController::class,'search'])->name('konsultasi.search');
            Route::get('/selectGuru', [KonsultasiGController::class,'selectGuru']);
            Route::get('/konsul-konfirmasi/{id}',[KonsultasiGController::class,'konfirmasi']);
            Route::get('/konsul-tolak/{id}',[KonsultasiGController::class,'tolak']);
            Route::get('/konsul-edit/{id}',[KonsultasiGController::class,'edit']);
            Route::post('/konsul-update/{id}',[KonsultasiGController::class,'update']);
            Route::get('/konsul-hasil/{id}', [KonsultasiGController::class,'hasil']);
            Route::post('/update-hasil/{id}', [KonsultasiGController::class,'hasilUpdate']);
            

            Route::post('logout',[GuruController::class,'logout'])->name('logout');
            Route::get('/change-account', [GuruController::class, 'changeAccount'])->name('changeAccount');
            Route::post('/change-account', [GuruController::class, 'changeAccountSave'])->name('postChangeAccount');
            Route::get('/change-password', [GuruController::class, 'changePassword'])->name('changePassword');
            Route::post('/change-password', [GuruController::class, 'changePasswordSave'])->name('postChangePassword');
       });

});

Route::prefix('wali')->name('wali.')->group(function(){

    Route::middleware(['guest:wali','PreventBackHistory'])->group(function(){
         Route::view('/login','dashboard.wali.login')->name('login');
         Route::view('/register','dashboard.wali.register')->name('register');
         Route::post('/create',[WaliLogController::class,'create'])->name('create');
         Route::post('/check',[WaliLogController::class,'check'])->name('check');

         Route::get('/password/forgot',[WaliLogController::class,'showForgotForm'])->name('forgot.password.form');
         Route::post('/password/forgot',[WaliLogController::class,'sendResetLink'])->name('forgot.password.link');
         Route::get('/password/reset/{token}',[WaliLogController::class,'showResetForm'])->name('reset.password.form');
         Route::post('/password/reset',[WaliLogController::class,'resetPassword'])->name('reset.password');
    });

    Route::middleware(['auth:wali','PreventBackHistory'])->group(function(){
         Route::get('/home',[DataWaliController::class,'view'])->name('home');
         Route::post('logout',[WaliLogController::class,'logout'])->name('logout');
         Route::get('/change-account', [WaliLogController::class, 'changeAccount'])->name('changeAccount');
         Route::post('/change-account', [WaliLogController::class, 'changeAccountSave'])->name('postChangeAccount');
         Route::get('/change-password', [WaliLogController::class, 'changePassword'])->name('changePassword');
         Route::post('/change-password', [WaliLogController::class, 'changePasswordSave'])->name('postChangePassword');
       

         Route::get('data-general',[DataWaliController::class,'viewGeneral'])->name('data-general');
         Route::get('detail-general/{id}',[DataWaliController::class,'detailGeneral']);
         
         Route::get('data-keluhan',[DataWaliController::class,'viewKeluhan'])->name('data-keluhan');
         Route::get('detail/keluhan-pria/{id}',[DataWaliController::class,'detailPria']);
         Route::get('detail/keluhan-wanita/{id}',[DataWaliController::class,'detailWanita']);


         Route::get('data-asupan',[DataWaliController::class,'viewAsupan'])->name('data-asupan');
         Route::get('detail-asupan/{id}/{tgl}', [DataWaliController::class,'detailAsupan']);

         Route::get('data-giziku',[DataWaliController::class,'viewGiziku'])->name('data-giziku');

         Route::get('data-nilai',[DataWaliController::class,'viewNilai'])->name('data-nilai');
         Route::get('data-hafalan',[DataWaliController::class,'viewHafalan'])->name('data-hafalan');
         Route::get('data-prestasi',[DataWaliController::class,'viewPrestasi'])->name('data-prestasi');
         Route::get('detail-nilai/{kat}/{id}',[DataWaliController::class,'detailNilai']);
    });

    

});

Route::prefix('santri')->name('santri.')->group(function(){
  
    Route::middleware(['guest:santri','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.santri.login')->name('login');
          Route::view('/register','dashboard.santri.register')->name('register');
          Route::post('/create',[SantriLogController::class,'create'])->name('create');
          Route::post('/check',[SantriLogController::class,'check'])->name('check');

          Route::get('/password/forgot',[SantriLogController::class,'showForgotForm'])->name('forgot.password.form');
          Route::post('/password/forgot',[SantriLogController::class,'sendResetLink'])->name('forgot.password.link');
          Route::get('/password/reset/{token}',[SantriLogController::class,'showResetForm'])->name('reset.password.form');
          Route::post('/password/reset',[SantriLogController::class,'resetPassword'])->name('reset.password');
    });

    Route::middleware(['auth:santri','PreventBackHistory'])->group(function(){
          Route::get('/home',[DataSantriController::class,'view'])->name('home');
          Route::post('/logout',[SantriLogController::class,'logout'])->name('logout');
          Route::get('/add-new',[SantriLogController::class,'add'])->name('add');
          Route::get('/change-account', [SantriLogController::class, 'changeAccount'])->name('changeAccount');
          Route::post('/change-account', [SantriLogController::class, 'changeAccountSave'])->name('postChangeAccount');
          Route::get('/change-password', [SantriLogController::class, 'changePassword'])->name('changePassword');
          Route::post('/change-password', [SantriLogController::class, 'changePasswordSave'])->name('postChangePassword');

          Route::get('konsultasi',[KonsultasiSController::class,'konsultasi'])->name('konsultasi');
          Route::view('tambah-konsultasi','dashboard.santri.tambah-konsultasi')->name('tambahKonsul');
          Route::get('selectGuru',   [KonsultasiSController::class,'selectGuru']);
          Route::post('createKonsul',[KonsultasiSController::class,'createKonsul'])->name('createKonsul');

          Route::get('edit-profil',[DataSantriController::class,'profil']);
          Route::post('update-profil/{id}',[DataSantriController::class,'updateProfil']);
         
          Route::get('data-general',[DatasantriController::class,'viewGeneral'])->name('data-general');
          Route::get('detail-general/{id}',[DatasantriController::class,'detailGeneral']);
          Route::get('data-keluhan',[DataSantriController::class,'viewKeluhan'])->name('data-keluhan');
          Route::get('detail/keluhan-pria/{id}',[DataSantriController::class,'detailPria']);
          Route::get('detail/keluhan-wanita/{id}',[DataSantriController::class,'detailWanita']);


          Route::get('data-giziku',[DataSantriController::class,'viewGizi'])->name('data-giziku');

          Route::get('data-asupan',[GiziSController::class,'view'])->name('data-asupan');
          Route::get('detail-asupan/{id}/{tgl}',[GiziSController::class,'detail']);
          Route::get('tambah-asupan',[GiziSController::class,'tambah']);
          Route::post('create-asupan',[GiziSController::class,'create']);

          Route::get('data-nilai',[DataSantriController::class,'viewNilai'])->name('data-nilai');
          Route::get('data-hafalan',[DataSantriController::class,'viewHafalan'])->name('data-hafalan');
          Route::get('data-prestasi',[DataSantriController::class,'viewPrestasi'])->name('data-prestasi');
          Route::get('detail-nilai/{kat}',[DataSantriController::class,'detailNilai']);



    });

});