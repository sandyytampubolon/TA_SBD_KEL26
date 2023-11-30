<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi_Tbs;
use DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $dataTrans = DB::select('SELECT * FROM transaksi_tbs');
        return view('trans-index', compact('dataTrans'));
    }

    public function showTrans($id_transaction)
    {
        $dataTrans = DB::select("SELECT * FROM transaksi_tbs WHERE id_transaction = :id_transaction", ['id_transaction' => $id_transaction]);

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
            'fk_id_item' => 'required',
            'fk_id_pelanggan' => 'required',
            'transaction_date' => 'required',
            'item_amount' => 'required'
        ]);

        DB::update("
            UPDATE transaksi_tbs
            SET id_transaction = :new_id_transaction,
                fk_id_item = :new_fk_id_item,
                fk_id_pelanggan = :new_fk_id_pelanggan,
                transaction_date = :new_transaction_date,
                item_amount = :new_item_amount
            WHERE id_transaction = :id_transaction
        ", [
            'new_id_transaction' => $request->id_transaction,
            'new_fk_id_item' => $request->fk_id_item,
            'new_fk_id_pelanggan' => $request->fk_id_pelanggan,
            'new_transaction_date' => $request->transaction_date,
            'new_item_amount' => $request->item_amount,
            'id_transaction' => $id_transaction
        ]);

        return redirect(route('trans-index'));
    }

    public function deleteTrans($id_transaction)
    {
        DB::delete("DELETE FROM transaksi_tbs WHERE id_transaction = :id_transaction", ['id_transaction' => $id_transaction]);

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
            'fk_id_item' => 'required',
            'fk_id_pelanggan' => 'required',
            'transaction_date' => 'required',
            'item_amount' => 'required'
        ]);

        DB::insert(
            'INSERT INTO transaksi_tbs(id_transaction, fk_id_item, fk_id_pelanggan, transaction_date, item_amount) VALUES (:id_transaction, :fk_id_item, :fk_id_pelanggan, :transaction_date, :item_amount)',
            [
                'id_transaction' => $dataTrans['id_transaction'],
                'fk_id_item' => $dataTrans['fk_id_item'],
                'fk_id_pelanggan' => $dataTrans['fk_id_pelanggan'],
                'transaction_date' => $dataTrans['transaction_date'],
                'item_amount' => $dataTrans['item_amount']
            ]
        );

        return redirect(route('trans-index'));
    }

    public function softDelete(Request $request, $id_transaction)
    {
        $dataTrans = Transaksi_Tbs::findOrFail($id_transaction);
        $dataTrans->delete();

        return redirect()->route('trans-softdelete')->with('success', 'Data berhasil dihapus secara lunak.');
    }

    public function innerJoin() {
        $data = DB::select('
            SELECT
            transaksi_tbs.id_transaction AS id_transaction,
            pelanggans.nama_pelanggan AS nama_pelanggan,
            produks.nama_barang AS nama_barang,
            merks.nama_merk AS nama_merk,
            transaksi_tbs.transaction_date AS transaction_date,
            transaksi_tbs.item_amount AS item_amount
            FROM
            transaksi_tbs
            INNER JOIN
                pelanggans ON transaksi_tbs.fk_id_pelanggan = pelanggans.id_pelanggan
            INNER JOIN
                produks ON transaksi_tbs.fk_id_item = produks.id_item
            INNER JOIN
                merks ON produks.fk_id_merk = merks.id_merk;
        ');

        return view('trans-join', compact('data'));
    }
}
