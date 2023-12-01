<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use DB;

class CustomerController extends Controller
{
    public function index()
    {
        $dataCustomer = DB::select('SELECT * FROM customers');
        return view('customer-index', compact('dataCustomer'));
    }


    public function showCustomer($id_customer)
{
    $dataCustomer = DB::select("SELECT * FROM customers WHERE id_customer = :id_customer", ['id_customer' => $id_customer]);

    if (!empty($dataCustomer)) {
        // Access the first element of the array
        $dataCustomer = $dataCustomer[0];
    } else {
        // Handle the case where no rows were returned (e.g., set $dataCustomer to null)
        $dataCustomer = null;
    }

    return view('customer-show', compact('dataCustomer'));
}


    public function updateCustomer(Request $request, $id_customer)
    {
        $dataCustomer = $request->validate([
            'id_customer' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'age' => 'required'
        ]);

        DB::update("
        UPDATE customers
        SET
            id_customer = :new_id_customer,
            nama = :new_nama,
            alamat = :new_alamat,
            age = :new_age

        WHERE id_customer = :id_customer",
            [
                'new_id_customer' => $request->id_customer,
                'new_nama' => $request->nama,
                'new_alamat' => $request->alamat,
                'new_age' => $request->age,
                'id_customer' => $id_customer

            ]
        );

        return redirect(route('customer-index'));
    }

    public function deleteCustomer($id_customer)
    {
        DB::delete("DELETE FROM customers WHERE id_customer = :id_customer", ['id_customer' => $id_customer]);

        return redirect(route('customer-index'));
    }

    public function create()
    {
        return view('customer-create');
    }

    public function storeCustomer(Request $request)
    {
        $dataCustomer = $request->validate([
            'id_customer' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'age' => 'required'
        ]);

        DB::insert(
            'INSERT INTO customers(id_customer, nama, alamat, age) VALUES (:id_customer, :nama, :alamat, :age)',
            [
                'id_customer' => $dataCustomer['id_customer'],
                'nama' => $dataCustomer['nama'],
                'alamat' => $dataCustomer['alamat'],
                'age' => $dataCustomer['age']

            ]
        );

        return redirect(route('customer-index'));
    }
}
