@extends('layouts.app')

@section("judul") Daftar User @endsection

@section('konten')
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif

<div class="card shadow mb-4">
<div class="card-header py-3">
<a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>No</th>
<th>Nama</th>
<th>Username</th>
<th>Email</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach ($user as $key => $row)
<tr>
<td>{{ $key+1 }}</td>
<td>{{ $row->name }}</td>
<td>{{ $row->username ?? strstr($row->email, '@', true) }}</td>
<td>{{ $row->email }}</td>
<td>
<form action="{{ route('user.destroy', $row->id) }}" method="POST">
<a href="{{ route('user.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger btn-sm">Hapus</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
@endsection