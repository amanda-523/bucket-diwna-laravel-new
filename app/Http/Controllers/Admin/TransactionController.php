<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;

use App\Http\Requests\Admin\TransactionRequest;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Transaction::with(['user']);

            return Datatables::of($query)
                ->addColumn('resi', function ($item) {
                    // Ambil nomor resi dari TransactionDetail
                    $transactionDetail = TransactionDetail::where('transactions_id', $item->id)->first();
                    return $transactionDetail ? $transactionDetail->resi : '';
                })
                ->addColumn('action', function ($item) {
                    $toggle = '
                <input type="checkbox" class="toggle-status" data-id="' . $item->id . '" '
                        . ($item->transaction_status === 'SUCCESS' ? 'checked' : '') . ' />';

                    $resiForm = '';
                    if ($item->transaction_status === 'SUCCESS') {
                        $resiForm = '
                    <form class="d-flex mt-2" onsubmit="event.preventDefault();">
                        <input type="text" id="resi-' . $item->id . '" class="form-control" placeholder="Input Resi" />
                        <button type="button" class="btn btn-sm btn-primary ml-2" onclick="addResi(' . $item->id . ')">Simpan</button>
                    </form>
                ';
                    }

                    return $toggle . $resiForm;
                })
                ->rawColumns(['action', 'resi'])
                ->make();
        }
        return view('pages.admin.transaction.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaction = Transaction::findOrFail($id);

        return view('pages.admin.transaction.edit', [
            'transaction' => $transaction,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransactionRequest $request, string $id)
    {
        $data = $request->validate([
            'transaction_status' => 'required|string',
        ]);

        $transaction = Transaction::findOrFail($id);

        $transaction->update($data);

        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transaction.index');
    }

    public function toggleStatus(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->transaction_status = $request->status;
        $transaction->save();

        return response()->json(['success' => true]);
    }

    public function addResi(Request $request, $id)
    {
        $request->validate([
            'resi' => 'required|string|max:255',
        ]);

        // Debugging
        $transactionDetail = TransactionDetail::where('transactions_id', $id)->first();
        if (!$transactionDetail) {
            return response()->json(['success' => false, 'message' => 'TransactionDetail tidak ditemukan!']);
        }

        $transactionDetail->resi = $request->resi;
        $transactionDetail->save();

        return response()->json(['success' => true, 'message' => 'Nomor resi berhasil ditambahkan']);
    }
}
