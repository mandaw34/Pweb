@extends('layouts.app')
@section('content')
<h2>Tambah Mahasiswa</h2>
<div class="card">
<div class="card-body">
<form action="{{ route('students.store') }}" method="POST">
@csrf
<div class="mb-3">
<label for="nim" class="form-label">NIM</label>
<input type="text" class="form-control @error('nim') is-invalid @enderror"
id="nim" name="nim" value="{{ old('nim') }}">
@error('nim')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
<label for="name" class="form-label">Nama</label>
<input type="text" class="form-control @error('name') is-invalid @enderror"
id="name" name="name" value="{{ old('name') }}">
@error('name')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
<label for="address" class="form-label">Alamat</label>
<textarea class="form-control @error('address') is-invalid @enderror"
id="address" name="address" rows="3">{{ old('address') }}</textarea>
@error('address')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
<label for="major_id" class="form-label">Jurusan</label>
<select class="form-control @error('major_id') is-invalid @enderror"
id="major_id" name="major_id">
<option value=
"">Pilih Jurusan</option>
@foreach($majors as $major)
<option value="{{ $major->id }}" {{ old('major_id') == $major->id ?
'selected' : '' }}>
{{ $major->name }}
</option>
@endforeach
</select>
@error('major_id')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
<label class="form-label">Mata Kuliah</label>
@error('subjects')
<div class="text-danger">{{ $message }}</div>

@enderror
@foreach($subjects as $subject)
<div class="form-check">
<input class="form-check-input" type="checkbox" name="subjects[]"
value="{{ $subject->id }}" id="subject{{ $subject->id }}"
{{ in_array($subject->id, old('subjects', [])) ? 'checked' : ''
}}>
<label class="form-check-label" for="subject{{ $subject->id }}">
{{ $subject->name }} ({{ $subject->sks }} SKS)
</label>
</div>
@endforeach
</div>
<button type="submit" class="btn btn-primary">Simpan</button>
<a href="{{ route('students.index') }}" class="btn btn-secondary">Kembali</a>
</form>
</div>
</div>
@endsection