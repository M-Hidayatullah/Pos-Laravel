<?php

namespace App\Http\Controllers;

use auth;
use DB;
use Illuminate\Http\Request;

class LaporanController extends Controller
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

    public function index()
    {
        $laporan= DB::table('tb_kembalian')->get();

        return view('laporan/index',compact('laporan'));
    }

    public function detail($id)
    {
        $transaksi =DB::table('tb_transaksi')->where('kode_transaksi',$id)
                ->join('tb_barang',function($join){
                    $join->on('tb_transaksi.barang_id','=','tb_barang.id_barang');
                })->get();
        $ambil =DB::table('tb_transaksi')->where('kode_transaksi',$id)->first();
        $jumlah =  DB::table('tb_transaksi')->where('kode_transaksi',$id)
                    ->join('tb_barang',function($join){
                        $join->on('tb_transaksi.barang_id','=','tb_barang.id_barang');
                    })->sum('total_harga');
        $kasir = DB::table('tb_transaksi')->where('kode_transaksi',$id)
                ->join('users',function($join){
                    $join->on('tb_transaksi.pengguna_id','=','users.id');
                })->first();
        $kembalian=DB::table('tb_kembalian')->where('kode_transaksi_kembalian',$id)->first();

        return view('laporan/detail',compact('transaksi','kembalian','ambil','jumlah','kasir'));
    }
}
