@extends('blademaster.blademaster')
@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class=" card p-3  w-50  bg-info ">
        <h2 class="text-center">Register</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('register.user') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>  
            <div class="mb-3">
                <label for="userRole" class="form-label">Role</label>
                <select class="form-select" id="userRole">
                  <option selected>Pilih Role</option>
                  <option value="admin">Super Admin</option>
                  <option value="user">User</option>
                </select>
              </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age" value="{{ old('age') }}">
            </div>
            <div class="mb-3">
                <label for="birth" class="form-label">Birth Date</label>
                <input type="date" class="form-control" id="birth" name="birth" value="{{ old('birth') }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address">{{ old('address') }}</textarea>
            </div>
            <div class=" text-center">
                <button type="submit" class="btn btn-primary w-25">Register</button>
            </div>
            
        </form>
    </div>
    
</div>
@endsection