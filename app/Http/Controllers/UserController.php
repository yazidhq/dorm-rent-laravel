<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            return view('admin.user.index', [
                'user' => User::get()
            ]);
        }
        return redirect()->route('home');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (auth()->user()->role == 'admin') {
            $admin = User::findOrFail($id);
            return view('admin.profile.index', compact('admin'));
        }
        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (auth()->user()->role == 'admin') {
            $data = $this->validate($request, [
                'role'     => 'required',
                'name'   => 'required',
                'email'   => 'required',
                'jekel'   => '',
                'alamat'   => '',
                'number'   => 'required',
                'pekerjaan'   => '',
                'status'   => 'required',
                'password'   => 'required',
            ]);

            $data['password'] = Hash::make($data['password']);
            User::where('id', $id)->update($data);

            return redirect()->route('user.index')->with(['success' => 'Berhasil merubah data User']);
        }
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->role == 'admin') {
            User::where('id', $id)->firstOrFail()->delete();
            return redirect()->route('user.index')->with(['success' => 'Berhasil menghapus data user']);
        }
        return redirect()->route('home');
    }

    public function passwordAdmin(Request $request)
    {
        if (auth()->user()->role == 'admin') {
            $data = $this->validate($request, [
                'password' => 'required|min:8|confirmed',
            ]);

            User::where('id', auth()->user()->id)->update([
                'password' => Hash::make($data['password']),
            ]);

            return redirect()->back()->with(['success' => 'Berhasil merubah password']);
        }

        return redirect()->route('home');
    }
}
