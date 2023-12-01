<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Vinyls;

class VinylController extends Controller
{
    public function index()
    {
        $dataVinyl = DB::select('SELECT * FROM vinyls');
        return view('vinyl-index', compact('dataVinyl'));
    }

    public function showVinyl($id_vinyl)
    {
        $dataVinyl = DB::select("SELECT * FROM vinyls WHERE id_vinyl = :id_vinyl", ['id_vinyl' => $id_vinyl]);

        if (!empty($dataVinyl)) {
            // Access the first element of the array
            $dataVinyl = $dataVinyl[0];
        } else {
            // Handle the case where no rows were returned (e.g., set $dataVinyl to null)
            $dataVinyl = null;
        }

        return view('vinyl-show', compact('dataVinyl'));
    }

    public function updateVinyl(Request $request, $id_vinyl)
    {
        $dataVinyl = $request->validate([
            'id_vinyl' => 'required',
            'nama_vinyl' => 'required',
            'price' => 'required',
            'fk_id_category' => 'required'
        ]);

        DB::update("
            UPDATE vinyls
            SET id_vinyl = :new_id_vinyl,
                nama_vinyl = :new_nama_vinyl,
                price = :new_price,
                fk_id_category = :new_fk_id_category
            WHERE id_vinyl = :id_vinyl
        ", [
            'new_id_vinyl' => $request->id_vinyl,
            'new_nama_vinyl' => $request->nama_vinyl,
            'new_price' => $request->price,
            'new_fk_id_category' => $request->fk_id_category,
            'id_vinyl' => $id_vinyl
        ]);

        return redirect(route('vinyl-index'));
    }

    public function deleteVinyl($id_vinyl)
    {
        DB::delete("DELETE FROM vinyls WHERE id_vinyl = :id_vinyl", ['id_vinyl' => $id_vinyl]);

        return redirect(route('vinyl-index'));
    }

    public function create()
    {
        return view('vinyl-create');
    }

    public function storeVinyl(Request $request)
    {
        $dataVinyl = $request->validate([
            'id_vinyl' => 'required',
            'nama_vinyl' => 'required',
            'price' => 'required',
            'fk_id_category' => 'required'
        ]);

        DB::insert(
            'INSERT INTO vinyls(id_vinyl, nama_vinyl, price, fk_id_category) VALUES (:id_vinyl, :nama_vinyl, :price, :fk_id_category)',
            [
                'id_vinyl' => $dataVinyl['id_vinyl'],
                'nama_vinyl' => $dataVinyl['nama_vinyl'],
                'price' => $dataVinyl['price'],
                'fk_id_category' => $dataVinyl['fk_id_category']
            ]
        );

        return redirect(route('vinyl-index'));
    }

    public function softDelete(Request $request, $id_vinyl)
    {
        $dataVinyl = Vinyls::findOrFail($id_vinyl);
        $dataVinyl->delete();

        return redirect()->route('vinyl-softdelete')->with('success', 'Data berhasil dihapus secara lunak.');
    }
}
