@extends('layouts/app')

@section('content')
    <div class="container d-flex flex-column bg-light">
        <div>
            <h1 class="mb-5">Edit income</h1>
        </div>
        <div class="d-flex justify-content-center">
          <div class="mb-3 w-25 d-flex flex-column">
              <label for="name" class="form-label">Created by</label>
              <span>{{ $income->created_by }}</span>
          </div>
          <div class="mb-3 w-25 d-flex flex-column">
              <label for="name" class="form-label">Created date</label>
              <span>{{ date('d M Y', strtotime($income->created_at)) }}</span>
          </div>
          <div class="mb-3 w-25 d-flex flex-column">
              <label for="name" class="form-label">Last Updated By</label>
              <span>{{ $income->updated_by }}</span>
          </div>
          <div class="mb-3 w-25 d-flex flex-column">
              <label for="name" class="form-label">Last Updated Date</label>
              <span>{{ date('d M Y', strtotime($income->updated_at)) }}</span>
          </div>
      </div>
        <div>
            <form method="POST" action="/income/{{ $income->id }}" autocomplete="off">
                @csrf
                @method('PUT')
                <div class="mb-3 w-25">
                    <label for="transaction_name" class="form-label">Transaction Name</label>
                    <input type="text" name="transaction_name" class="form-control" id="transaction_name" value="{{ $income->transaction_name }}">
                    @error('transaction_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 w-25">
                  <label for="transaction_source_id" class="form-label">Source</label>
                  <select name="transaction_source_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
                    @foreach ($sources as $source)
                      <option value={{ $source->id }}>{{ $source->transaction_source_name }}</option>  
                    @endforeach
                  </select>
                  @error('transaction_source_id')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3 w-25">
                  <label for="date" class="form-label">Date</label>
                  <input type="date" name="date" class="form-control" id="date" value="{{ $income->date }}">
                  @error('date')
                      <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3 w-25">
                    <label for="total" class="form-label">Total</label>
                    <input type="text" name="total" class="form-control" id="total" value="{{ $income->total }}">
                    @error('total')
                        <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                    <a href="/income"><button type="button" class="btn btn-outline-danger mx-2">Cancel</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection