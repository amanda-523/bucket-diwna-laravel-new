<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AccountAddressController extends Controller
{
    public function index()
    {
        $addresses = Address::with(['provinces', 'regencies'])->where('user_id', Auth::id())->get();
        return view('pages.account-address', compact('addresses'));
    }


    public function create()
    {
        return view('pages.account-address-create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'provinces_id' => 'required|integer',
            'regencies_id' => 'required|integer',
            'zip_code' => 'required|integer',
            'country' => 'required|string',
            'phone_number' => 'required|string',
            'is_selected' => 'nullable|boolean',
        ]);

        // Tambahkan data user_id
        $validated['user_id'] = auth()->id();

        // Jika is_selected diisi, set alamat lainnya menjadi tidak utama
        if ($request->has('is_selected')) {
            Address::where('user_id', auth()->id())->update(['is_selected' => 0]);
            $validated['is_selected'] = 1;
        }

        // Simpan data ke database
        Address::create($validated);

        // Redirect ke halaman daftar alamat
        return redirect()->route('account-address')->with('success', 'Alamat berhasil disimpan!');
    }

    public function edit(string $id)
    {
        $address = Address::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        return view('pages.account-address-edit', [
            'address' => $address,
        ]);
    }

    public function update(Request $request, string $id)
    {
        // Validasi data dari request
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'provinces_id' => 'required|integer',
            'regencies_id' => 'required|integer',
            'zip_code' => 'required|integer',
            'country' => 'required|string',
            'phone_number' => 'required|string',
            'is_selected' => 'nullable|boolean',
        ]);

        // Ambil alamat berdasarkan ID dan pastikan milik user yang sedang login
        $address = Address::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Jika is_selected diisi, set alamat lainnya menjadi tidak utama
        if ($request->has('is_selected')) {
            Address::where('user_id', auth()->id())->update(['is_selected' => 0]);
            $data['is_selected'] = 1;
        } else {
            // Jika tidak ada perubahan pada 'is_selected', gunakan nilai sebelumnya
            $data['is_selected'] = $address->is_selected;
        }

        // Update data alamat
        $address->update($data);

        // Redirect ke halaman daftar alamat dengan pesan sukses
        return redirect()->route('account-address')->with('success', 'Alamat berhasil diubah!');
    }


    public function destroy($id)
    {
        $address = Address::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $address->delete();

        return redirect()->route('account-address');
    }
}
