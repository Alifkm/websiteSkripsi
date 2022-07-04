@extends('layouts/app')

@section('content')
    <div class="container d-flex flex-column bg-light">
        <div>
            <h1 class="mb-5">Change password</h1>
        </div>
        <div>
            <form method="POST" action="/change-password" autocomplete="off">
                @csrf
                <div class="mb-3 w-25">
                    <label for="current_password" class="form-label">Current Password</label>
                    <input type="password" data-toggle="password"
                    data-eye-class="material-icons"
                    data-eye-open-class="visibility"
                    data-eye-close-class="visibility_off"
                    data-eye-class-position-inside="true" name="current_password" class="form-control @error('current_password') is-invalid @enderror" id="current_password">
                    @error('current_password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 w-25">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" data-toggle="password"
                    data-eye-class="material-icons"
                    data-eye-open-class="visibility"
                    data-eye-close-class="visibility_off"
                    data-eye-class-position-inside="true" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password">
                    @error('new_password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 w-25">
                    <label for="new_password_confirmation" class="form-label">Password Confirmation</label>
                    <input type="password" data-toggle="password"
                    data-eye-class="material-icons"
                    data-eye-open-class="visibility"
                    data-eye-close-class="visibility_off"
                    data-eye-class-position-inside="true" name="new_password_confirmation" class="form-control @error('new_password_confirmation') is-invalid @enderror" id="new_password_confirmation">
                    @error('new_password_confirmation')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                    <a href="/change-password"><button type="button" class="btn btn-outline-danger mx-2">Cancel</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection