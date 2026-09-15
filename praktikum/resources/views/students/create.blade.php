@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
<div class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Tambah Mahasiswa Baru</h2>
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

    <form action="{{ route('students.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Nomor Induk Mahasiswa (NIM)</label>
            <input type="text" name="nim" value="{{ old('nim') }}" class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Contoh: 220101001" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Contoh: dvnmanda" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Jurusan</label>
            <input type="text" name="jurusan" value="{{ old('jurusan') }}" class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Contoh: Informatika" required>
        </div>

        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Angkatan</label>
            <input type="number" name="angkatan" value="{{ old('angkatan', 2026) }}" class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded transition shadow mt-4">
            Simpan Data Mahasiswa
        </button>
    </form>
</div>
@endsection