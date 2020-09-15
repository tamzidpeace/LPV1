<!DOCTYPE html>
<html lang="en">

<head>
    {{-- style --}}
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/custom.css">

    {{-- style end --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ajax</title>
</head>

<body>


    {{-- table --}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Data Table</h2>
                <input type="hidden" name="" value="">
                <div class="card">
                    <div class="card-header">
                        <div class="text-right">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                data-target="#addCustomer">
                                Add Customer
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="showAllDataHere">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th>Manage</th>
                                </tr>

                            </thead>
                            <tbody id="customer-tbody">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($customers as $item)
                                <tr>
                                    <td scope="row">{{ $i++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->email }}</td>

                                    <td>
                                        <a data-toggle="modal" data-target="#show-customer" onclick="view({{ $item->id }})"  id="view"
                                         class="btn btn-outline-primary" href="">View</a>
                                        <a data-toggle="modal" data-target="#editCustomer" onclick="edit({{ $item->id }})"
                                        class="btn btn-outline-warning" href="">Edit</a>
                                        <a onclick="destroy({{ $item->id }})" class="btn btn-outline-danger" href="">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $customers->links() }}
                    </div>                    
                </div>

            </div>
        </div>
    </div>

    {{-- end table --}}
    {{-- modal --}}
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="addCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('add-customer') }}" method="POST" id="customer-form">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" class="form-control" name="phone" id="phone"
                                placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    {{-- end modal --}}

    {{-- edit modal --}}
    <div class="modal fade" id="editCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('customer.edit') }}" method="POST" id="customer-edit-form">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="edit-name" placeholder="Enter Name">
                        </div>
                        <input type="hidden" name="id" id="edit-id">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" class="form-control" name="phone" id="edit-phone"
                                placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="edit-email"
                                placeholder="Enter Email">
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    {{-- end edit modal --}}

    {{-- modal view --}}

    <div class="modal" tabindex="-1" id="show-customer" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Customer Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="cus-name"></p>
                    <p id="cus-phone"></p>
                    <p id="cus-email"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- {{ $customers->link }} --}}
    {{-- end modal view --}}


    {{-- script --}}
    <script src="js/app.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="js/custom.js"></script>
    {{-- end script --}}
</body>

</html>