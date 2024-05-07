<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Data_Santri;
use App\Models\GeneralChecks;
use Validator;

class GeneralController extends Controller
{
    //

    public function view()
    {
        $data = Data_Santri::join('kelas','data_santris.kelas','=','kelas.id')
                ->select('data_santris.*','kelas.nama AS kelaz')
                ->orderBy('id', 'DESC')
                ->paginate(10);

        return view('use.data-generalcheckup', ['data' => $data]);
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

        $table = GeneralChecks::where('id_santris',$id)->orderBy('id', 'DESC')->get();

        return view('use.detail-generalcu', ['data' => $data, 'table' => $table]);
    }

    public function viewTambah($id)
    {
        
        return view('use.tambah-generalcu',['id' => $id]);
    }

    public function create(Request $request)
    {

        $direct = $request->id_santris;

         $validator = Validator::make($request->all(),[
            'tekanan_darah'=>'required',
            'spo2'=>'required',
            'suhu'=>'required',
            'nadi'=>'required',
            'respiration_rate'=>'required',
            'tb'=>'required',
            'bb'=>'required',
        ]);
        
      
        if ($validator->fails()) {
            return redirect('admin/diary/viewtambah-generalcheckup/'.$direct)
                ->withErrors($validator)
                ->withInput();
        }

         $tb = $request->tb / 100;
         $htb = $tb * $tb;
         $imt = $request->bb / $htb;
         

         if($imt < 17){
            $himt = 'Sangat Kurus';
         }else if ($imt <= 18.5){
            $himt = 'Kurus';
         }else if($imt <= 25){
            $himt = 'Normal';
         }else if($imt < 27){
            $himt = 'Gemuk';
         }else{
            $himt = 'Obesitas';
         }


         $data = new GeneralChecks;
         $data->id_santris = $request->id_santris;
         $data->tekanan_darah = $request->tekanan_darah;
         $data->spo2 = $request->spo2;
         $data->suhu = $request->suhu;
         $data->nadi = $request->nadi;
         $data->imt = $himt;
         $data->respiration_rate = $request->respiration_rate;
         $data->tinggi_badan = $request->tb;
         $data->berat_badan = $request->bb;
         $data->riwayat_penyakit = $request->riwayat;
         $data->obat_konsumsi = $request->konsumsi;
         $data->alergi = $request->alergi;
         $data->keterangan = $request->keterangan;
         $save = $data->save();

   

         if( $save ){
            return redirect('admin/diary/detail-generalcheckup/'.$direct)->with('success','menammbahkan data General Check Up');
        }else{
            return redirect()->back()->with('fail','Something went Wrong, failed to register');
        }
    }

    public function viewEdit($id)
    {

        // dd($id);
        $data = GeneralChecks::where('id',$id)->get();

        return view('use.edit-generalcu',['data' => $data]);

    }

    public function update(Request $request, $id)
    {
        // dd($id);
        $data = GeneralChecks::where('id', $id)
        ->update([
            'tekanan_darah'     => $request->tekanan_darah,
            'spo2'              => $request->spo2,
            'suhu'              => $request->suhu,
            'nadi'              => $request->nadi,
            'respiration_rate'  => $request->respiration_rate,
            'tinggi_badan'      => $request->tb,
            'berat_badan'       => $request->bb,
            'riwayat_penyakit'  => $request->riwayat,
            'obat_konsumsi'     => $request->konsumsi,
            'alergi'            => $request->alergi,
            'keterangan'        => $request->keterangan,
        ]);

        $direct = $request->id_santris;

        return redirect('admin/diary/detail-generalcheckup/'.$direct)->with('success','edit data General Check Up');
    }

    public function hapus($id)
    {
        $data = GeneralChecks::where('id', $id)->delete();

        return redirect()->back()->with('success','Data General Check Up berhasil dihapus');

    }
}
