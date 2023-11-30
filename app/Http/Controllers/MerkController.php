<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merks;
use DB;

class MerkController extends Controller
{
    public function index()
    {
        $dataMerk = DB::table('merks')
            ->whereNull('deleted_at') 
            ->get();

        return view('merk-index', compact('dataMerk'));
    }

    public function create()
    {
        return view('merk-create');
    }

    public function showMerk($id_merk)
    {
        $dataMerk = DB::select("SELECT * FROM merks WHERE id_merk = :id_merk", ['id_merk' => $id_merk]);

        if (!empty($dataMerk)) {
            // Access the first element of the array
            $dataMerk = $dataMerk[0];
        } else {
            // Handle the case where no rows were returned (e.g., set $dataMerk to null)
            $dataMerk = null;
        }

        return view('merk-show', compact('dataMerk'));
    }

    public function updateMerk(Request $request, $id_merk)
    {
        $dataMerk = $request->validate([
            'id_merk' => 'required',
            'nama_merk' => 'required',
            'country' => 'required',
        ]);

        DB::update("
        UPDATE merks
        SET id_merk = :new_id_merk,
            nama_merk = :new_nama_merk,
            country = :new_country
        WHERE id_merk = :id_merk
    ", [
            'new_id_merk' => $request->id_merk,
            'new_nama_merk' => $request->nama_merk,
            'new_country' => $request->country,
            'id_merk' => $id_merk
        ]);

        return redirect(route('merk-index'));
    }

    public function deleteMerk($id_merk)
    {
        
        try {
            
            DB::delete("DELETE FROM merks WHERE id_merk = :id_merk", ['id_merk' => $id_merk]);
            return redirect(route('merk-index'));
        } catch (\Exception $e) {
            
            if ($e->getCode() === '23000') {
                return redirect(route('merk-index'))->with('error', 'Data tidak dapat dihapus karena digunakan oleh tabel lain.');
            }  else {
                
                return redirect(route('merk-index'));
            }
           
        }
        
    
    }




    public function storeMerk(Request $request)
    {
        $dataMerk = $request->validate([
            'id_merk' => 'required',
            'nama_merk' => 'required',
            'country' => 'required',
        ]);

        DB::insert(
            'INSERT INTO merks(id_merk, nama_merk, country) VALUES (:id_merk, :nama_merk, :country)',
            [
                'id_merk' => $dataMerk['id_merk'],
                'nama_merk' => $dataMerk['nama_merk'],
                'country' => $dataMerk['country'],
            ]
        );
        return redirect(route('merk-index'));
    }

    public function softDelete(Request $request, $id_merk)
    {
        
        DB::table('merks')
            ->where('id_merk', $id_merk)
            ->update(['deleted_at' => now()]);
    
        return redirect()->route('merk-index')->with('success', 'Data berhasil dihapus secara lunak.');
    }
    
}
