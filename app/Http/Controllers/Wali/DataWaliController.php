<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Data_santri;
use App\Models\Wali;
use App\Models\GeneralChecks;
use App\Models\Keluhan;
use App\Models\Nilai;
use App\Models\Hafalan;
use App\Models\Prestasi;
use App\Models\Pelajaran;
use App\Models\Kategori_nilai;
use App\Models\Giziku;
use Auth;
use DB;

class DataWaliController extends Controller
{
    //
    public function view()
    {
        $id =  Auth::id();
        $data = Wali::where('walis.id',$id)
                ->join('santris','walis.id_santri','=','santris.id')
                ->join('data_santris','santris.id','=','data_santris.id_santris')
                ->join('kelas','data_santris.kelas','=','kelas.id')
                ->select('walis.*','data_santris.*','kelas.nama As kelas')
                ->get();
        
        //dd($id);
       
        return view('dashboard.wali.home', ['data' => $data]);
    }

    public function viewGiziku()
    {
        $id =  Auth::id();
        $auth = Wali::where('walis.id',$id)
                ->join('santris','walis.id_santri','=','santris.id')
                ->join('data_santris','santris.id','=','data_santris.id_santris')
                ->get();

        $data = Data_Santri::where('data_santris.id',$auth[0]->id)
        ->join('kelas','data_santris.kelas','=','kelas.id')
        ->leftJoin('general_checks','data_santris.id','=','general_checks.id_santris') 
        ->select('data_santris.*','kelas.nama AS kelaz','general_checks.imt','general_checks.tinggi_badan','general_checks.berat_badan')
        ->orderBy('general_checks.id','DESC')
        ->limit(1)
        ->get();

        $table = Giziku::where('id_santris',$id)->orderBy('id','DESC')->paginate(10);

        return view('dashboard.wali.data-giziku', ['data' => $data, 'table' => $table]);
    }

    
    public function viewGeneral()
    {
        $id =  Auth::id();
        $data = Wali::where('walis.id',$id)
                ->join('santris','walis.id_santri','=','santris.id')
                ->join('data_santris','santris.id','=','data_santris.id_santris')
                ->get();
        
        $table = GeneralChecks::where('id_santris',$data[0]->id)->orderBy('id','DESC')->paginate(10);
        
        // dd($id, $data);
       
        return view('dashboard.wali.data-generalcu', ['data' => $data, 'table' => $table]);
    }

    public function detailGeneral($id)
    {    
        $auth =  Auth::id();
        $cek = Wali::where('walis.id',$auth)
        ->join('santris','walis.id_santri','=','santris.id')
        ->join('data_santris','santris.id','=','data_santris.id_santris')
        ->get();
        
        $data = GeneralChecks::where('id',$id)->where('id_santris',$cek[0]->id)->get();
    
        return view('dashboard.wali.detail-generalcu', [ 'data' => $data]);
   
    }
    
    public function viewKeluhan()
    {
        $id =  Auth::id();
        $data = Wali::where('walis.id',$id)
                ->join('santris','walis.id_santri','=','santris.id')
                ->join('data_santris','santris.id','=','data_santris.id_santris')
                ->get();
        
        $table = Keluhan::where('id_santris',$data[0]->id)->orderBy('id','DESC')->paginate(10);

        return view('dashboard.wali.data-keluhan', ['data' => $data, 'table' => $table]);
    }

    public function detailWanita($id)
    {
        $auth =  Auth::id();
        $cek = Wali::where('walis.id',$auth)
        ->join('santris','walis.id_santri','=','santris.id')
        ->join('data_santris','santris.id','=','data_santris.id_santris')
        ->get();

        $data = Keluhan::where('id',$id)->where('id_santris',$cek[0]->id)->get();

        return view('dashboard.wali.detail-keluhan-wanita', ['data' => $data]);

    }
    
    public function detailPria($id)
    {
        $auth =  Auth::id();
        $cek = Wali::where('walis.id',$auth)
        ->join('santris','walis.id_santri','=','santris.id')
        ->join('data_santris','santris.id','=','data_santris.id_santris')
        ->get();

        $data = Keluhan::where('id',$id)->where('id_santris',$cek[0]->id)->get();

        return view('dashboard.wali.detail-keluhan-pria', ['data' => $data]);

    }

