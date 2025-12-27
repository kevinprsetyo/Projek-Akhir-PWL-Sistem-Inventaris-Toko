<?php

namespace App\Http\Controllers;
use App\Barang;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        return view('home', ["key" => "home"]);
        // Mkasudnya ini ketika user mengklik router endpoint / maka akan menjalankan fungsi ini lalu emngirimkan variable home ke view dan di view nanti akan ditangkap nah dicek jika varibale sama dengan home maka active navbarnnya
    }
    public function genre()
    {
        return view('genre', ["key" => "genre"]);
    }



    // CRUD BARANG
    public function barang()
    {
        $barang = Barang::orderBy('id', 'desc')->get();
        return view('barang', ["key" => "barang", "br" => $barang]);
    }

    // Menampilkan View Tambah Data Buku 
    public function getform()
    {
        return view("barangform", ["key" => "barang"]);
    }
    // Logika untuk menambah data buku
    public function addData(Request $request)
    {
        if ($request -> hasFile('poster')) {
            $file_name = time() .'.'. $request->file('poster')->getClientOriginalName();
            $path = $request->file('poster')->storeAs('poster',$file_name,'public');

        }else{
            $file_name = null;
            $path = null;
        }

        Barang::create([
            'namabarang'=> $request ->namabarang,
            'stok'=> $request ->stok,
            'harga'=> $request ->harga,
            'supplier'=> $request ->supplier,
            'deskripsi'=> $request ->description,
            'poster'=> $path,
        ]);

        return redirect('/barang')->with('alert', 'Data Berhasil Ditambahkan!');
    }

    // Menampilkan View edit barang sesuai barang 
    public function editdatabarang($id){
        $barang = Barang::find($id);
        return view("editbarang",["key" => "barang", "br" => $barang]);
    }

    // Logika untuk update data buku
    public function saveEditBarang($id, Request $request){
        $barang = Barang::find($id);
        $barang->namabarang = $request->namabarang;
        $barang->stok = $request->stok;
        $barang->harga = $request->harga;
        $barang->supplier = $request->supplier;
        $barang->deskripsi = $request->description;

        if ($request->poster) {
            if ($barang->poster) {
                Storage::disk('public')->delete($barang->poster);
            }
            $file_name = time() .'.'. $request->file('poster')->getClientOriginalName();
            $path = $request->file('poster')->storeAs('poster',$file_name,'public');
            $barang->poster = $path;
        }
        $barang->save();
        return redirect('/barang')->with('alert', 'Data Berhasil Diubah!');
    }

    
    public function deleteBarang($id){
        $barang = Barang::find($id);

        if ($barang->poster) {
             Storage::disk('public')->delete($barang->poster);
        }
        $barang->delete();
        return redirect('/barang')->with('alert', 'Data Berhasil Dihapus!');
    }


    
    public function updatepass(Request $request)
    {
        $user = Auth::user();

        // Cek apakah password lama sesuai
        if (!Auth::attempt([
            'email' => $user->email,
            'password' => $request->password_lama
        ])) {
            return redirect('/changepass')->with('alert', 'Password lama salah');
        }

        // Update password baru
        $user->update([
            'password' => bcrypt($request->password_baru),
        ]);

        // Tambahkan ini agar kembali ke halaman setelah simpan
        return redirect('/changepass')->with('alert', 'Password berhasil diubah');
    }
}
