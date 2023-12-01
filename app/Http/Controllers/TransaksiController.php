<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksis;
use DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $dataTrans = DB::select('SELECT * FROM transaksis');
        return view('trans-index', compact('dataTrans'));
    }

    public function showTrans($id_transaction)
    {
        $dataTrans = DB::select("SELECT * FROM transaksis WHERE id_transaction = :id_transaction", ['id_transaction' => $id_transaction]);

        if (!empty($dataTrans)) {
            $dataTrans = $dataTrans[0];
        } else {
            $dataTrans = null;
        }

        return view('trans-show', compact('dataTrans'));
    }

    public function updateTrans(Request $request, $id_transaction)
    {
        $dataTrans = $request->validate([
            'id_transaction' => 'required',
            'fk_id_vinyl' => 'required',
            'fk_id_customer' => 'required',
            'transaction_date' => 'required',
            'item_amount' => 'required'
        ]);

        DB::update("
            UPDATE transaksis
            SET id_transaction = :new_id_transaction,
                fk_id_vinyl = :new_fk_id_vinyl,
                fk_id_customer = :new_fk_id_customer,
                transaction_date = :new_transaction_date,
                item_amount = :new_item_amount
            WHERE id_transaction = :id_transaction
        ", [
            'new_id_transaction' => $request->id_transaction,
            'new_fk_id_vinyl' => $request->fk_id_vinyl,
            'new_fk_id_customer' => $request->fk_id_customer,
            'new_transaction_date' => $request->transaction_date,
            'new_item_amount' => $request->item_amount,
            'id_transaction' => $id_transaction
        ]);

        return redirect(route('trans-index'));
    }

    public function deleteTrans($id_transaction)
    {
        DB::delete("DELETE FROM transaksis WHERE id_transaction = :id_transaction", ['id_transaction' => $id_transaction]);

        return redirect(route('trans-index'));
    }

    public function create()
    {
        return view('trans-create');
    }

    public function storeTrans(Request $request)
    {
        $dataTrans = $request->validate([
            'id_transaction' => 'required',
            'fk_id_vinyl' => 'required',
            'fk_id_customer' => 'required',
            'transaction_date' => 'required',
            'item_amount' => 'required'
        ]);

        DB::insert(
            'INSERT INTO transaksis(id_transaction, fk_id_vinyl, fk_id_customer, transaction_date, item_amount) VALUES (:id_transaction, :fk_id_vinyl, :fk_id_customer, :transaction_date, :item_amount)',
            [
                'id_transaction' => $dataTrans['id_transaction'],
                'fk_id_vinyl' => $dataTrans['fk_id_vinyl'],
                'fk_id_customer' => $dataTrans['fk_id_customer'],
                'transaction_date' => $dataTrans['transaction_date'],
                'item_amount' => $dataTrans['item_amount']
            ]
        );

        return redirect(route('trans-index'));
    }

    public function softDelete(Request $request, $id_transaction)
    {
        $dataTrans = Transaksi::findOrFail($id_transaction);
        $dataTrans->delete();

        return redirect()->route('trans-softdelete')->with('success', 'Data berhasil dihapus secara lunak.');
    }

    public function innerJoin()
    {
        $data = DB::select('
            SELECT
            transaksis.id_transaction AS id_transaction,
            customers.nama AS nama,
            vinyls.nama_vinyl AS nama_vinyl,
            categories.nama_category AS nama_category,
            transaksis.transaction_date AS transaction_date,
            transaksis.item_amount AS item_amount
            FROM
            transaksis
            INNER JOIN
                customers ON transaksis.fk_id_customer = customers.id_customer
            INNER JOIN
                vinyls ON transaksis.fk_id_vinyl = vinyls.id_vinyl
            INNER JOIN
                categories ON vinyls.fk_id_category = categories.id_category;
        ');

        return view('trans-join', compact('data'));
    }

    public function searchTransactions(Request $request) {
        $keyword = $request->input('keyword');
    
        $data = DB::table('transaksis')
            ->select(
                'transaksis.id_transaction AS id_transaction',
                'customers.nama AS nama',
                'vinyls.nama_vinyl AS nama_vinyl',
                'categories.nama_category AS nama_category',
                'transaksis.transaction_date AS transaction_date',
                'transaksis.item_amount AS item_amount'
            )
            ->join('customers', 'transaksis.fk_id_customer', '=', 'customers.id_customer')
            ->join('vinyls', 'transaksis.fk_id_vinyl', '=', 'vinyls.id_vinyl')
            ->join('categories', 'vinyls.fk_id_category', '=', 'categories.id_category')
            ->where('customers.nama', 'LIKE', "%$keyword%")
            ->orWhere('vinyls.nama_vinyl', 'LIKE', "%$keyword%")
            ->orWhere('categories.nama_category' ,'LIKE', "%$keyword%")
            ->get();
    
        return view('trans-join', compact('data'));
    }
    
}
