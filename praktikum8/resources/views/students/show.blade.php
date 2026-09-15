@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-dark">Detail KRS Mahasiswa</h2>
            <a href="{{ route('students.index') }}" class="btn btn-outline-secondary btn-sm">&larr; Kembali</a>
        </div>

        <!-- Kartu Informasi Profil Mahasiswa -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white font-weight-bold">
                Kartu Rencana Studi (KRS) Resmi
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th width="30%">NIM</th>
                        <td width="3%">:</td>
                        <td><strong>{{ $student->nim }}</strong></td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>:</td>
                        <td>{{ $student->name }}</td>
                    </tr>
                    <tr>
                        <th>Jurusan</th>
                        <td>:</td>
                        <td><span class="badge bg-info text-dark">{{ $student->major->name }}</span></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>:</td>
                        <td>{{ $student->address }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Daftar Mata Kuliah yang Diambil (Pivot Table Many-to-Many) -->
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white font-weight-bold">
                Daftar Mata Kuliah Terpilih
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @forelse($student->subjects as $subject)
                        <li class="list-group-item d-flex justify-content-between align-items-center px-4 py-3">
                            <div>
                                <span class="fw-bold d-block">{{ $subject->name }}</span>
                                <small class="text-muted">Mata Kuliah Pilihan</small>
                            </div>
                            <span class="badge bg-primary rounded-pill">{{ $subject->sks }} SKS</span>
                        </li>
                    @empty
                        <li class="list-group-item text-muted text-center py-4">
                            Belum ada mata kuliah yang diambil untuk semester ini.
                        </li>
                    @endforelse
                    
                    <!-- Perhitungan Total SKS secara Dinamis -->
                    <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-secondary px-4 py-3 fw-bold">
                        Total SKS Terdaftar
                        <span class="badge bg-dark rounded-pill fs-6">{{ $student->subjects->sum('sks') }} SKS</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection