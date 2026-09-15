@extends('layouts.app')

@section("judul") Create User @endsection

@section('konten')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-9">
                <form method="POST" action="{{ route('user.store') }}">
                    @csrf
                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-center">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama" name="name">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-center">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-center">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-center">Password</label>
                        <div class="col-sm-2">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-center">Level</label>
                        <div class="col-sm-4 mr-2">
                            <select class="form-control select2-multiple" name="level[]" multiple="multiple">
                                <option value="ADMIN">ADMIN</option>
                                <option value="GURU">GURU</option>
                                <option value="STAFF">STAFF</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-10 text-center">
                            <button type="reset" class="btn btn-warning btn-sm">Batal</button>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection