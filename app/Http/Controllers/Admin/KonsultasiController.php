<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Data_guru;
use App\Models\Konsultasi;
use App\Models\Guru;

class KonsultasiController extends Controller
{

   public function view()
   {
      $data = Konsultasi::join('data_santris','konsultasis.id_santri','=','data_santris.id')
            ->join('data_gurus','konsultasis.id_guru','=','data_gurus.id')
            ->leftJoin('kelas','data_santris.kelas','=','kelas.id')
            ->select('konsultasis.*','data_gurus.nama AS guru','data_santris.nama AS santri','kelas.nama AS kelas')
            ->orderBy('id', 'DESC')
            ->get();

      return view('use.data-konsultasi', ['data' => $data]);
   }

   public function edit($id)
    {

        $data = Konsultasi::join('data_gurus','konsultasis.id_guru','=','data_gurus.id')
        ->select('konsultasis.*','data_gurus.nama','data_gurus.id AS guru')
        ->where('konsultasis.id',$id)
        ->get();

       // dd($data);

        return view('use.edit-konsultasi', ['data' => $data]);

    }

    public function hasil($id)
    {

        $data = Konsultasi::join('data_gurus','konsultasis.id_guru','=','data_gurus.id')
        ->select('konsultasis.*','data_gurus.nama')
        ->where('konsultasis.id',$id)
        ->get();

       // dd($data);

        return view('use.hasil-konsultasi', ['data' => $data]);

    }

    public function hasilUpdate(Request $request,$id)
    {

        $data = Konsultasi::where('id', $id)
        ->update([
            'hasil'      => $request->hasil,
        ]);

        
        return redirect('/admin/konsultasi/data-konsultasi')->with('success','edit jadwal konsultasi !');
    }



    public function update(Request $request,$id)
    {
        //dd($request->guru);

        $data = Konsultasi::where('id', $id)
        ->update([
            'id_guru'      => $request->guru,
            'konsultasi'   => $request->konsultasi,
            'tgl_konsul'   => $request->tgl,
            'jam_konsul'   => $request->jam,
        ]);

        
        return redirect('/admin/konsultasi/data-konsultasi')->with('success','edit jadwal konsultasi !');
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

   public function statusKonfir(Request $request, $id)
   {
      $data = Konsultasi::where('id',$id)
            ->update([
               'status' => '1',
            ]);
      
      return redirect()->back();
   }

   public function statusTolak(Request $request, $id)
   {
      $data = Konsultasi::where('id',$id)
            ->update([
               'status' => '2',
            ]);

      return redirect()->back();
   }
}
