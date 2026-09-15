@extends('layouts.app')

@section('title', 'Edit Mahasiswa')

@section('content')
<div class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Edit Data Mahasiswa</h2>
        <a href="{{ route('students.index') }}" class="text-gray-500 hover:underline text-sm">&larr; Kembali</a>
    </div>

    <!-- Menampilkan Error Validasi jika ada -->
    @if ($errors->any())
    <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-3 rounded text-sm">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('students.update', $student->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Nomor Induk Mahasiswa (NIM)</label>
            <input type="text" name="nim" value="{{ old('nim', $student->nim) }}" class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ old('nama', $student->nama) }}" class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Jurusan</label>
            <input type="text" name="jurusan" value="{{ old('jurusan', $student->jurusan) }}" class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Angkatan</label>
            <input type="number" name="angkatan" value="{{ old('angkatan', $student->angkatan) }}" class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 rounded transition shadow mt-4">
            Perbarui Data Mahasiswa
        </button>
    </form>
</div>
@endsection