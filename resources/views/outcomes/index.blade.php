@extends('layouts/app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-around mb-5">
            <form class="d-flex mb-10" action="/outcome">
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success me-2" type="submit">Search</button>
                <a href="/outcome"><button class="btn btn-outline-warning" type="submit">Reset</button></a>
            </form>
            <a href="/outcome/create"><button type="button" class="btn btn-outline-secondary">Create</button></a> 
        </div>
        @if (count($outcomes) < 1)
            <div class="d-flex justify-content-center align-items-center">
                <h2>There is no data!</h2>
            </div>
        @else
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
                    @foreach ($outcomes as $outcome)
                        <tr>
                            <th scope="row">{{ $outcomes->firstItem() + $loop->index }}</th>
                            <td>{{ $outcome->transaction_name }}</td>
                            <td>{{ $outcome->transaction_sources->transaction_source_name }}</td>
                            <td>{{ date('d M Y', strtotime($outcome->date)) }}</td>    
                            <td>{{ number_format($outcome->total , 0, ',', '.') }}</td>
                            <td class="d-flex">
                                <a class="me-2" href="/outcome/{{ $outcome->id }}/edit"><button type="button" class="btn btn-outline-success">Edit</button></a> 
                                <form action="/outcome/{{ $outcome->id }}" method="POST">
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
                {!! $outcomes->appends(['sort' => 'name'])->links() !!}
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
                title: "Are you sure you want to delete this outcome?",
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