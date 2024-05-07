<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelajaran;
use App\Models\Kelas;
use App\Models\Data_guru;
use App\Models\Jadwal;
use App\Models\Data_santri;
use App\Models\Isi_kelas;
use App\Models\Hafalan;
use App\Models\Kategori_nilai;
use App\Models\Nilai;
use App\Models\Prestasi;
use DB;

class CapaianController extends Controller
{
    //
    public function viewPelajaran()
    {
        $data = Pelajaran::orderBy('id', 'DESC')->paginate(10);
        return view('use.data-pelajaran', ['data' => $data]);
    }


    public function createPelajaran(Request $request)
    {
        $data = new Pelajaran;
        $data->mapel = $request->mapel;
        $data->jam = $request->jam;
        $data->save();

        $cekId  = Pelajaran::orderBy('id','desc')->first();
        $autoId = $cekId->id + 1;
        
        $data = Pelajaran::where('id', $cekId->id)
        ->update([
            'kode'  => 'Map - 0'.$autoId,
    
        ]);

        return redirect()->back()->with('success','menambahkan data pelajaran');
    }

    public function editPelajaran($id)
    {
        $data = Pelajaran::where('id',$id)->get();

        return view('use.edit-pelajaran', ['data' => $data]);
    }

    public function updatePelajaran(Request $request,$id)
    {
        $data = Pelajaran::where('id', $id)
        ->update([
            'mapel'  => $request->mapel,
            'jam'    => $request->jam,
    
        ]);

        return redirect('/admin/capaian/data-pelajaran')->with('success','update data pelajaran!');
    }


    public function hapusPelajaran($id)
    {
        $blog = Pelajaran::findOrFail($id);
        $blog->delete();
        // $data = Pelajaran::where('id',$id)->delete();
        return redirect()->back()->with('success','hapus data pelajaran!');
    }

