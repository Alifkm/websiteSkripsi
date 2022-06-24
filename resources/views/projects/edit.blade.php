@extends('layouts/app')

@section('content')
    <div class="container d-flex flex-column bg-light">
        <div>
            <h1 class="mb-5">Edit Project</h1>
        </div>
        <div>
            <form method="POST" action="/project/{{ $project->id }}">
                @csrf
                @method('PUT')
                <div class="mb-3 w-25">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $project->name }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 w-25">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" name="start_date" class="form-control" id="start_date" value="{{ $project->start_date }}">
                    @error('start_date')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 w-25">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" name="end_date" class="form-control" id="end_date" value="{{ $project->end_date }}">
                    @error('end_date')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 w-25">
                    <label for="client_name" class="form-label">client_name</label>
                    <input type="text" name="client_name" class="form-control" id="client_name" value="{{ $project->client_name }}">
                    @error('client_name')
                        <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>
                <div class="mb-3 w-25">
                  <label for="location" class="form-label">Location</label>
                  <input type="text" name="location" class="form-control" id="location" value="{{ $project->location }}">
                  @error('location')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3 w-25">
                  <label for="price" class="form-label">Price</label>
                  <input type="text" name="price" class="form-control" id="price" value="{{ $project->price }}">
                  @error('price')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3 w-25">
                  <label for="status" class="form-label">Status</label> <br>
                    <input type="radio" id="status" name="status" value="active" {{ ($project->status=="active") ? "checked" : "" }}>
                    <label for="status">active</label><br>
                    <input type="radio" id="status" name="status" value="inactive" {{ ($project->status=="inactive") ? "checked" : "" }}>
                    <label for="status">inactive</label><br>
                  
                  {{-- <input type="text" name="status" class="form-control" id="status" value="{{ old('status') }}"> --}}
                  @error('status')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3 w-25">
                  <label for="description" class="form-label">Description</label>
                  <textarea type="text" class="form-control" name="description" class="form-control" id="description">
                    {{ $project->description }}
                  </textarea>
                  @error('description')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                    <a href="/project"><button type="button" class="btn btn-outline-secondary mx-2">Cancel</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection