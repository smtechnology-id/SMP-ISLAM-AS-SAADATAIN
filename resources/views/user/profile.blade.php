@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="app-content">
                    <div class="content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <div class="page-description page-description-tabbed">
                                        <h1 class="mb-4">Settings</h1> <!-- Menambahkan margin bawah -->
    
                                        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                            
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="security-tab" data-bs-toggle="tab" data-bs-target="#security" type="button" role="tab" aria-controls="security" aria-selected="false">Security</button>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="tab-content" id="myTabContent">

                                        <div class="tab-pane fade show active" id="security" role="tabpanel" aria-labelledby="security-tab">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="settings-security-two-factor">
                                                        <h5 class="mb-4">Change Password</h5> <!-- Menambahkan margin bawah -->
                                                        <form action="{{ route('user.profile.update') }}" method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="name">Name</label>
                                                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ Auth::user()->name }}">
                                                                @error('name')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ Auth::user()->email }}">
                                                                @error('email')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="new_password">New Password</label>
                                                                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password">
                                                                @error('new_password')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label for="confirm_password">Confirm Password</label>
                                                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </form>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection