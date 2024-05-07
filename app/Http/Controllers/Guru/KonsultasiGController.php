<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Konsultasi;
use App\Models\Guru;
use App\Models\Data_guru;

class KonsultasiGController extends Controller
{
    //
    public function konsultasi()
    {
       $data = Konsultasi::join('data_santris','konsultasis.id_santri','=','data_santris.id')
             ->join('data_gurus','konsultasis.id_guru','=','data_gurus.id')
             ->join('kelas','data_santris.kelas','=','kelas.id')
             ->select('konsultasis.*','data_gurus.nama AS guru','data_santris.nama AS santri','kelas.nama AS kelas')
             ->orderBy('konsultasis.id','DESC')
             ->paginate(10);
 
       return view('dashboard.guru.data-konsultasi', ['data' => $data]);
    }

    public function search(Request $request)
   {
      $employees = Konsultasi::all();
      if($request->keyword != ''){
      $employees = Konsultasi::join('data_santris','konsultasis.id_santri','=','data_santris.id')
                 ->where('data_santris.nama','LIKE','%'.$request->keyword.'%')->get();
      }
      return response()->json([
         'employees' => $employees
      ]);
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

    public function konfirmasi($id)
    {
        $data = Konsultasi::where('id',$id)
            ->update([
               'status' => '1',
            ]);
      
      return redirect()->back();

    }

    public function tolak($id)
    {
        $data = Konsultasi::where('id',$id)
        ->update([
           'status' => '2',
        ]);

        return redirect()->back();
    }

    public function edit($id)
    {

        $data = Konsultasi::join('data_gurus','konsultasis.id_guru','=','data_gurus.id')
        ->select('konsultasis.*','data_gurus.nama','data_gurus.id AS guru')
        ->where('konsultasis.id',$id)
        ->get();

       //dd($data);

        return view('dashboard.guru.edit-konsultasi', ['data' => $data]);

    }

    public function update(Request $request,$id)
    {

        $data = Konsultasi::where('id', $id)
        ->update([
            'id_guru'      => $request->guru,
            'konsultasi'   => $request->konsultasi,
            'tgl_konsul'   => $request->tgl,
            'jam_konsul'   => $request->jam,
        ]);

        
        return redirect('/guru/konsultasi')->with('success','edit jadwal konsultasi !');
    }

    public function hasil($id)
    {

        $data = Konsultasi::join('data_gurus','konsultasis.id_guru','=','data_gurus.id')
        ->select('konsultasis.*','data_gurus.nama')
        ->where('konsultasis.id',$id)
        ->get();

       // dd($data);

        return view('dashboard.guru.hasil-konsultasi', ['data' => $data]);

    }

    public function hasilUpdate(Request $request,$id)
    {

        $data = Konsultasi::where('id', $id)
        ->update([
            'hasil'      => $request->hasil,
        ]);

        
        return redirect('/guru/konsultasi')->with('success','edit jadwal konsultasi !');
    }

}
