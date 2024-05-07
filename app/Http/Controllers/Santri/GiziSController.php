<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use Validator;
use App\Models\Asupan;
use App\Models\Data_santri;

class GiziSController extends Controller
{
    //
    public function view()
    {
        $id   = Auth::id();

        $data = Data_Santri::where('data_santris.id_santris',$id)->join('kelas','data_santris.kelas','=','kelas.id')
        ->select('data_santris.*','kelas.nama AS kelaz')->get();

        $table = DB::table('asupans')
                ->join('data_santris','asupans.id_santri','=','data_santris.id')
                ->join('santris','data_santris.id_santris','=','santris.id')
                ->where('data_santris.id_santris', $id)
                ->select(DB::raw('DATE(asupans.created_at) as date'), DB::raw('count(*) as views'))
                ->groupBy('date')
                ->orderBy('asupans.id', 'DESC')
                ->paginate(10);
        
        // $count = count($table);

        //dd($id, $table);
        return view('dashboard.santri.data-asupan', ['data' => $data, 'table' => $table]);
    }

    public function detail($id,$tgl)
    {   
        $table = DB::table('asupans')
                ->where('id_santri', $id)
                ->whereDate('created_at', '=', $tgl)
                ->get();

        // dd($table, $id,$tgl, $table[0]->created_at);

        return view('dashboard.santri.detail-asupan', ['table' => $table]);
    }

    public function tambah()
    {
        $id   = Auth::id();
        $data = Data_Santri::join('santris','data_santris.id_santris','=','santris.id')
        ->where('data_santris.id_santris',$id)
        ->select('data_santris.id')
        ->get();

        // dd($data[0]->id);
        return view('dashboard.santri.tambah-asupan', ['data' => $data]);
    }

    function create(Request $request)
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
