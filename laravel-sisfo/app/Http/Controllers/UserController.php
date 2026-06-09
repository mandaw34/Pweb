<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $user = \App\Models\User::all();
    return view('user.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $user = new \App\Models\User;

    // JALUR AMAN: Cek $request->name dulu, kalau null baru ambil $request->nama
    $user->name = $request->name ?? $request->nama;
    
    $user->username = $request->username;
    $user->email = $request->email;
    $user->password = \Hash::make($request->password);

    if ($request->level) {
        $user->level = implode(',', $request->level);
    } else {
        $user->level = 'STAFF';
    }

    $user->save();

    return redirect()->route('user.index')->with('status', 'User baru berhasil ditambahkan');
}
            

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\Models\User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\Illuminate\Http\Request $request, $id)
{
    $user = \App\Models\User::findOrFail($id);

    $user->name = $request->name ?? $request->nama;
    $user->username = $request->username;
    $user->email = $request->email;

    if ($request->level) {
        $user->level = implode(',', $request->level);
    }
    
    if ($request->password) {
        $user->password = \Hash::make($request->password);
    }
    
    $user->save(); 

    return redirect()->route('user.index')->with('status', 'User berhasil diperbarui');
}

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\Models\User::findOrFail($id);
$user->delete();
return redirect()->route('users.index')->with('status', 'User
berhasil dihapus');
    }
}
