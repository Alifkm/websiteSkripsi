@extends('layouts/app')

@section('content')
    <div class="container d-flex flex-column bg-light">
        <div>
            <h1 class="mb-5">Edit admin</h1>
        </div>
        <div>
            <form method="POST" action="/admin/{{ $admin->id }}" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="mb-3 w-25">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $admin->name }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 w-25">
                    <label for="email" class="form-label">Email address</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{ $admin->email }}">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 w-25">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" data-toggle="password"
                    data-eye-class="material-icons"
                    data-eye-open-class="visibility"
                    data-eye-close-class="visibility_off"
                    data-eye-class-position-inside="true" name="password" class="form-control" id="password" value="{{ $admin->password }}">
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 w-25">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" data-toggle="password"
                    data-eye-class="material-icons"
                    data-eye-open-class="visibility"
                    data-eye-close-class="visibility_off"
                    data-eye-class-position-inside="true" name="confirmPassword" class="form-control" id="confirmPassword" value="{{ $admin->password }}">
                    @error('confirmPassword')
                        <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>
                <div class="mb-3 w-25">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                    <a href="/admin"><button type="button" class="btn btn-outline-danger mx-2">Cancel</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection