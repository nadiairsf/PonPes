<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Data_santri;
use App\Models\Asupan;
use App\Models\DynamicField;
use Validator;
use DB;

class TestController extends Controller
{
    //
    public function test()
    {
        $filterData = DB::table('sample')->where('teks','LIKE','%'.'ayam'.'%')
                      ->count();

        dd($filterData);
    }

    
    public function selectSearch(Request $request)
    {
    	$movies = [];

        if($request->has('q')){
            $search = $request->q;
            $movies =Data_santri::select("id", "nama")
            		->where('nama', 'LIKE', "%$search%")
            		->get();
        }
        
        return response()->json($movies);
    }

    function index()
    {
     return view('use.addon');
    }

    function insert(Request $request)
    {
        if($request->ajax())
        {
            $rules = array(
            'jam.*'  => 'required',
            'waktu.*'  => 'required',
            'ket.*'  => 'required',
            'id_santri.*'  => 'required'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
            return response()->json([
            'error'  => $error->errors()->all()
            ]);
            }

            $jam = $request->jam;
            $waktu = $request->waktu;
            $ket = $request->ket;
            $id_santri = $request->id_santri;
            //$tgl = Carbon::now();
            for($count = 0; $count < count($jam); $count++)
            {
            $data = array(
            'jam' => $jam[$count],
            'waktu'  => $waktu[$count],
            'ket'  => $ket[$count],
            'id_santri'  => $id_santri[$count],
            
            );
            $insert_data[] = $data; 
            }

            Asupan::insert($insert_data);
            return response()->json([
            'success'  => 'Berhasil menambahkan data riwayat gizi.'
            ]);
        }

    }

        

   
}
