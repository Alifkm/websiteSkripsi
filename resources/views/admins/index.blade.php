@extends('layouts/app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-around mb-5">
            <form class="d-flex mb-10" action="/admin/">
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search" value="{{ old('search') }}">
                <button class="btn btn-outline-success me-2" type="submit">Search</button>
                <a href="/admin/"><button class="btn btn-outline-warning" type="submit">Reset</button></a>
            </form>
            @can('thisIsSuperAdmin')
                <a href="/admin/create/"><button type="button" class="btn btn-outline-secondary">Create</button></a> 
            @endcan 
        </div>
        @if (count($admins) < 1)
            <div class="d-flex justify-content-center align-items-center">
                <h2>There is no data!</h2>
            </div>
        @else
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    @can('thisIsSuperAdmin')
                        <th scope="col">Action</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                    @php
                    $count = 1; 
                    @endphp
                    @foreach ($admins as $admin)
                        <tr>
                            <th scope="row">{{ $admins->firstItem() + $loop->index }}</th>
                            <td id="adminName">{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->phone }}</td>
                            @can('thisIsSuperAdmin') 
                            <td class="d-flex">
                                    <a class="me-2" href="/admin/{{ $admin->id }}/edit"><button type="button" class="btn btn-outline-success">Edit</button></a> 
                                    <form action="/admin/{{ $admin->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger show-alert-delete-box">Delete</button>
                                    </form>
                            </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table> 
            
            <div class="d-flex justify-content-center">
                {!! $admins->appends(['sort' => 'name'])->links() !!}
            </div>
                
        @endif
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event){
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Are you sure you want to delete this admin?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel","Yes!"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
@endsection