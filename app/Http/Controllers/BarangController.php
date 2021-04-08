<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class BarangController extends Controller
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
        $barang= DB::table('tb_barang')
                ->join('kategori', function ($join) {
                    $join->on('tb_barang.kategori_id', '=', 'kategori.id_kategori');
                })->get();

        $kategori = DB::table('kategori')->get();

        return view('barang/index',compact('barang','kategori'));
    }

    public function cetak()
    {
        $barang= DB::table('tb_barang')->get();
        return view('barang/cetak',compact('barang'));
    }

    public function store(Request $request)
    {
        $cek = DB::table('tb_barang')->where('id_barang',$request->id_barang)->count();
        if($cek == 1){
            return redirect()->back();
        }
        else
        {
            DB::table('tb_barang')->insert([
                'id_barang' => $request->id_barang,
                'nama_barang' => $request->nama_barang,
                'kategori_id' => $request->kategori_id,
                'jumlah_barang' => $request->jumlah_barang,
                'harga_barang' => $request->harga_barang,
        ]);

        return redirect()->back()->with('masuk','Data Berhasil Di Input');
        }
        
    }

    public function edit($id)
    {
        $barang= DB::table('tb_barang')->where('id_barang',$id)
                ->join('kategori',function($join){
                    $join->on('tb_barang.kategori_id','=','kategori.id_kategori');
                })->first();
        $kategori = DB::table('kategori')->get();
        return view('barang/edit',compact('barang','kategori'));
    }

    public function update(Request $request)
    {
        
        DB::table('tb_barang')->where('id_barang',$request->id_barang2)->update([
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            'jumlah_barang' => $request->jumlah_barang,
            'harga_barang' => $request->harga_barang,
        ]);

        return redirect('barang')->with('update','Data Berhasil Di Update');
        
    }
}
