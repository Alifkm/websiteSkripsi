@extends('layouts/app')

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-around">
            <form class="d-flex mb-10" action="/income">
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success me-2" type="submit">Search</button>
                <a href="/project"><button class="btn btn-outline-warning" type="submit">Reset</button></a>
            </form>
            <a href="/project/create"><button type="button" class="btn btn-outline-secondary">Create</button></a> 
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Source</th>
                <th scope="col">Date</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($incomes as $income)
                    <tr>
                        <th scope="row">{{ $incomes->firstItem() + $loop->index }}</th>
                        <td>{{ $income->transaction_name }}</td>
                        <td>{{ $income->transaction_sources->transaction_source_name }}</td>
                        <td>{{ $income->date }}</td>    
                        <td>{{ $income->total }}</td>
                        <td class="d-flex">
                            <a class="me-2" href="/income/{{ $income->id }}/edit"><button type="button" class="btn btn-outline-success">Edit</button></a> 
                            <form action="/income/{{ $income->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger show-alert-delete-box">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> 
        
        <div class="d-flex justify-content-center">
            {!! $incomes->appends(['sort' => 'name'])->links() !!}
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event){
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Are you sure you want to delete this income?",
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