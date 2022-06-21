@extends('layouts/app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-around">
            <form class="d-flex mb-10" action="/admin/">
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <a href="admin/create"><button type="button" class="btn btn-outline-secondary">Create</button></a> 
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @php
                 $count = 1; 
                @endphp
                @foreach ($admins as $admin)
                    <tr>
                        <th scope="row">{{ $count++ }}</th>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td><a href="admin/show"><button type="button" class="btn btn-outline-success">Edit</button></a> <a href="admin/delete"><button type="button" class="btn btn-outline-danger">Delete</button></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table> 
        
        <div class="d-flex justify-content-center">
            {!! $admins->links() !!}
        </div>
    </div>
@endsection