    public function selectMapel(Request $request)
    {
    	$movies = [];

        if($request->has('q')){
            $search = $request->q;
            $movies =Pelajaran::select("id", "mapel")
            		->where('mapel', 'LIKE', "%$search%")
            		->get();
        }
        
        return response()->json($movies);
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

    public function selectKelas(Request $request)
    {
    	$movies = [];

        if($request->has('q')){
            $search = $request->q;
            $movies =Kelas::select("id", "nama")
            		->where('nama', 'LIKE', "%$search%")
            		->get();
        }
        
        return response()->json($movies);
    }

    public function selectSantri(Request $request)
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
    

    public function createJadwal(Request $request)
    {
       
    
        $data = new Jadwal;
        $data->id_mapel  = $request->mapel;
        $data->id_guru   = $request->guru;
        $data->id_kelas  = $request->kelas;
        $data->waktu     = $request->waktu;
    
        $save = $data->save();
        if( $save ){
            return redirect('/admin/capaian/jadwal')->with('success','menambahkan jadwal pelajaran!');
        }else{
            return redirect('/admin/capaian/jadwal')->with('fail','Something went Wrong, failed to register');
        }

    }

    public function viewJadwal()
    {
        $data = Jadwal::join('data_gurus','jadwals.id_guru','=','data_gurus.id')
                ->join('kelas','jadwals.id_kelas','=','kelas.id')
                ->join('pelajarans','jadwals.id_mapel','=','pelajarans.id')
                ->select('jadwals.*','data_gurus.nama AS guru', 'kelas.nama AS kelas','pelajarans.kode','pelajarans.mapel')
                ->orderBy('id', 'DESC')
                ->paginate(10);

        return view('use.data-jadwal-pelajaran', ['data' => $data]);
    }

    public function detailJadwal($id)
    {
        
        $data=Jadwal::where('jadwals.id',$id)
            ->join('data_gurus','jadwals.id_guru','=','data_gurus.id')
            ->join('kelas','jadwals.id_kelas','=','kelas.id')
            ->join('pelajarans','jadwals.id_mapel','pelajarans.id')
            ->select('data_gurus.nama As guru','kelas.nama As kelas','pelajarans.mapel As mapel','jadwals.*')
            ->get();

        return view('use.edit-jadwalPelajaran', ['data' => $data]);
    }

    public function hapusJadwal($id)
    {
        
        $data=Jadwal::where('id',$id)->delete();

        return redirect()->back()->with('success','hapus data jadwal!');
    }


    public function updateJadwal(Request $request, $id)
    {
        $data = Jadwal::where('id', $id)
        ->update([
            'id_mapel'  => $request->mapel,
            'id_guru'  => $request->guru,
            'id_kelas'  => $request->kelas,
            'waktu'  => $request->waktu,
        ]);

        return redirect('/admin/capaian/jadwal')->with('success','update data pelajaran');
    }



    public function createKelas(Request $request)
    {
        $data = new Kelas;
        $data->tingkat = $request->tingkat;
        $data->nama = $request->name;
        $data->tahun = $request->tahun;
    
        $save = $data->save();
        if( $save ){
            return redirect()->back()->with('success','Data pelajaran berhasil diinputkan');
        }else{
            return redirect()->back()->with('fail','Something went Wrong, failed to register');
        }

    }

    public function viewKelas()
    {
        $data = Kelas::orderBy('id', 'DESC')->paginate(10);
        return view('use.data-kelas', ['data' => $data]);
       
    }

    public function editKelas($id)
    {
        $data = Kelas::where('id',$id)->get();
        $list = Data_santri::where('kelas',$id)->paginate(10);
        
        return view('use.data-listSantri', ['data' => $data, 'list'=>$list]);
    }

    public function hapusKelas($id)
    {
        $data = Kelas::where('id',$id)->delete();
        
        return redirect()->back()->with('success','hapus data kelas!');
    }

    public function viewSemester()
    {
        $data = Kategori_nilai::orderBy('id','DESC')->paginate(10);

        return view('use.data-semester', ['data' => $data]);
    }

    public function createSemester(Request $request)
    {
        $lastID = DB::table('kategori_nilais')->orderBy('id', 'DESC')->first();
        //dd($lastID->id);
        $data2 = Kategori_nilai::where('id',$lastID->id)
        ->update([
            'status'            => '0',
        ]);

        $data = new Kategori_nilai;
        $data->tahun  = $request->tahun;
        $data->nama   = $request->nama;
        $data->status = '1';
        $save = $data->save();

        
        return redirect()->back()->with('success','Data hafalan berhasil dihapus');
    }

    public function editSemester($id){
        $data=Kategori_nilai::where('id',$id)
            ->get();

        return view('use.edit-semester', ['data' => $data]);
   }

   public function updateSemester(Request $request, $id)
   {
       $data = Kategori_nilai::where('id', $id)
       ->update([
           'nama'  => $request->nama,
           'tahun'  => $request->tahun,
          
       ]);

       return redirect('/admin/capaian/data-semester')->with('success','update data semester');
   }


    public function aktifSemester(Request $request, $id)
    {
        $data = Kategori_nilai::where('id',$id)
            ->update([
                'status' => '1',
            ]);
        
        return redirect()->back();
    }

    public function nonaktifSemester(Request $request, $id)
    {
        $data = Kategori_nilai::where('id',$id)
            ->update([
                'status' => '0',
            ]);
        
        return redirect()->back();
    }
    

    public function hapusSemester($id)
    {
        $data = Kategori_nilai::where('id',$id)->delete();

        return redirect()->back()->with('success','hapus data semester!');
    }

    public function viewNilai($id)
    {
        // $kat = Kategori_nilai::where('status','1')->get();
        // $santri = Data_santri::where('id',$id)->select('id')->get();
        // $data = Pelajaran::get();
        $data = Data_santri::where('id',$id)->get();

        $table = Nilai::join('data_santris','nilais.id_santri','=','data_santris.id')
        ->join('kategori_nilais','nilais.id_kat','=','kategori_nilais.id')
        ->where('data_santris.id',$id)
        ->select('nilais.*','kategori_nilais.nama','kategori_nilais.tahun','kategori_nilais.id AS kat')
        ->groupBy('nilais.id_kat')
        ->orderBy('id', 'DESC')
        ->paginate(10);

        return view('use.data-nilai', ['data'=>$data, 'table'=>$table]);
       
    }

    public function tambahNilai($id)
    {
        $kat = Kategori_nilai::where('status','1')->get();
        $santri = Data_santri::where('id',$id)->select('id')->get();
        $data = Pelajaran::get();

        return view('use.tambah-nilai', ['data' => $data,'id' => $id,'kat' => $kat]);

    }


    public function detailNilai($id,$kat)
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

        //dd($nilai,$id,$kat[0]->id);
        return view('use.detail-nilai', ['data' => $data,'nilai' => $nilai, 'id' => $id,'kategori' => $kategori]);

    }

