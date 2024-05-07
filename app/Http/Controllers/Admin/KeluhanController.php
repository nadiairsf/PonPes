<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keluhan;
use App\Models\Data_santri;
use App\Models\GeneralChecks;
use Validator;

class KeluhanController extends Controller
{
    //
    public function view()
    {
        $data = Data_Santri::join('kelas','data_santris.kelas','=','kelas.id')
        ->select('data_santris.*','kelas.nama AS kelaz')->orderBy('id', 'DESC')->paginate(10);

        return view('use.data-keluhan', ['data' => $data]);
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

        $table = Keluhan::where('id_santris',$id)->orderBy('id', 'DESC')->paginate(10);

        return view('use.detail-keluhan', ['data' => $data, 'table' => $table]);
    }

    public function viewTambahwanita($id)
    {
        return view('use.tambah-keluhan-wanita', ['id' => $id]);
    }

    public function viewTambahpria($id)
    {
       
        return view('use.tambah-keluhan-pria', ['id' => $id]);
    }

    public function createWanita(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'riwayat_konsumsi'=>'required',
            'keluhan'=>'required',
            'kondisi_umum'=>'required',
            'gatal'=>'required',
            'bentuk_kulit'=>'required',
        ]);
        
      
        if ($validator->fails()) {
            return redirect('admin/diary/viewtambah-keluhan-wanita/'.$request->id_santris)
                ->withErrors($validator)
                ->withInput();
        }

       
        $input = $request->all();
        $keluhan = $input['keluhan'];
        $kondisi_umum = $input['kondisi_umum'];
        $gatal = $input['gatal'];
        $bentuk_kulit = $input['bentuk_kulit'];
        $input['kondisi_umum'] = json_encode($kondisi_umum);
        $input['keluhan']      = json_encode($keluhan);
        $input['gatal']        = json_encode($gatal);
        $input['bentuk_kulit'] = json_encode($bentuk_kulit);
        // $input['keluhan'] = implode(', ',$keluhan);
        // $input['gatal'] = implode(', ',$gatal);
        // $input['bentuk_kulit'] = implode(', ',$bentuk_kulit);

        $save = Keluhan::create($input);
        $direct = $request->id_santris;

        if( $save ){
            return redirect('admin/diary/detail-keluhan/'.$direct)->with('success','menambahkan data keluhan santri');
        }else{
            return redirect()->back()->with('fail','Something went Wrong, failed to register');
        }
    }

    public function createPria(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(),[
            'riwayat_konsumsi'=>'required',
            'keluhan'=>'required',
            'kondisi_umum'=>'required',
            'gatal'=>'required',
            'bentuk_kulit'=>'required',
        ]);
        
      
        if ($validator->fails()) {
            return redirect('admin/diary/viewtambah-keluhan-pria/'.$request->id_santris)
                ->withErrors($validator)
                ->withInput();
        }
        
      
    
         $data = $request->all();
         $data['keluhan']       = json_encode($request->keluhan);
         $data['fisik_pria']    = json_encode($request->fisik_pria);
         $data['kondisi_umum']  = json_encode($request->kondisi_umum);
         $data['gatal']         = json_encode($request->gatal);
         $data['bentuk_kulit']  = json_encode($request->bentuk_kulit);
    
        $save = Keluhan::create($data);
        
    
        $direct = $request->id_santris;

        if( $save ){
            return redirect('admin/diary/detail-keluhan/'.$direct)->with('success','menambahkan data keluhan santri');
        }else{
            return redirect()->back()->with('fail','Gagal menambahkan data keluhan');
        }
    }

    public function editWanita($id)
    {
        $data = Keluhan::where('id',$id)->get();
        
        
        return view('use.edit-keluhan-wanita', ['data' => $data]);

    }
    
    public function editPria($id)
    {
        $data = Keluhan::where('id',$id)->get();
        

        return view('use.edit-keluhan-pria', ['data' => $data]);

    }

    public function updatePria(Request $request, $id)
    {
        // dd($request->all());
        $data = Keluhan::where('id', $id)
        ->update([
           'riwayat_konsumsi'   => $request->riwayat_konsumsi,
           'makanan_terakhir'   => $request->makanan_terakhir,
           'minuman_terakhir'   => $request->minuman_terakhir,
           'ket_keluhan'        => $request->ket_keluhan,
           'ket_kondisi'        => $request->ket_kondisi,
           'mastrubasi'         => $request->mastrubasi,
           'jml_mastrubasi'     => $request->jml_mastrubasi,
           'ket_gatal'          => $request->ket_gatal,
           'waktu_gatal'        => $request->waktu_gatal,
           'lama_gatal'         => $request->lama_gatal,
           'fisik_pria'         =>json_encode($request['fisik_pria']),
           'keluhan'            =>json_encode($request['keluhan']),
           'kondisi_umum'       =>json_encode($request['kondisi_umum']),
           'gatal'              =>json_encode($request['gatal']),
           'bentuk_kulit'       =>json_encode($request['bentuk_kulit']),
        ]);

        $direct = $request->id_santris;

        return redirect('/admin/diary/detail-keluhan/'.$direct)->with('success','edit data keluhan santri');
    }

    public function updateWanita(Request $request, $id)
    {
        //dd($request->all());
        $data = Keluhan::where('id', $id)
        ->update([
           'riwayat_konsumsi'   => $request->riwayat_konsumsi,
           'makanan_terakhir'   => $request->makanan_terakhir,
           'minuman_terakhir'   => $request->minuman_terakhir,
           'ket_keluhan'        => $request->ket_keluhan,
           'ket_kondisi'        => $request->ket_kondisi,
           'nyeri_haid'         => $request->nyeri_haid,
           'lama_nyeri'         => $request->lama_nyeri,
           'lama_haid'          => $request->lama_haid,
           'warna_haid'         => $request->warna_haid,
           'nyeri_payudara'     => $request->nyeri_payudara,
           'benjolan_payudara'  => $request->benjolan_payudara,
           'warna_cairan'       => $request->warna_cairan,
           'bau_cairan'         => $request->bau_cairan,
           'ket_gatal'          => $request->ket_gatal,
           'waktu_gatal'        => $request->waktu_gatal,
           'lama_gatal'         => $request->lama_gatal,
           'keluhan'            => json_encode($request['keluhan']),
           'kondisi_umum'       => json_encode($request['kondisi_umum']),
           'gatal'              => json_encode($request['gatal']),
           'bentuk_kulit'       => json_encode($request['bentuk_kulit']),
        ]);

        $direct = $request->id_santris;

        return redirect('/admin/diary/detail-keluhan/'.$direct)->with('success','edit data keluhan santri');
    }

    public function hapusPria($id)
    {
        $data = Keluhan::where('id', $id)->delete();

        return redirect()->back()->with('success','hapus data keluhan');

    }

    public function hapusWanita($id)
    {
        $data = Keluhan::where('id', $id)->delete();

        return redirect()->back()->with('success','hapus data keluhan');

    }


}
