<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Tampilkan daftar mahasiswa.
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    /**
     * Tampilkan formulir tambah mahasiswa.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Simpan data mahasiswa baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:students,nim|max:15',
            'nama' => 'required|max:100',
            'jurusan' => 'required|max:100',
            'angkatan' => 'required|integer',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index');
    }

    /**
     * Tampilkan detail data mahasiswa (Opsional).
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    /**
     * Tampilkan formulir edit mahasiswa.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    /**
     * Update data mahasiswa yang diubah.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nim' => 'required|max:15|unique:students,nim,' . $id,
            'nama' => 'required|max:100',
            'jurusan' => 'required|max:100',
            'angkatan' => 'required|integer',
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()->route('students.index');
    }

    /**
     * Hapus data mahasiswa dari database.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index');
    }
}