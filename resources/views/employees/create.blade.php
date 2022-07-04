@extends('layouts/app')

@section('content')
    <div class="container d-flex flex-column bg-light">
        <div>
            <h1 class="mb-5">Add new employee</h1>
        </div>
        <div>
            <form method="POST" action="/employee" autocomplete="off">
                @csrf
                <div class="row w-100 d-flex justify-content-between mb-3">
                    <div class="mb-3 col-md-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" name="age" class="form-control" id="age" value="{{ old('age') }}">
                        @error('age')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row w-100 d-flex justify-content-between mb-3">
                    <div class="mb-3 col-md-3">
                        <label for="gender" class="form-label">Gender</label> <br>
                        <input type="radio" id="gender" name="gender" value="male"  {{ old('gender') == "male" ? 'checked' : '' }}>
                        <label for="gender">male</label><br>
                        <input type="radio" id="gender" name="gender" value="female" {{ old('gender') == "female" ? 'checked' : '' }}>
                        <label for="gender">female</label><br>
                        @error('gender')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    <div class="mb-3 col-md-3">
                      <label for="phone" class="form-label">Phone</label>
                      <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
                      @error('phone')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="position" class="form-label">Position</label>
                        <select name="position" aria-placeholder="select position" type="text" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option value="" disabled selected>select position</option>
                            @foreach ($positions as $position)
                                <option value={{ $position->id }}>{{ $position->position_name }}</option>  
                            @endforeach
                        </select>
                        @error('position')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row w-100 d-flex justify-content-between mb-3">
                    <div class="mb-3 col-md-12">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" class="form-control" id="address">
                            {{ old('address') }}
                        </textarea>
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="d-flex">
                    <button type="submit" class="btn btn btn-outline-primary">Submit</button>
                    <a href="/employee"><button type="button" class="btn btn btn-outline-danger mx-2">Cancel</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection