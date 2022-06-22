@extends('layouts/app')

@section('content')
    <div class="container d-flex flex-column bg-light">
        <div>
            <h1 class="mb-5">Add new employee</h1>
        </div>
        <div>
            <form method="POST" action="/employee">
                @csrf
                <div class="mb-3 w-25">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 w-25">
                    <label for="email" class="form-label">Email address</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 w-25">
                    <label for="age" class="form-label">Age</label>
                    <input type="text" name="age" class="form-control" id="age" value="{{ old('age') }}">
                    @error('age')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 w-25">
                    <label for="gender" class="form-label">Gender</label>
                    <input type="text" name="gender" class="form-control" id="gender" value="{{ old('gender') }}">
                    @error('gender')
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
                <div class="mb-3 w-25">
                  <label for="position" class="form-label">Position</label>
                  <input type="text" name="position" class="form-control" id="position" value="{{ old('position') }}">
                  @error('position')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3 w-25">
                  <label for="address" class="form-label">Address</label>
                  <textarea rows="4" cols="50" name="address" class="form-control" id="address" value="{{ old('address') }}">
                  </textarea>
                  @error('address')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/admin"><button type="button" class="btn btn-primary mx-2">Cancel</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection