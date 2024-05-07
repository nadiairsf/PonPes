<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Santri;
use App\Models\Data_santri;
use App\Models\Kelas;
use App\Models\Wali;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class SantriController extends Controller
{
    //
    public function create(Request $request)
    {
     
        $validator = Validator::make($request->all(),[
            'email_ortu'=>'required|email|unique:walis,email',
            'email_santri'=>'required|email|unique:santris,email',
            'nis'=>'required',
            'name'=>'required',
            'tempat_lahir'=>'required',
            'tgl_lahir'=>'required',
            'status'=>'required',
            'jk'=>'required',
            'tgl_masuk'=>'required',
            'nama_ortu'=>'required',
            'tempat_tinggal'=>'required',
            'noHp_ortu'=>'required',
            'kelas'=>'required',
        ]);
        
      
        if ($validator->fails()) {
            return redirect('admin/profil/tambah-santri')
                ->withErrors($validator)
                ->withInput();
        }
         

         $user = new Santri;
         $user->id = $request->id;
         $user->name = $request->name;
         $user->email = $request->email_santri;
         $user->password = \Hash::make($request->nis);
         $save = $user->save();

         $lastID = DB::table('santris')->orderBy('id', 'DESC')->first();
         $doctor = new Wali();
         $doctor->name = $request->nama_ortu;
         $doctor->id_santri = $lastID->id;
         $doctor->phone = $request->noHp_ortu;
         $doctor->email = $request->email_ortu;
         $doctor->password = \Hash::make($request->noHp_ortu);
         $save = $doctor->save();

         $santri = new Data_santri;
         $santri->id_santris = $lastID->id;
         $santri->nis = $request->nis;
         $santri->nama = $request->name;
         $santri->tempat_lahir = $request->tempat_lahir;
         $santri->tgl_lahir = $request->tgl_lahir;
         $santri->status = $request->status;
         $santri->jenis_kelamin = $request->jk;
         $santri->tgl_masuk = $request->tgl_masuk;
         $santri->tgl_keluar = $request->tgl_keluar;
         $santri->nama_ortu = $request->nama_ortu;
         $santri->tempat_tinggal = $request->tempat_tinggal;
         $santri->noHp_ortu = $request->noHp_ortu;
         $santri->kelas = $request->kelas;
         $santri->ket = $request->ket;
         $save2 = $santri->save();

         

         if( $save ){
            return redirect()->route('admin.data-santri')->with('success','menambahkan data santri');
        }else{
            return redirect()->route('admin.data-santri')->with('fail','Something went Wrong, failed to register');
        }

         if( $save2 ){
             return redirect()->route('admin.data-santri')->with('success','menambahkan data santri');
         }else{
             return redirect()->route('admin.data-santri')->with('fail','Something went Wrong, failed to register');
         }
    }

    public function view()
    {
        $data = Data_santri::leftJoin('kelas','data_santris.kelas','=','kelas.id')
                ->select('data_santris.*','kelas.nama As kelas')
                ->orderBy('id', 'DESC')
                ->paginate(10);


        return view('use.data-santri', ['data' => $data]);
    }

    public function viewTambah()
    {

        $kelas = Kelas::get();

        return view('use.tambah-santri', ['kelas' => $kelas]);
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

    public function detail($id)
    {
        $kelas = Kelas::get();
        $data = Data_santri::where('data_santris.id',$id)
        ->leftJoin('kelas','data_santris.kelas','=','kelas.id')
        ->join('santris','data_santris.id_santris','=','santris.id')
        ->select('data_santris.*','kelas.nama AS kelaz','kelas.tahun','santris.email')
        ->get();


        return view('use.edit-santri', ['data' => $data, 'kelas' => $kelas]);
    }

    public function hapus($id)
    {
        $data = DB::table('data_santris')->where('id',$id)->delete();

        if($data){
            return redirect()->route('admin.data-santri')->with(['success' => 'hapus data!']);
        }else{
            return redirect()->route('admin.data-santri')->with(['error' => 'Gagal Dihapus!']);
        }
    }

    public function update(Request $request,$id)
    {
        //dd($id);
        $data = Data_santri::where('id', $id)
        ->update([
            'nis'            => $request->nis,
            'nama'           => $request->name,
            'tempat_lahir'   => $request->tempat_lahir,
            'tgl_lahir'      => $request->tgl_lahir,
            'status'         => $request->status,
            'jenis_kelamin'  => $request->jk,
            'tgl_masuk'      => $request->tgl_masuk,
            'tgl_keluar'     => $request->tgl_keluar,
            'nama_ortu'      => $request->nama_ortu,
            'tempat_tinggal' => $request->tempat_tinggal,
            'noHp_ortu'      => $request->noHp_ortu,
            'kelas'          => $request->kelas,
            'ket'            => $request->ket,

        ]);
        
       
        return redirect('/admin/profil/data-santri')->with('success','edit data santri');
    }

    
}
