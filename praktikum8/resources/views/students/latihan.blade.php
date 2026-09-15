@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Query Relationship</h2>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">Kembali</a>
</div>

<div class="card mb-4">
    <div class="card-header bg-dark text-white">
        Semua Mahasiswa beserta Jurusan, Matkul, dan Total SKS
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <th>Mata Kuliah</th>
                        <th>Total SKS (Soal 4)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{ $student->nim }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->major->name }}</td>
                        <td>
                            @foreach($student->subjects as $subject)
                                <span class="badge bg-secondary me-1">{{ $subject->name }}</span>
                            @endforeach
                        </td>
                        <td><strong>{{ $student->subjects->sum('sks') }} SKS</strong></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header bg-success text-white">
            Jurusan dengan Mahasiswa Terbanyak
            </div>
            <div class="card-body">
                @if($mostPopularMajor)
                    <div class="alert alert-success text-center py-3">
                        <h5>Jurusan Terbanyak:</h5>
                        <h4 class="alert-heading">{{ $mostPopularMajor->name }}</h4>
                        <span class="badge bg-dark">{{ $mostPopularMajor->students_count }} Mahasiswa</span>
                    </div>
                @endif

                <h6 class="mt-3">Daftar Mahasiswa Per Jurusan:</h6>
                <ul class="list-group">
                    @foreach($majorsWithCount as $m)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $m->name }}
                            <span class="badge bg-primary rounded-pill">{{ $m->students_count }} Mhs</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header bg-info text-dark">
            Mata Kuliah oleh Mahasiswa Tertentu
            </div>
            <div class="card-body">
                @if($selectedStudent)
                    <div class="alert alert-info">
                        <strong>Sampel Mahasiswa:</strong> {{ $selectedStudent->name }} ({{ $selectedStudent->nim }})
                    </div>

                    <h6>Mata Kuliah Yang Diambil:</h6>
                    <ul class="list-group">
                        @forelse($studentSubjects as $s)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $s->name }}
                                <span class="badge bg-secondary">{{ $s->sks }} SKS</span>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted">Belum mengambil matkul.</li>
                        @endforelse
                    </ul>
                @else
                    <p class="text-center text-muted py-4">Data mahasiswa tidak ditemukan.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection