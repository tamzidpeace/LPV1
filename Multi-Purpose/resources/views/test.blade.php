<!DOCTYPE html>
<html>

<head>
    <title>Product</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
    <!-- Styles -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

    <div class="container">

        <a style="margin: 10px -12px;" href="#" class="btn btn-primary" id="addNew">Add New Product</a>

        {{-- form --}}

        <div class="animated rubberBand product-form" id="p-form">
            <div class="addheader" id="close-form"> <strong><a style="margin: 0px 0px" href="">Close x</a></strong>
            </div>
            <div class="addcontent" style="margin: 0px -56px;">

                <form action="/t1/product-save" method="post" id="data-form" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <label class="product" for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="name">Product Price</label>
                        <input type="number" class="form-control" id="price" name="price">
                    </div>

                    <button type="submit" class="btn btn-primary delete">Save</button>

                </form>
            </div>
        </div>

        {{-- form end --}}

        <div class="row">
            <br>
            <h2>Product info</h2>

            <table class="table">
                <thead class="thead-dark">
                    <input type="hidden" name="url" id="getDataUrl" value="{{ url('all-data') }}">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Proudct Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="showAllData">
                    {{-- @foreach ($products as $product)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="/t1/delete/{{ $product->id }}" class="btn btn-info"
                                onclick="return deleteFun()">Delete</a>
                        </td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function deleteFun() {
            if(!confirm("Are You Sure to delete this"))
            event.preventDefault();
        }
    </script>
    {{-- end of the table --}}   
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/test.js') }}"></script>

</body>

</html>