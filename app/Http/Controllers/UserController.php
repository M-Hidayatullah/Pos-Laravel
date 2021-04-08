<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class UserController extends Controller
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
        
        $user = DB::table('users')->where('level','A')->get();
        return view('user/index',compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'name'=> 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            
        ]);

            DB::table('users')->insert([
                'name'=> $request->name,
                'email' => $request->email,
                'password'=>bcrypt($request->password),
                'level' => 'A',
            ]);
        
        return redirect()->back()->with('masuk','Data Berhasil Di Input');
    }

    public function edit($id)
    {
        $admin = DB::table('users')->where('id',$id)->first();
        return view('user/edit',compact('admin'));
    }

    public function update(Request $request)
    {
        
        DB::table('users')->where('id',$request->id)->update([
            'name' => $request->name,
        ]);

        return redirect('user')->with('update','Data Berhasil Di Update');
    }

    #kasir

    public function index2()
    {
        
        $user = DB::table('users')->where('level','K')->get();
        return view('kasir/index',compact('user'));
    }

    public function store2(Request $request)
    {
        $request->validate([

            'name'=> 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            
        ]);

            DB::table('users')->insert([
                'name'=> $request->name,
                'email' => $request->email,
                'password'=>bcrypt($request->password),
                'level' => 'K',
            ]);
        
        return redirect()->back()->with('masuk','Data Berhasil Di Input');
    }

    public function edit2($id)
    {
        $kasir = DB::table('users')->where('id',$id)->first();
        return view('kasir/edit',compact('kasir'));
    }

    public function update2(Request $request)
    {
        
        DB::table('users')->where('id',$request->id)->update([
            'name' => $request->name,
        ]);

        return redirect('kasir')->with('update','Data Berhasil Di Update');
    }
}
