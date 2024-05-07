<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keluhan;
use App\Models\Data_santri;
use App\Models\GeneralChecks;
use App\Models\Giziku;
use App\Models\Asupan;
use Validator;
use DB;


class GizikuController extends Controller
{
    //
    public function view()
    {
        $data = Data_Santri::join('kelas','data_santris.kelas','=','kelas.id')
        ->select('data_santris.*','kelas.nama AS kelaz')
        ->orderBy('id', 'DESC')
        ->paginate(10);

        return view('use.data-giziku', ['data' => $data]);
    }

    public function detail($id)
    {

        $data = Data_Santri::where('data_santris.id',$id)
                ->join('kelas','data_santris.kelas','=','kelas.id')
                ->leftJoin('general_checks','data_santris.id','=','general_checks.id_santris') 
                ->select('data_santris.*','kelas.nama AS kelaz','general_checks.imt','general_checks.tinggi_badan','general_checks.berat_badan')
                ->orderBy('general_checks.id','DESC')
                ->limit(1)
                ->get();

        $table = Giziku::where('id_santris',$id)->orderBy('id', 'DESC')->paginate(10);

        return view('use.detail-giziku', ['data' => $data, 'table' => $table]);
    }

    public function viewTambah($id)
    {
        $data = $id;
        return view('use.tambah-giziku', ['data' => $data]);
    }

    public function create(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(),[
            'perubahan'             => 'required',
            'gastrointestinal'      => 'required',
            'bab'                   => 'required',
            'bak'                   => 'required',
        ]);
        
      
        if ($validator->fails()) {
            return redirect('/admin/diary/viewtambah-giziku/'.$request->id_santris)
                ->withErrors($validator)
                ->withInput();
        }
        
       
        $save = Giziku::create([
            'id_santris'            => $request->id_santris,
            'ket_bab'               => $request->ket_bab,
            'ket_bak'               => $request->ket_bak,
            'sulit_tidur'           => $request->sulit_tidur,
            'ket_sulittidur'        => $request->ket_sulittidur,
            'ketergantungan'        => $request->ketergantungan,
            'ket_ketergantungan'    => $request->ket_ketergantungan,
            'rata_tidur'            => $request->rata_tidur,
            'keperawatan'           => $request->keperawatan,
            'ket_keperawatan'       => $request->ket_keperawatan,
            'alergi'                => $request->alergi,
            'ket_alergi'            => $request->ket_alergi,
            'perubahan'             => json_encode($request->perubahan),
            'gastrointestinal'      => json_encode($request->gastrointestinal),
            'bab'                   => json_encode($request->bab),
            'bak'                   => json_encode($request->bak),
            
        ]);
       
        $direct = $request->id_santris;

        if( $save ){
            return redirect('admin/diary/detail-giziku/'.$direct)->with('success','Data Keluhan Kesakitan berhasil diinputkan');
        }else{
            return redirect()->back()->with('fail','Something went Wrong, failed to register');
        }
    }

    public function edit($id)
    {
        
        $table = Giziku::where('id',$id)->get();
        
        return view('use.edit-giziku', ['table' => $table]);

    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $data = Giziku::where('id', $id)
        ->update([
           'ket_bab'            => $request->ket_bab,
           'ket_bak'            => $request->ket_bak,
           'rata_tidur'         => $request->rata_tidur,
           'sulit_tidur'        => $request->sulit_tidur,
           'ket_sulittidur'     => $request->ket_sulittidur,
           'ketergantungan'     => $request->ketergantungan,
           'ket_ketergantungan' => $request->ket_ketergantungan,
           'keperawatan'        => $request->keperawatan,
           'ket_keperawatan'    => $request->ket_keperawatan,
           'alergi'             => $request->alergi,
           'ket_alergi'         => $request->ket_alergi,
           'perubahan'          => json_encode($request->perubahan),
           'gastrointestinal'   => json_encode($request->gastrointestinal),
           'bab'                => json_encode($request->bab),
           'bak'                => json_encode($request->bak),
        ]);

        return redirect('/admin/diary/detail-giziku/'.$request->id_santris)->with('success','edit data giziku santri');
    }

    public function hapus($id)
    {
        $data = Giziku::where('id', $id)->delete();

        return redirect()->back()->with('success','hapus data giziku');
    }

    public function viewAsupan($id)
    {
        $data = Data_Santri::where('data_santris.id',$id)->join('kelas','data_santris.kelas','=','kelas.id')
        ->select('data_santris.*','kelas.nama AS kelaz')->get();

        $table = DB::table('asupans')
                ->where('id_santri', $id)
                ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'))
                ->groupBy('date')
                ->orderBy('id', 'DESC')
                ->get();
        
        // $count = count($table);

        //dd($table, $count);
        return view('use.data-asupan', ['data' => $data, 'table' => $table]);
    }

    public function tambahAsupan($id)
    {
        $data = $id;
        return view('use.tambah-asupan', ['data' => $data]);
    }

    function createAsupan(Request $request)
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

    public function detailAsupan($id,$tgl)
    {   
        $table = DB::table('asupans')
                ->where('id_santri', $id)
                ->whereDate('created_at', '=', $tgl)
                ->get();

        // dd($table, $id,$tgl, $table[0]->created_at);

        return view('use.detail-asupan', ['table' => $table]);
    }

    public function editAsupan($id)
    {
        $data = Asupan::where('id', $id)->get();
        return view('use.edit-asupan', ['data' => $data]);
    }

    public function updateAsupan(Request $request,$id)
    {
        $data = Asupan::where('id', $id)
        ->update([
           'jam'   => $request->jam,
           'waktu'   => $request->waktu,
           'ket'   => $request->ket,
        ]);

        return redirect('/admin/diary/detail-asupan/'.$request->id_santri.'/'.$request->created_at)->with('success','update data asupan');
    }

    public function hapusAsupan($id)
    {
        $data = Asupan::where('id', $id)->delete();

        return redirect()->back()->with('success','hapus data asupan');
    }
     
}