    public function viewAsupan()
    {
        $id =  Auth::id();
        $data = Wali::where('walis.id',$id)
                ->join('santris','walis.id_santri','=','santris.id')
                ->join('data_santris','santris.id','=','data_santris.id_santris')
                ->get();
        
        $table = DB::table('asupans')
        ->join('data_santris','asupans.id_santri','=','data_santris.id')
        ->join('santris','data_santris.id_santris','=','santris.id')
        ->where('data_santris.id', $data[0]->id)
        ->select(DB::raw('DATE(asupans.created_at) as date'), DB::raw('count(*) as views'))
        ->groupBy('date')
        ->orderBy('asupans.id','DESC')
        ->paginate(10);
       
        return view('dashboard.wali.data-asupan', ['data' => $data, 'table' => $table]);
    }

    public function detailAsupan($id,$tgl)
    {   
        $table = DB::table('asupans')
                ->where('id_santri', $id)
                ->whereDate('created_at', '=', $tgl)
                ->get();

        // dd($table, $id,$tgl, $table[0]->created_at);

        return view('dashboard.wali.detail-asupan', ['table' => $table]);
    }


    public function viewNilai()
    {
        $id   = Auth::id();

        $data = Wali::where('walis.id',$id)
                ->join('santris','walis.id_santri','=','santris.id')
                ->join('data_santris','santris.id','=','data_santris.id_santris')
                ->select('data_santris.id')
                ->get();

        $table = Nilai::join('data_santris','nilais.id_santri','=','data_santris.id')
                ->join('kategori_nilais','nilais.id_kat','=','kategori_nilais.id')
                ->where('data_santris.id',$data[0]->id)
                ->select('nilais.*','kategori_nilais.nama','kategori_nilais.tahun','kategori_nilais.id AS kat')
                ->groupBy('nilais.id_kat')
                ->get();

                // dd($table);
        return view('dashboard.wali.data-nilai', ['data'=>$data, 'table'=>$table]);
    }

    public function detailNilai($kat,$id)
    {
         // dd($id,$kat[0]);
         $kategori = Kategori_nilai::where('id',$kat)->get();
         // $santri = Data_santri::where('id',$id)->select('id')->get();
         $data = Pelajaran::get();
         $nilai= Nilai::where('id_santri',$id)
                 ->where('id_kat',$kat)
                 ->join('pelajarans','nilais.id_mapel','=','pelajarans.id')
                 ->select('nilais.*','pelajarans.mapel')
                 ->get();
 

        // dd($id,$kat,$nilai);
        return view('dashboard.wali.detail-nilai', ['data' => $data,'nilai' => $nilai, 'id' => $id,'kategori' => $kategori]);

    }

    public function viewHafalan()
    {
        $id   = Auth::id();

        $data = Wali::where('walis.id',$id)
                ->join('santris','walis.id_santri','=','santris.id')
                ->join('data_santris','santris.id','=','data_santris.id_santris')
                ->select('data_santris.id')
                ->get();

        $table = Hafalan::join('data_santris','hafalans.id_santri','=','data_santris.id')
                ->where('data_santris.id',$data[0]->id)
                ->select('hafalans.*')
                ->orderBy('hafalans.id','DESC')
                ->paginate(10);
        
                
        //  dd($id, $table);

        return view('dashboard.wali.data-hafalan', ['data'=>$data, 'table'=>$table]);
    }

    public function viewPrestasi()
    {
        $id   = Auth::id();

         $data = Wali::where('walis.id',$id)
                ->join('santris','walis.id_santri','=','santris.id')
                ->join('data_santris','santris.id','=','data_santris.id_santris')
                ->select('data_santris.id')
                ->get();

        $table = Prestasi::join('data_santris','prestasis.id_santri','=','data_santris.id')
                ->where('data_santris.id',$data[0]->id)
                ->select('prestasis.*')
                ->orderBy('prestasis.id','DESC')
                ->paginate(10);
        
                
        //  dd($id, $table);

        return view('dashboard.wali.data-prestasi', ['data'=>$data, 'table'=>$table]);
    }
}
