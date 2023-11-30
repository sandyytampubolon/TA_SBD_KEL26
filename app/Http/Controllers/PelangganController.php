<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggans;
use DB;

class PelangganController extends Controller
{
    public function index()
    {
        $dataPelanggan = DB::select('SELECT * FROM pelanggans');
        return view('pelanggan-index', compact('dataPelanggan'));
    }

    public function showPelanggan($id_pelanggan)
    {
        $dataPelanggan = Pelanggans::find($id_pelanggan);
        return view('pelanggan-show', compact('dataPelanggan'));
    }

    public function updatePelanggan(Request $request, $id_pelanggan)
    {
        $dataPelanggan = $request->validate([
            'id_pelanggan' => 'required',
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'loyalty_rank' => 'required'
        ]);

        DB::update("
        UPDATE pelanggans
        SET
            id_pelanggan = :new_id_pelanggan,
            nama_pelanggan = :new_nama_pelanggan,
            alamat = :new_alamat,
            loyalty_rank = :new_loyalty_rank

        WHERE id_pelanggan = :id_pelanggan",
            [
                'new_id_pelanggan' => $request->id_pelanggan,
                'new_nama_pelanggan' => $request->nama_pelanggan,
                'new_alamat' => $request->alamat,
                'new_loyalty_rank' => $request->loyalty_rank,
                'id_pelanggan' => $id_pelanggan

            ]
        );

        return redirect(route('pelanggan-index'));
    }

    public function deletePelanggan($id_pelanggan)
    {
        Pelanggans::where('id_pelanggan', $id_pelanggan)->delete();
        return redirect(route('pelanggan-index'));
    }

    public function create()
    {
        return view('pelanggan-create');
    }

    public function storePelanggan(Request $request)
    {
        $dataPelanggan = $request->validate([
            'id_pelanggan' => 'required',
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'loyalty_rank' => 'required'
        ]);

        DB::insert(
            'INSERT INTO pelanggans(id_pelanggan, nama_pelanggan, alamat, loyalty_rank) VALUES (:id_pelanggan, :nama_pelanggan, :alamat, :loyalty_rank)',
            [
                'id_pelanggan' => $dataPelanggan['id_pelanggan'],
                'nama_pelanggan' => $dataPelanggan['nama_pelanggan'],
                'alamat' => $dataPelanggan['alamat'],
                'loyalty_rank' => $dataPelanggan['loyalty_rank']

            ]
        );

        return redirect(route('pelanggan-index'));
    }
}
