@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Hi there, regular user
                </div>
            </div>

            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Create Role</h5>
                    <form action="{{ route('role.add') }}" method="post">
                        @csrf
                        <label for="role">Enter Role Name </label>
                        <input type="text" name="role" id="role">
                        <input class="btn btn-outline-primary btn-sm add" type="submit" value="Add">
                    </form>
                </div>
            </div>

            <ul class="list-group">
                <li class="list-group-item"><b>Roles</b></li>
                @foreach ($roles as $item)
                <li class="list-group-item">{{ $item->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection

<script>
    $('.add').on('click', function(e) {
        e.preventDefault();
        swal("Hello world!");
        console.log("123");
    });
</script>