@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Daftar Mahasiswa Aktif</h2>
        <a href="{{ route('students.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow transition duration-200">
            + Tambah Mahasiswa
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead>
                <tr class="bg-gray-100 border-b border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                    <th class="px-6 py-3">NIM</th>
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">Jurusan</th>
                    <th class="px-6 py-3">Angkatan</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($students as $student)
                <tr class="hover:bg-gray-50 text-sm text-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $student->nim }}</td>
                    <td class="px-6 py-4">{{ $student->nama }}</td>
                    <td class="px-6 py-4">{{ $student->jurusan }}</td>
                    <td class="px-6 py-4">{{ $student->angkatan }}</td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center space-x-2">
                            <!-- Tombol Edit -->
                            <a href="{{ route('students.edit', $student->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white text-xs px-3 py-1.5 rounded transition">
                                Edit
                            </a>
                            <!-- Tombol Hapus -->
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-1.5 rounded transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                        Belum ada data mahasiswa. Silakan tambahkan data baru.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection