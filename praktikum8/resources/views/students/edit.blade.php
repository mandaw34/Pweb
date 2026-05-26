@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Edit Data Mahasiswa</h2>
            <a href="{{ route('students.index') }}" class="btn btn-outline-secondary btn-sm">&larr; Kembali</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('students.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nim" class="form-label fw-bold">NIM</label>
                        <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ old('nim', $student->nim) }}" required>
                        @error('nim')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $student->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label fw-bold">Alamat</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3" required>{{ old('address', $student->address) }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="major_id" class="form-label fw-bold">Jurusan</label>
                        <select class="form-select @error('major_id') is-invalid @enderror" id="major_id" name="major_id" required>
                            <option value="">Pilih Jurusan</option>
                            @foreach($majors as $major)
                                <option value="{{ $major->id }}" {{ old('major_id', $student->major_id) == $major->id ? 'selected' : '' }}>
                                    {{ $major->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('major_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold d-block">Mata Kuliah</label>
                        @error('subjects')
                            <div class="text-danger mb-2 small">{{ $message }}</div>
                        @enderror
                        <div class="row">
                            @php
                                $selectedSubjects = old('subjects', $student->subjects->pluck('id')->toArray());
                            @endphp
                            @foreach($subjects as $subject)
                                <div class="col-md-6 mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="subjects[]" value="{{ $subject->id }}" id="subject{{ $subject->id }}" {{ in_array($subject->id, $selectedSubjects) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="subject{{ $subject->id }}">
                                            {{ $subject->name }} <span class="text-muted">({{ $subject->sks }} SKS)</span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                        <button type="submit" class="btn btn-warning px-4 text-white font-weight-bold">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection