<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Konsultasi;
use App\Models\Data_guru;
use App\Models\Data_santri;
use Auth;

class KonsultasiSController extends Controller
{
    //
    public function konsultasi()
    {
        $id   = Auth::id();
        $data = Konsultasi::join('data_santris','konsultasis.id_santri','=','data_santris.id')
                ->join('data_gurus','konsultasis.id_guru','=','data_gurus.id')
                ->where('data_santris.id_santris',$id)
                ->select('konsultasis.*','data_gurus.nama AS guru')
                ->orderBy('id', 'DESC')
                ->paginate(10);
       // dd($id,$data);

      return view('dashboard.santri.konsultasi', ['data' => $data]);
        
    }

    public function createKonsul(Request $request)
    {
        $id   = Auth::id();
        $santri = Data_santri::where('id_santris',$id)->get();
        $data = $request->all();
        //dd($santri[0]->id,$data);

        $data = new Konsultasi;
        $data->id_santri    = $santri[0]->id;
        $data->id_guru      = $request->guru;
        $data->konsultasi   = $request->konsultasi;
        $data->tgl_konsul   = $request->tgl;
        $data->jam_konsul   = $request->jam;
        $data->status       = '0';
    
        $save = $data->save();
        
        return redirect('/santri/konsultasi')->with('success','membuat jadwal konsultasi !');
    }

    public function selectGuru(Request $request)
    {
    	$movies = [];

        if($request->has('q')){
            $search = $request->q;
            $movies =Data_guru::select("id", "nama")
            		->where('nama', 'LIKE', "%$search%")
            		->get();
        }
        
        return response()->json($movies);
    }
    

}
