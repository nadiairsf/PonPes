<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Data_santri;
use App\Models\Hafalan;
use App\Models\Prestasi;
use App\Models\Konsultasi;
use App\Models\Nilai;
use App\Models\Kategori_nilai;
use App\Models\Pelajaran;

class DataGuruController extends Controller
{
    public function view()
    {
        $data = Kelas::orderBy('id','DESC')->paginate(10);
        return view('dashboard.guru.data-kelas', ['data' => $data]);
    }

    public function detailKelas($id)
    {
        $data = Kelas::where('id',$id)->get();
        $list = Data_santri::where('kelas',$id)->orderBy('id','DESC')->paginate(10);
        
        return view('dashboard.guru.detail-kelas', ['data' => $data, 'list'=>$list]);
    }

    public function editHafalan($id)
    {
        $data = Data_santri::where('id',$id)->get();
        $table = Hafalan::where('id_santri',$id)->orderBy('id','DESC')->paginate(10);
        
        return view('dashboard.guru.edit-hafalan', ['data'=>$data, 'table'=>$table]);
    }

    public function createHafalan(Request $request,$id)
    {
        $data = new Hafalan;
        $data->id_santri = $id;
        $data->ket = $request->ket;
        $save = $data->save();

        return redirect()->back()->with('success','Data hafalan berhasil diinputkan');
    }

    public function hapusHafalan($id)
    {
        Hafalan::where('id',$id)->delete();

        return redirect()->back()->with('success','Data hafalan berhasil dihapus');
    }

    public function editPrestasi($id)
    {
        $data = Data_santri::where('id',$id)->get();
        $table = Prestasi::where('id_santri',$id)->orderBy('id','DESC')->paginate(10);
        
        return view('dashboard.guru.edit-prestasi', ['data'=>$data, 'table'=>$table]);
    }

    public function createPrestasi(Request $request,$id)
    {
        $data = new Prestasi;
        $data->id_santri = $id;
        $data->ket = $request->ket;
        $save = $data->save();

        return redirect()->back()->with('success','Data prestasi berhasil diinputkan');
    }

    public function hapusPrestasi($id)
    {
        Prestasi::where('id',$id)->delete();

        return redirect()->back()->with('success','Data prestasi berhasil dihapus');
    }

    public function viewNilai($id)
    {

        $data = Data_santri::where('id',$id)->get();
        $table = Nilai::join('data_santris','nilais.id_santri','=','data_santris.id')
                ->join('kategori_nilais','nilais.id_kat','=','kategori_nilais.id')
                ->where('data_santris.id',$id)
                ->select('nilais.*','kategori_nilais.nama','kategori_nilais.tahun','kategori_nilais.id AS kat')
                ->groupBy('nilais.id_kat')
                ->get();
        
                
        //  dd($id, $table);

        return view('dashboard.guru.data-nilai', ['data'=>$data, 'table'=>$table]);
    }

    public function tambahNilai($id)
    {
        $kat = Kategori_nilai::where('status','1')->get();
        // $santri = Data_santri::where('id',$id)->select('id')->get();
        $data = Pelajaran::get();
        return view('dashboard.guru.tambah-nilai', ['data' => $data,'id' => $id,'kat' => $kat]);

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

        return redirect('/guru/nilai/'.$request->santri)->with('success','Berhasil menambahkan data nilai');

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
        return view('dashboard.guru.detail-nilai', ['data' => $data,'nilai' => $nilai, 'id' => $id,'kategori' => $kategori]);

    }

    public function editNilai($id)
    {
        $data = Nilai::where('nilais.id',$id)
        ->join('pelajarans','nilais.id_mapel','=','pelajarans.id')
        ->select('nilais.*','pelajarans.mapel')->get();
        $kategori = Kategori_nilai::where('id',$data[0]->id_kat)->get();

        //dd($nilai,$id,$kat[0]->id);
        return view('dashboard.guru.edit-nilai', ['data' => $data, 'kategori' => $kategori]);

    }

    public function updateNilai(Request $request,$id)
    {
     
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
        
        
        return redirect()->back()->with('success','update data nilai!');;
    }

    public function hapusNilai($id, $kat)
    {
        $nilai= Nilai::where('id_santri',$id)
        ->where('id_kat',$kat)
        ->delete();
        
        return redirect()->back()->withInput();

    }
    


}
