@extends('layouts/app')

@section('content')
    <div class="container d-flex flex-column bg-light">
        <div>
            <h1 class="mb-5">Edit employee</h1>
        </div>
        <div>
            <form method="POST" action="/employee/{{ $employee->id }}">
                @csrf
                @method('PUT')
                <div class="mb-3 w-25">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $employee->name }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 w-25">
                    <label for="email" class="form-label">Email address</label>
                    <input type="text" name="email" class="form-control" id="email" value="{{ $employee->email }}">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 w-25">
                    <label for="age" class="form-label">Age</label>
                    <input type="text" name="age" class="form-control" id="age" value="{{ $employee->age }}">
                    @error('age')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 w-25">
                    <label for="gender" class="form-label">Gender</label>
                    <input type="text" name="gender" class="form-control" id="gender" value="{{ $employee->gender }}">
                    @error('gender')
                        <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>
                <div class="mb-3 w-25">
                  <label for="phone" class="form-label">Phone</label>
                  <input type="text" name="phone" class="form-control" id="phone" value="{{ $employee->phone }}">
                  @error('phone')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3 w-25">
                  <label for="position" class="form-label">Position</label>
                  <input type="text" name="position" class="form-control" id="position" value="{{ $employee->position }}">
                  @error('position')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3 w-25">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" name="address" class="form-control" id="address" value="{{ $employee->address }}">
                  @error('address')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/employee"><button type="button" class="btn btn-primary mx-2">Cancel</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection