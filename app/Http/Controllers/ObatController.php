<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObatController extends Controller
{
    public function dataobat(){
        $obat = Obat::with('user')->orderBy('id', 'DESC')->get();
        // dd($obat);
        return view('obat.dataobat',[
            "title" => "Obat"
        ], compact('obat'));
        
    }

    public function tambahobat(){
        return view('obat.tambahobat', [
            "title" => "Tambah Obat"
        ]);
    }

    public function storeobat(Request $request){
        $obat = $request->validate([
            'nama_obat' => 'required',
            'tgl_pembuatan' => 'required',
            'tgl_kadaluarsa' => 'required',
        ]);
        // dd($obat['nama_obat']);
        $obat['created_by'] = Auth::user()->id;
        // dd('berhasil');
        Obat::create($obat);
        return redirect('/dataobat')->with('berhasil', 'Data Obat Berhasil ditambahkan!!');
    }

    public function editobat($id){
        $obat = Obat::find($id);
        return view('obat.editobat', compact('obat'), [
            "title" => "Edit Obat"
        ]);
    }

    public function updateobat(Request $request, $id){
        $obat = Obat::find($id);
        $obat->update([
            'nama_obat' => $request->nama_obat,
            'tgl_pembuatan' => $request->tgl_pembuatan,
            'tgl_kadaluarsa' => $request->tgl_kadaluarsa,
        ]);
        return redirect('/dataobat')->with('berhasil', 'Data Obat Berhasil diubah!!');
    }

    public function deleteObat($id){
        $obat = Obat::find($id);
        $obat->delete($obat->id);
        return redirect('/dataobat')->with('delete', 'Data Obat Berhasil dihapus!!');
    }
}
