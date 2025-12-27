<?php

namespace App\Http\Controllers;
use App\User;
use App\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function dataUsers()
    {
        $user = User::orderBy('id', 'desc')->get();
        return view('users', ["key"=>"users","user" => $user]);
    }
    public function formUser()
    {
        return view('userForm', ["key"=>"users"]);
    }
    public function addUser(Request $request)
    {
        if ($request -> hasFile('foto')) {
            $file_name = time() .'.'. $request->file('foto')->getClientOriginalName();
            $path = $request->file('foto')->storeAs('foto',$file_name,'public');

        }else{
            $file_name = null;
            $path = null;
        }

        User::create([
            'name'=> $request ->name,
            'email'=> $request ->email,
            'password'=> bcrypt($request ->password),
            'foto'=> $path,
        ]);

        return redirect('/users')->with('alert', 'Data Berhasil Ditambahkan!');
    }
    public function deleteUsers($id){
         $users = User::find($id);

        if ($users->foto) {
             Storage::disk('public')->delete('foto/'.$users->foto);
        }
        $users->delete();
        return redirect('/users')->with('alert','Data User Dihapus');
    }

    public function search()
    {
        return view ('searchbarang');
    }
    public function hasil(Request $request)
    {
        $keyword = $request->q;
        $barang = Barang::where('namabarang','like','%'.$keyword.'%')->get();
        return view('actsearchbarang',['br' => $barang]);
    }
}
