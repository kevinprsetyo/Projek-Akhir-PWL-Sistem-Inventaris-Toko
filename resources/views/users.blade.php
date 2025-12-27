@extends('layouts.main')
@section('title','Data Pengguna | Sistem Inventaris')
@section('content')
  
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna Sistem</h6>
            <a href="users/userForm" class="btn btn-primary btn-sm shadow-sm">
                <i class="bi bi-person-plus-fill mr-1"></i> Tambah User
            </a>
        </div>
        <div class="card-body">
            @if(session('alert'))
            <div class="alert alert-warning alert-dismissible fade show shadow-sm" role="alert">
                <strong>{{session('alert')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            
            <div class="table-responsive">
                <table id="example" class="table table-hover table-bordered" style="width:100%;">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center" width="5%">No</th>
                            <th>Nama Lengkap</th>
                            <th>Email Address</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center" width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $idx => $u)
                        <tr>
                            <td class="text-center align-middle font-weight-bold">{{$idx+1}}</td>
                            <td class="align-middle font-weight-bold">{{$u->name}}</td>
                            <td class="align-middle">{{$u->email}}</td>
                            <td class="text-center align-middle">
                                @if($u->foto)
                                <img src="{{ asset('storage/' . $u->foto) }}" width="50" height="50" alt="{{ $u->name }}" class="rounded-circle border" style="object-fit: cover;">
                                @else
                                <img src="/storage/poster/noimage.jpg" alt="No Image" width="50" height="50" class="rounded-circle border" style="object-fit: cover;">
                                @endif
                            </td>
                            <td class="text-center align-middle">
                                <a href="users/deleteUsers/{{ $u->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')" data-toggle="tooltip" title="Hapus User">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection