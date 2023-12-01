<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use DB;

class CategoryController extends Controller
{
    public function index()
    {
        $dataCategory = DB::table('categories')->get();
        return view('category-index', compact('dataCategory'));
    }

    public function create()
    {
        return view('category-create');
    }

    public function showCategory($id_category)
    {
        $dataCategory = DB::select("SELECT * FROM categories WHERE id_category = :id_category", ['id_category' => $id_category]);

        if (!empty($dataCategory)) {
            // Access the first element of the array
            $dataCategory = $dataCategory[0];
        } else {
            // Handle the case where no rows were returned (e.g., set $dataCategory to null)
            $dataCategory = null;
        }

        return view('category-show', compact('dataCategory'));
    }

    public function updateCategory(Request $request, $id_category)
    {
        $dataCategory = $request->validate([
            'id_category' => 'required',
            'nama_category' => 'required',
            'pop_rate' => 'required',
        ]);

        DB::update("
        UPDATE categories
        SET id_category = :new_id_category,
            nama_category = :new_nama_category,
            pop_rate = :new_pop_rate
        WHERE id_category = :id_category
    ", [
            'new_id_category' => $request->id_category,
            'new_nama_category' => $request->nama_category,
            'new_pop_rate' => $request->pop_rate,
            'id_category' => $id_category
        ]);

        return redirect(route('category-index'));
    }

    public function deleteCategory($id_category)
    {
        
        try {
            
            DB::delete("DELETE FROM categories WHERE id_category = :id_category", ['id_category' => $id_category]);
            return redirect(route('category-index'));
        } catch (\Exception $e) {
            
            if ($e->getCode() === '23000') {
                return redirect(route('category-index'))->with('error', 'Data tidak dapat dihapus karena digunakan oleh tabel lain.');
            }  else {
                
                return redirect(route('category-index'));
            }
           
        }
        
    
    }

    public function storeCategory(Request $request)
    {
        $dataCategory = $request->validate([
            'id_category' => 'required',
            'nama_category' => 'required',
            'pop_rate' => 'required',
        ]);

        DB::insert(
            'INSERT INTO categories(id_category, nama_category, pop_rate) VALUES (:id_category, :nama_category, :pop_rate)',
            [
                'id_category' => $dataCategory['id_category'],
                'nama_category' => $dataCategory['nama_category'],
                'pop_rate' => $dataCategory['pop_rate'],
            ]
        );
        return redirect(route('category-index'));
    }

    public function softDeleteCategory(Request $request, $id_category)
    {
        
        DB::table('categories')
            ->where('id_category', $id_category)
            ->update(['deleted_at' => now()]);
    
        return redirect()->route('category-index')->with('success', 'Data berhasil dihapus secara lunak.');
    }
    
}
