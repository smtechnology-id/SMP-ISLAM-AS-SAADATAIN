@extends('layouts.app')

@section('title', 'Data Account')
@section('active_account', 'active-page')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Data Account</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="datatable1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#gantiPassword{{ $user->id }}">
                                                ganti password
                                              </button>
                                              
                                              <!-- Modal -->
                                              <div class="modal fade" id="gantiPassword{{ $user->id }}" tabindex="-1" aria-labelledby="gantiPasswordLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="gantiPasswordLabel">Ganti Password</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('admin.account.ganti_password', $user->id) }}" method="post" >
                                                            @csrf
                                                            <div class="mb-3">
                                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                                <label for="password" class="form-label">Password</label>
                                                                <input type="password" class="form-control" id="password" name="password" required>
                                                                @error('password')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                                                @error('password_confirmation')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Ganti Password</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection