<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Data_santri;
use App\Models\Data_guru;
use App\Models\Santri;
use App\Models\GeneralChecks;
use App\Models\Keluhan;
use App\Models\Nilai;
use App\Models\Kategori_nilai;
use App\Models\Pelajaran;
use App\Models\Hafalan;
use App\Models\Prestasi;
use App\Models\Kelas;
use App\Models\Giziku;
use Auth;

class DataSantriController extends Controller
{
    //
    public function profil()
    {
        $id =  Auth::id();
        $kelas = Kelas::get();
        $data = Data_santri::where('data_santris.id_santris',$id)
        ->join('kelas','data_santris.kelas','=','kelas.id')
        ->join('santris','data_santris.id_santris','=','santris.id')
        ->select('data_santris.*','kelas.nama AS kelaz','kelas.tahun','santris.email')
        ->get();



        return view('dashboard.santri.edit-profil', ['data' => $data, 'kelas' => $kelas]);
    }

    public function updateProfil(Request $request,$id)
    {
        $id =  Auth::id();
        $data = Data_santri::where('id_santris', $id)
        ->update([
            'nis'            => $request->nis,
            'nama'           => $request->name,
            'tempat_lahir'   => $request->tempat_lahir,
            'tgl_lahir'      => $request->tgl_lahir,
            'status'         => $request->status,
            'jenis_kelamin'  => $request->jk,
            'tgl_masuk'      => $request->tgl_masuk,
            'tgl_keluar'     => $request->tgl_keluar,
            'nama_ortu'      => $request->nama_ortu,
            'tempat_tinggal' => $request->tempat_tinggal,
            'noHp_ortu'      => $request->noHp_ortu,
            'kelas'          => $request->kelas,
            'ket'            => $request->ket,

        ]);
        
       
        return redirect('/santri/home')->with('success','Edit profil!');
    }


    public function view()
    {
        $id =  Auth::id();
        $data = Santri::where('santris.id',$id)
                ->join('data_santris','santris.id','=','data_santris.id_santris')
                ->join('kelas','data_santris.kelas','=','kelas.id')
                ->select('data_santris.*','kelas.nama As kelas')
                ->get();
        
        // dd($id, $data);
       
        return view('dashboard.santri.home', ['data' => $data]);
    }

    public function viewGizi()
    {
        $id =  Auth::id();
        $auth = Data_santri::where('id_santris',$id)->get();

        $data = Data_Santri::where('data_santris.id',$auth[0]->id)
        ->join('kelas','data_santris.kelas','=','kelas.id')
        ->leftJoin('general_checks','data_santris.id','=','general_checks.id_santris') 
        ->select('data_santris.*','kelas.nama AS kelaz','general_checks.imt','general_checks.tinggi_badan','general_checks.berat_badan')
        ->orderBy('general_checks.id','DESC')
        ->limit(1)
        ->get();

        $table = Giziku::where('id_santris',$id)->orderBy('id', 'DESC')->paginate(10);

        return view('dashboard.santri.data-giziku', ['data' => $data, 'table' => $table]);
    }


    public function viewGeneral()
    {
        $id =  Auth::id();
        $data = Data_santri::where('id_santris',$id)->get();

        $table = GeneralChecks::where('id_santris',$data[0]->id)->orderBy('id', 'DESC')->paginate(10);

        return view('dashboard.santri.data-generalcu', ['data' => $data, 'table' => $table]);
    }

    public function detailGeneral($id)
    {    
            $data = GeneralChecks::where('id',$id)->get();
    
            return view('dashboard.santri.detail-generalcu', [ 'data' => $data]);
   
    }

    public function viewKeluhan()
    {
        $id =  Auth::id();
        $data = Data_santri::where('id_santris',$id)->get();

        $table = Keluhan::where('id_santris',$data[0]->id)->orderBy('id', 'DESC')->paginate(10);

        return view('dashboard.santri.data-keluhan', ['data' => $data, 'table' => $table]);
    }

    public function detailWanita($id)
    {
        
        $data = Keluhan::where('id',$id)->get();

        return view('dashboard.santri.detail-keluhan-wanita', ['data' => $data]);

    }
    
    public function detailPria($id)
    {
        $data = Keluhan::where('id',$id)->get();

        return view('dashboard.santri.detail-keluhan-pria', ['data' => $data]);

    }

    
    public function viewNilai()
    {
        $id   = Auth::id();

        $data = Data_santri::where('id_santris',$id)->get();
        $table = Nilai::join('data_santris','nilais.id_santri','=','data_santris.id')
                ->join('kategori_nilais','nilais.id_kat','=','kategori_nilais.id')
                ->where('data_santris.id_santris',$id)
                ->select('nilais.*','kategori_nilais.nama','kategori_nilais.tahun','kategori_nilais.id AS kat')
                ->groupBy('nilais.id_kat')
                ->get();
        
                
        //  dd($id, $table);

        return view('dashboard.santri.data-nilai', ['data'=>$data, 'table'=>$table]);
    }

    public function detailNilai($kat)
    {
        $auth   = Auth::id();
        $id = Data_santri::where('id_santris',$auth)->get();

        $kategori = Kategori_nilai::where('id',$kat)->get();
        $data = Pelajaran::get();
        $nilai= Nilai::where('id_santri',$id[0]->id)
                ->where('id_kat',$kat)
                ->join('pelajarans','nilais.id_mapel','=','pelajarans.id')
                ->select('nilais.*','pelajarans.mapel')
                ->get();

        //dd($nilai,$id,$kat[0]->id);
        return view('dashboard.santri.detail-nilai', ['data' => $data,'nilai' => $nilai, 'id' => $id,'kategori' => $kategori]);

    }

    public function viewHafalan()
    {
        $id   = Auth::id();

        $data = Data_santri::where('id_santris',$id)->get();
        $table = Hafalan::join('data_santris','hafalans.id_santri','=','data_santris.id')
                ->where('data_santris.id_santris',$id)
                ->select('hafalans.*')
                ->orderBy('hafalans.id', 'DESC')
                ->paginate(10);
        
                
        //  dd($id, $table);

        return view('dashboard.santri.data-hafalan', ['data'=>$data, 'table'=>$table]);
    }

    public function viewPrestasi()
    {
        $id   = Auth::id();

        $data = Data_santri::where('id_santris',$id)->get();
        $table = Prestasi::join('data_santris','prestasis.id_santri','=','data_santris.id')
                ->where('data_santris.id_santris',$id)
                ->select('prestasis.*')
                ->orderBy('prestasis.id', 'DESC')
                ->paginate(10);
        
                
        //  dd($id, $table);

        return view('dashboard.santri.data-prestasi', ['data'=>$data, 'table'=>$table]);
    }


}
