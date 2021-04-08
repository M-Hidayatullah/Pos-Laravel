<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PasokController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pasok = DB::table('tb_pasok')
                ->join('tb_barang', function($join){
                    $join->on('tb_pasok.barang_pasok_id','=','tb_barang.id_barang');
                })->get();

        $barang = DB::table('tb_barang')->get();
        
        return view('pasok/index',compact('pasok','barang'));
    }

    public function store(Request $request)
    {

        for ($a=0; $a < count($request->id_barang); $a++) { 
            
                DB::table('tb_pasok')->insert([
                    'barang_pasok_id' =>  $request->id_barang[$a],
                    'jumlah_pasok' => $request->jumlah[$a],
                    'nama_pemasok' => $request->nama_pemasok,
                    'tanggal_pasok' => $request->tanggal_pasok
                ]);
        }
       
        return redirect()->back()->with('masuk','Data Berhasil Di Input');
    }

    public function edit($id)
    {
        $pasok = DB::table('tb_pasok')->where('id_pasok',$id)
            ->join('tb_barang', function($join){
                $join->on('tb_pasok.barang_pasok_id','=','tb_barang.id_barang');
            })->first();

        return view('pasok/edit',compact('pasok'));
    }

    public function update(Request $request)
    {
        
        $cek1 = DB::table('tb_pasok')->where('id_pasok', $request->id_pasok)->first();
        if ($request->jumlah > $cek1->jumlah_pasok) {
            $cek2 = DB::table('tb_barang')->where('id_barang', $request->id_barang)->first();
            $hitungmasuk = $request->jumlah - $cek1->jumlah_pasok;
            $hitung =  $cek2->jumlah_barang + $hitungmasuk;
            DB::table('tb_barang')->where('id_barang', $request->id_barang)->update([
                'jumlah_barang' => $hitung
            ]);
            if ($cek2->jumlah_barang < $hitungmasuk) {
                return redirect()->back();
            }
        } else {
            $cek1 = DB::table('tb_pasok')->where('id_pasok', $request->id_pasok)->first();
            $cek2 = DB::table('tb_barang')->where('id_barang', $request->id_barang)->first();
            $hitungmasuk2 =  $cek1->jumlah_pasok - $request->jumlah;
            $hitung =  $cek2->jumlah_barang - $hitungmasuk2;
            DB::table('tb_barang')->where('id_barang', $request->id_barang)->update([
                'jumlah_barang' => $hitung
            ]);
        }

        DB::table('tb_pasok')->where('id_pasok',$request->id_pasok)->update([
            'jumlah_pasok' => $request->jumlah,
            'tanggal_pasok' => $request->tanggal_pasok,
            'nama_pemasok'=>$request->nama_pemasok
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/pasok')->with('update','Data Berhasil Di Update');
    }

}
