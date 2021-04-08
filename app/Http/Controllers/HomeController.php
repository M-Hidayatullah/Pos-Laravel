<?php


namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $jumlah_barang =  DB::table('tb_barang')->sum('jumlah_barang');
        $jumlah_pasok =  DB::table('tb_pasok')->sum('jumlah_pasok');
        $jumlah_kasir =  DB::table('users')->where('level','K')->count();
        $jumlah_transaksi =  DB::table('tb_kembalian')->count();
        $laporan= DB::table('tb_kembalian')->get();
                    
        return view('home',compact('jumlah_barang','jumlah_pasok','jumlah_transaksi','jumlah_kasir','laporan'));
    }
}
