<!DOCTYPE html>
<html>

<head>
    <title>Product</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            margin: 0;
            padding: 10px;
            line-height: 20px;
        }

        table {
            margin-left: 45px;
        }

        td {
            border: 1px solid #eee;
            padding: 3px;
            text-align: center;
        }

        code {
            color: #007b00;
        }

        a {
            color: red;
        }

        .red {
            color: #E91E63;
        }
    </style>
</head>

<body>

    <form action="{{route('product.save')}}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="name">Product Price</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>


        <button type="submit" class="btn btn-primary delete">Save</button>


    </form>



    <h2>Product info</h2>

    <div class="row">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Proudct Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="/t1/delete/{{ $product->id }}" class="btn btn-info" onclick="return deleteFun()">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function deleteFun() {
            if(!confirm("Are You Sure to delete this"))
            event.preventDefault();
        }
    </script>
    {{-- end of the table --}}


    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>