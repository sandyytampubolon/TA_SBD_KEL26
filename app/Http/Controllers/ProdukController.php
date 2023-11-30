<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Produks;

class ProdukController extends Controller
{
    public function index()
    {
        $dataProduk = DB::select('SELECT * FROM produks');
        return view('produk-index', compact('dataProduk'));
    }

    public function showProduk($id_item)
    {
        $dataProduk = DB::select("SELECT * FROM produks WHERE id_item = :id_item", ['id_item' => $id_item]);

        if (!empty($dataProduk)) {
            // Access the first element of the array
            $dataProduk = $dataProduk[0];
        } else {
            // Handle the case where no rows were returned (e.g., set $dataProduk to null)
            $dataProduk = null;
        }

        return view('produk-show', compact('dataProduk'));
    }


    public function updateProduk(Request $request, $id_item)
    {
        $dataProduk = $request->validate([
            'id_item' => 'required',
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'fk_id_merk' => 'required'
        ]);

     DB::update("
    UPDATE produks
    SET id_item = :new_id_item,
        nama_barang = :new_nama_barang,
        harga_barang = :new_harga_barang,
        fk_id_merk = :new_fk_id_merk
    WHERE id_item = :id_item
", [
    'new_id_item' => $request->id_item,
    'new_nama_barang' => $request->nama_barang,
    'new_harga_barang' => $request->harga_barang,
    'new_fk_id_merk' => $request->fk_id_merk,
    'id_item' => $id_item
]);

        return redirect(route('produk-index'));

    }

    public function deleteProduk($id_item)
    {
        DB::delete("DELETE FROM produks WHERE id_item = :id_item", ['id_item' => $id_item]);

        return redirect(route('produk-index'));
    }

    public function create()
    {
        return view('produk-create');
    }

    public function storeProduk(Request $request){
    $dataProduk = $request->validate([
        'id_item' => 'required',
        'nama_barang' => 'required',
        'harga_barang' => 'required',
        'fk_id_merk' => 'required'
    ]);

    DB::insert(
        'INSERT INTO produks(id_item, nama_barang, harga_barang, fk_id_merk) VALUES (:id_item, :nama_barang, :harga_barang, :fk_id_merk)',
        [
            'id_item' => $dataProduk['id_item'],
            'nama_barang' => $dataProduk['nama_barang'],
            'harga_barang' => $dataProduk['harga_barang'],
            'fk_id_merk' => $dataProduk['fk_id_merk']

        ]
    );
    return redirect(route('produk-index'));
}


    public function softDelete(Request $request, $id_item)
    {
        $dataProduk = Produks::findOrFail($id_item);
        $dataProduk->delete();

        return redirect()->route('produk-softdelete')->with('success', 'Data berhasil dihapus secara lunak.');
    }



}
