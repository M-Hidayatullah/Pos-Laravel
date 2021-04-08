<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class KategoriController extends Controller
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
        $kategori= DB::table('kategori')->get();

        return view('kategori/index',compact('kategori'));
    }

    public function store(Request $request)
    {
        DB::table('kategori')->insert([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect()->back()->with('masuk','Data Berhasil Di Input');
    }

    public function edit($id)
    {
        $kategori = DB::table('kategori')->where('id_kategori',$id)->first();

        return view('kategori/edit',compact('kategori'));
    }

    public function update(Request $request)
    {
        DB::table('kategori')->where('id_kategori',$request->id_kategori)->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect('kategori')->with('update','Data Berhasil Di Update');
    }
}
