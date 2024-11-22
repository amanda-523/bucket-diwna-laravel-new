<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Http\Requests\Admin\TransactionRequest;
use App\Models\Transaction;
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
                ->addColumn('toggle_status', function ($item) {
                    $isChecked = $item->transaction_status === 'SUCCESS' ? 'checked' : '';
                    return '
                        <label class="switch">
                            <input type="checkbox" class="toggle-status" data-id="' . $item->id . '" ' . $isChecked . '>
                            <span class="slider round"></span>
                        </label>
                    ';
                })
                ->rawColumns(['toggle_status'])
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
}