    public function editNilai($id)
    {
     
        $data = Nilai::where('nilais.id',$id)
                ->join('pelajarans','nilais.id_mapel','=','pelajarans.id')
                ->select('nilais.*','pelajarans.mapel')->get();
        $kategori = Kategori_nilai::where('id',$data[0]->id_kat)->get();
        
        return view('use.edit-nilai', ['data' => $data, 'kategori' => $kategori]);
    }

    public function updateNilai(Request $request,$id)
    {
        //dd($request->all());
     
        $data = Nilai::where('id', $id)
        ->update([
            'tg1'       => $request->tg1,
            'tg2'       => $request->tg2,
            'tg3'       => $request->tg3,
            'ph1'       => $request->ph1,
            'ph2'       => $request->ph2,
            'ph3'       => $request->ph3,
            'final'     => $request->final,
        ]);
        
        $direct=$request->id_santri;
        $direct2=$request->id_kat;
        
        return redirect('admin/capaian/detail-nilai/'.$direct.'/'.$direct2)->with('success','update data nilai!');;
    }

    public function createNilai(Request $request)
    {
        $data = $request->all();
        
        $jml = count($data['id_mapel']);

        if ($jml > 0){
            foreach($data['id_mapel'] as $item => $value){
                $data2 = array(
                    'id_santri' => $data['id_santri'][$item],
                    'id_kat'    => $data['id_kat'][$item],
                    'id_mapel'  => $data['id_mapel'][$item],
                    'tg1'       => $data['tg1'][$item],
                    'tg2'       => $data['tg2'][$item],
                    'tg3'       => $data['tg3'][$item],
                    'ph1'       => $data['ph1'][$item],
                    'ph2'       => $data['ph2'][$item],
                    'ph3'       => $data['ph3'][$item],
                    'final'     => $data['final'][$item],

                );
                Nilai::create($data2);
            }
        }

        $direct=$request->id_santri[0];
        $direct2=$request->id_kat[0];

        return redirect('admin/capaian/detail-nilai/'.$direct.'/'.$direct2)->with('success','menambahkan data nilai');

        
    }

    public function viewHafalan($id)
    {
        $data = Data_santri::where('id',$id)->get();
        $table = Hafalan::where('id_santri',$id)->orderBy('id', 'DESC')->paginate(10);
        
        return view('use.data-hafalan', ['data'=>$data, 'table'=>$table]);
    }

    public function createHafalan(Request $request,$id)
    {
        $data = new Hafalan;
        $data->id_santri = $id;
        $data->ket = $request->ket;
        $save = $data->save();

        return redirect()->back()->with('success','Berhasil menambahkan data hafalan');
    }

    public function hapusHafalan($id)
    {
        Hafalan::where('id',$id)->delete();

        return redirect()->back()->with('success','Berhasil hapus data hafalan!');
    }

    public function viewPrestasi($id)
    {
        $data = Data_santri::where('id',$id)->get();
        $table = Prestasi::where('id_santri',$id)->orderBy('id', 'DESC')->paginate(10);
        
        return view('use.data-prestasi', ['data'=>$data, 'table'=>$table]);
    }

    public function createPrestasi(Request $request,$id)
    {
        $data = new Prestasi;
        $data->id_santri = $id;
        $data->ket = $request->ket;
        $save = $data->save();

        return redirect()->back()->with('success','Berhasil menambahkan data prestasi');
    }

    public function hapusPrestasi($id)
    {
        Prestasi::where('id',$id)->delete();

        return redirect()->back()->with('success','Berhasil hapus data prestasi!');
    }


   
}
