<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Guru;
use App\Models\Data_guru;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;


class PengajarController extends Controller
{
    
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=>'required|email|unique:gurus,email',
            'name'=>'required',
            'tempat_lahir'=>'required',
            'tgl_lahir'=>'required',
            'status'=>'required',
            'jk'=>'required',
            'tgl_masuk'=>'required',
            'tempat_tinggal'=>'required',
            'noHp'=>'required',
            'riwayat_pendidikan'=>'required',
         ]);

         if ($validator->fails()) {
            return redirect('admin/profil/tambah-pengajar')
                ->withErrors($validator)
                ->withInput();
        }
        
        
         $lahir = $request->tgl_lahir;
         $masuk = $request->tgl_masuk;
         $harilahir = Carbon::createFromFormat('Y-m-d', $lahir)->format('d');
         $bulanlahir = Carbon::createFromFormat('Y-m-d', $lahir)->format('m');
         $tahunlahir = Carbon::createFromFormat('Y-m-d', $lahir)->format('Y');
         $tahunmasuk = Carbon::createFromFormat('Y-m-d', $masuk)->format('Y');
         $bulanmasuk = Carbon::createFromFormat('Y-m-d', $masuk)->format('m');

         $cekId  = Data_guru::orderBy('id','desc')->first();
         $autoId = $cekId->id + 1;
         
         $kode = [$tahunlahir, $harilahir, $bulanlahir, $tahunmasuk, $bulanmasuk, $autoId];
         $nip = implode($kode);
    
         $user = new Guru;
         $user->id = $request->id;
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = \Hash::make($request->noHp);
         $save = $user->save();

         $lastID = DB::table('gurus')->orderBy('id', 'DESC')->first();

         $pengajar = new Data_guru;
         $pengajar->nip = $nip;
         $pengajar->id_gurus = $lastID->id;
         $pengajar->nama = $request->name;
         $pengajar->tempat_lahir = $request->tempat_lahir;
         $pengajar->tgl_lahir = $request->tgl_lahir;
         $pengajar->status = $request->status;
         $pengajar->jenis_kelamin = $request->jk;
         $pengajar->tgl_masuk = $request->tgl_masuk;
         $pengajar->tgl_keluar = $request->tgl_keluar;
         $pengajar->tempat_tinggal = $request->tempat_tinggal;
         $pengajar->noHp = $request->noHp;
         $pengajar->riwayat_pendidikan = $request->riwayat_pendidikan;
         $save2 = $pengajar->save();
         

         if( $save ){
            return redirect('/admin/profil/data-pengajar')->with('success','menambahkan data pengajar');
        }else{
            return redirect()->back()->with('fail','Belum berhasil input data');
        }

         if( $save2 ){
             return redirect('/profil/data-pengajar')->with('success','menambahkan data pengajar');
         }else{
             return redirect()->back()->with('fail','Something went Wrong, failed to register');
         }
    }

    public function view()
    {
        $data = Guru::join('data_gurus','gurus.id','=','data_gurus.id_gurus')
              ->select('data_gurus.*')
              ->orderBy('id', 'DESC')
              ->paginate(10);

        return view('use.data-pengajar', ['data' => $data]);
    }

    public function detail($id)
    {
        $data = Data_guru::where('data_gurus.id',$id)
        ->join('gurus','data_gurus.id_gurus','=','gurus.id')
        ->select('data_gurus.*','gurus.email','gurus.id AS id_guru')
        ->get();

        return view('use.edit-pengajar', ['data' => $data]);

    }

    public function update(Request $request, $id)
    {
        $data = Data_guru::where('id', $id)
        ->update([
            'nama'               => $request->name,
            'tempat_lahir'       => $request->tempat_lahir,
            'tgl_lahir'          => $request->tgl_lahir,
            'status'             => $request->status,
            'jenis_kelamin'      => $request->jk,
            'tgl_masuk'          => $request->tgl_masuk,
            'tgl_keluar'         => $request->tgl_keluar,
            'tempat_tinggal'     => $request->tempat_tinggal,
            'noHp'               => $request->noHp,
            'riwayat_pendidikan' => $request->riwayat_pendidikan,
        ]);
       
        return redirect('/admin/profil/data-pengajar')->with('success','edit data pengajar');
    }

    public function hapus($id)
    {
        $pengajar = Guru::findOrFail($id);
        //Storage::disk('local')->delete('public/pengajars/'.$pengajar->image);
        $pengajar->delete();

        if($pengajar){
            //redirect dengan pesan sukses
            return redirect()->route('admin.data-pengajar')->with(['success' => 'hapus data!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.data-pengajar')->with(['error' => 'gagal hapus data!']);
        }
    }
}
