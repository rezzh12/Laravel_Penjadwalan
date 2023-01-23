<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Jurusan;
use App\Models\Waktu;
use App\Models\Jadwal;
use Session;
use PDF;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data1 = guru::count();
        $data2 = kelas::count();
        $data3 = mapel::count();
        $data4 = jurusan::count();
        $user = Auth::user();
        return view('home', compact( 'user','data1','data2','data3','data4'));
    }

    public function kelas()
    {
        $user = Auth::user();
        $kelas = kelas::all();
        return view('kelas', compact('user', 'kelas'));
    }

    public function submit_kelas(Request $req)
    { $validate = $req->validate([
        'nama_kelas'=> 'required|max:255',
        'kapasitas'=> 'required',
    ]);
    $kelas = new kelas;
    $kelas->nama_kelas = $req->get('nama_kelas');
    $kelas->kapasitas = $req->get('kapasitas');
    $kelas->save();

    Session::flash('status', 'Tambah data kelas berhasil!!!');
    return redirect()->route('admin.kelas');
    }

    public function getDataKelas($id)
    {
        $kelas = kelas::find($id);
        return response()->json($kelas);
    }

    public function update_kelas(Request $req)
    { 
        $kelas= kelas::find($req->get('id'));
        $validate = $req->validate([
        'nama_kelas'=> 'required|max:255',
        'kapasitas'=> 'required',
    ]);
    $kelas->nama_kelas = $req->get('nama_kelas');
    $kelas->kapasitas = $req->get('kapasitas');
    $kelas->save();

    Session::flash('status', 'Ubah data kelas berhasil!!!');
    return redirect()->route('admin.kelas');
    }

    public function delete_kelas($nama_kelas)
    {
        $kelas = kelas::find($nama_kelas);
        $kelas->delete();

        Session::flash('status', 'Hapus data kelas berhasil!!!');
    return redirect()->route('admin.kelas');
    }

    public function mapel()
    {
        $user = Auth::user();
        $mapel = mapel::all();
        $jurusan = jurusan::all();
        $mapel1['mapel'] = mapel::with('jurusans')->get();
        return view('mapel', compact('user', 'mapel1','mapel','jurusan'));
    }

    public function submit_mapel(Request $req)
    { $validate = $req->validate([
        'mapel'=> 'required|max:255',
        'semester'=> 'required',
        'id_jurusan'=> 'required',
    ]);
    $mapel = new mapel;
    $mapel->mapel = $req->get('mapel');
    $mapel->semester = $req->get('semester');
    $mapel->jurusan_id = $req->get('id_jurusan');
    $mapel->save();

    Session::flash('status', 'Tambah data mata pelajaran berhasil!!!');
    return redirect()->route('admin.mapel1.mapel.jurusan');
    }

    public function getDataMapel($id)
    {
        $mapel = mapel::find($id);
        return response()->json($mapel);
    }

    public function update_Mapel(Request $req)
    { 
        $mapel= mapel::find($req->get('id'));
        $validate = $req->validate([
        'mapel'=> 'required|max:255',
        'semester'=> 'required',
    ]);
    $mapel->mapel = $req->get('mapel');
    $mapel->semester = $req->get('semester');
    $mapel->save();

    Session::flash('status', 'Ubah data mata pelajaran berhasil!!!');
    return redirect()->route('admin.mapel1.mapel.jurusan');
    }

    public function delete_Mapel($mapel)
    {
        $mapel = mapel::find($mapel);
        $mapel->delete();

        Session::flash('status', 'Hapus data mata pelajaran berhasil!!!');
    return redirect()->route('admin.mapel1.mapel.jurusan');
    }

    public function waktu()
    {
        $user = Auth::user();
        $waktu = waktu::all();
        return view('waktu', compact('user', 'waktu'));
    }

    public function submit_waktu(Request $req)
    { $validate = $req->validate([
        'hari'=> 'required|max:255',
        'jam_masuk'=> 'required',
        'jam_keluar'=> 'required',
    ]);
    $waktu = new waktu;
    $waktu->hari = $req->get('hari');
    $waktu->jam_masuk = $req->get('jam_masuk');
    $waktu->jam_keluar = $req->get('jam_keluar');
    $waktu->save();

    Session::flash('status', 'Tambah data waktu berhasil!!!');
    return redirect()->route('admin.waktu');
    }

    public function getDataWaktu($id)
    {
        $waktu = waktu::find($id);
        return response()->json($waktu);
    }

    public function update_waktu(Request $req)
    { 
        $waktu= waktu::find($req->get('id'));
        $validate = $req->validate([
        'hari'=> 'required|max:255',
        'jam_masuk'=> 'required',
        'jam_keluar'=> 'required',
    ]);
    $waktu->hari = $req->get('hari');
    $waktu->jam_masuk = $req->get('jam_masuk');
    $waktu->jam_keluar = $req->get('jam_keluar');
    $waktu->save();

    Session::flash('status', 'Ubah data waktu berhasil!!!');
    return redirect()->route('admin.waktu');
    }

    public function delete_waktu($id)
    {
        $waktu = waktu::find($id);
        $waktu->delete();

        Session::flash('status', 'Hapus waktu kelas berhasil!!!');
    return redirect()->route('admin.waktu');
    }

    public function guru()
    {
        $user = Auth::user();
        $guru = guru::all();
        return view('guru', compact('user', 'guru'));
    }

    public function submit_guru(Request $req)
    { $validate = $req->validate([
        'nip'=> 'required|max:255',
        'nama'=> 'required',
        'alamat'=> 'required',
        'jenis_kelamin'=> 'required',
    ]);
    $guru = new guru;
    $guru->nip = $req->get('nip');
    $guru->nama_guru = $req->get('nama');
    $guru->alamat = $req->get('alamat');
    $guru->jenis_kelamin = $req->get('jenis_kelamin');
    $guru->save();

    Session::flash('status', 'Tambah data guru berhasil!!!');
    return redirect()->route('admin.guru');
    }

    
    public function getDataGuru($id)
    {
        $guru = guru::find($id);
        return response()->json($guru);
    }

    public function update_guru(Request $req)
    { 
        $guru= guru::find($req->get('id'));
        $validate = $req->validate([
        'nip'=> 'required|max:255',
        'nama'=> 'required',
        'alamat'=> 'required',
        'jenis_kelamin'=> 'required',
    ]);
    $guru->nip = $req->get('nip');
    $guru->nama_guru = $req->get('nama');
    $guru->alamat = $req->get('alamat');
    $guru->jenis_kelamin = $req->get('jenis_kelamin');
    $guru->save();

    Session::flash('status', 'Ubah data guru berhasil!!!');
    return redirect()->route('admin.guru');
    }

    public function delete_guru($id)
    {
        $guru = guru::find($id);
        $guru->delete();

        Session::flash('status', 'Hapus data guru berhasil!!!');
    return redirect()->route('admin.guru');
    }

    public function jurusan()
    {
        $user = Auth::user();
        $jurusan = jurusan::all();
        return view('jurusan', compact('user', 'jurusan'));
    }

    public function submit_jurusan(Request $req)
    { $validate = $req->validate([
        'kode'=> 'required|max:255',
        'jurusan'=> 'required',
    ]);
    $jurusan = new jurusan;
    $jurusan->kode = $req->get('kode');
    $jurusan->jurusan = $req->get('jurusan');
    $jurusan->save();

    Session::flash('status', 'Tambah data jurusan berhasil!!!');
    return redirect()->route('admin.jurusan');
    }

    public function getDataJurusan($id)
    {
        $jurusan = jurusan::find($id);
        return response()->json($jurusan);
    }

    public function update_jurusan(Request $req)
    { 
        $jurusan= jurusan::find($req->get('id'));
        $validate = $req->validate([
        'kode'=> 'required|max:255',
        'jurusan'=> 'required',
    ]);
    $jurusan->kode = $req->get('kode');
    $jurusan->jurusan = $req->get('jurusan');
    $jurusan->save();

    Session::flash('status', 'Ubah data jurusan berhasil!!!');
    return redirect()->route('admin.jurusan');
    }

    public function delete_jurusan($id)
    {
        $jurusan = jurusan::find($id);
        $jurusan->delete();

        Session::flash('status', 'Hapus data jurusan berhasil!!!');
    return redirect()->route('admin.jurusan');
    }


    public function jadwal()
    {
        $user = Auth::user();
        $guru = guru::all();
        $waktu = waktu::all();
        $kelas = kelas::all();
        $mapel = mapel::all();
        $jadwal = jadwal::all();
        $jadwal1['jadwal'] = jadwal::with('jadwals')->get();
        $jadwal1['jadwal'] = jadwal::with('jadwal1')->get();
        $jadwal1['jadwal'] = jadwal::with('jadwal2')->get();
        $jadwal1['jadwal'] = jadwal::with('jadwal3')->get();
        return view('jadwal', compact('user', 'guru','waktu','kelas','mapel','jadwal','jadwal1'));
    }
    public function submit_jadwal(Request $req)
    { $validate = $req->validate([
        'id_guru'=> 'required|max:255',
        'id_waktu'=> 'required',
        'id_kelas'=> 'required',
        'id_mapel'=> 'required',
    ]);
    $jadwal = new jadwal;
    $jadwal->guru_id = $req->get('id_guru');
    $jadwal->waktu_id = $req->get('id_waktu');
    $jadwal->kelas_id = $req->get('id_kelas');
    $jadwal->mapel_id = $req->get('id_mapel');
    $jadwal->save();

    Session::flash('status', 'Tambah data jadwal berhasil!!!');
    return redirect()->route('admin.guru.waktu.kelas.mapel.jadwal.jadwal1');
    }
    public function getDataJadwal($id)
    {
        $jadwal = jadwal::find($id);
        return response()->json($jadwal);
    }

    public function update_jadwal(Request $req)
    { 
        $jadwal= jadwal::find($req->get('id'));
        $validate = $req->validate([
        'id_guru'=> 'required|max:255',
        'id_waktu'=> 'required',
        'id_kelas'=> 'required',
        'id_mapel'=> 'required',
    ]);
    $jadwal->guru_id = $req->get('id_guru');
    $jadwal->waktu_id = $req->get('id_waktu');
    $jadwal->kelas_id = $req->get('id_kelas');
    $jadwal->mapel_id = $req->get('id_mapel');
    $jadwal->save();

    Session::flash('status', 'Ubah data jadwal berhasil!!!');
    return redirect()->route('admin.guru.waktu.kelas.mapel.jadwal.jadwal1');
    }

    public function delete_jadwal($id)
    {
        $jadwal = jadwal::find($id);
        $jadwal->delete();

        Session::flash('status', 'Hapus data jadwal berhasil!!!');
    return redirect()->route('admin.guru.waktu.kelas.mapel.jadwal.jadwal1');
    }

    public function print_jadwal(){
        $jadwal = jadwal::all();
        $jadwal1['jadwal'] = jadwal::with('jadwals')->get();
        $jadwal1['jadwal'] = jadwal::with('jadwal1')->get();
        $jadwal1['jadwal'] = jadwal::with('jadwal2')->get();
        $jadwal1['jadwal'] = jadwal::with('jadwal3')->get();

        $pdf = PDF::loadview('print_jadwal',['jadwal'=>$jadwal],[ 'jadwal1'=>$jadwal1]);
        return $pdf->download('data_jadwal.pdf');
    }

}
