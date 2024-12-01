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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'provinces_id' => 'required|integer',
            'regencies_id' => 'required|integer',
            'zip_code' => 'required|integer',
            'country' => 'required|string',
            'phone_number' => 'required|string',
            'is_selected' => 'nullable|boolean', // Validasi untuk is_selected
        ]);

        // Menangani input checkbox is_selected
        $isSelected = $request->has('is_selected') ? 1 : 0;

        // Membuat atau memperbarui alamat
        Address::create([
            'user_id' => auth()->id(),
            'name' => $validated['name'],
            'address' => $validated['address'],
            'provinces_id' => $validated['provinces_id'],
            'regencies_id' => $validated['regencies_id'],
            'zip_code' => $validated['zip_code'],
            'country' => $validated['country'],
            'phone_number' => $validated['phone_number'],
            'is_selected' => $isSelected, // Menyimpan nilai boolean
        ]);

        return redirect()->route('account-address')->with('success', 'Alamat berhasil disimpan!');
    }

    public function edit(Address $address)
    {
        $this->authorize('update', $address);
        return view('pages.account-address-edit', compact('address'));
    }

    public function update(Request $request, Address $address)
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
            'is_selected' => 'nullable|boolean', // Validasi untuk is_selected
        ]);

        // Menangani input checkbox is_selected
        $isSelected = $request->has('is_selected') ? true : false;

        // Jika is_selected dicentang, set alamat lainnya menjadi tidak utama
        if ($isSelected) {
            Address::where('user_id', auth()->id())->update(['is_selected' => 0]);
        }

        // Memperbarui alamat yang ada
        $address->update([
            'name' => $validated['name'],
            'address' => $validated['address'],
            'provinces_id' => $validated['provinces_id'],
            'regencies_id' => $validated['regencies_id'],
            'zip_code' => $validated['zip_code'],
            'country' => $validated['country'],
            'phone_number' => $validated['phone_number'],
            'is_selected' => $isSelected, // Menyimpan nilai boolean
        ]);

        return redirect()->route('account-address')->with('success', 'Alamat berhasil diubah!');
    }

    public function destroy($id)
    {
        $address = Address::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        if ($address->delete()) {
            return redirect()->route('account-address')->with('success', 'Alamat berhasil dihapus');
        }

        return redirect()->route('account-address')->withErrors('Gagal menghapus alamat');
    }
}
