@extends('layouts.app')

@section('content')
    <div class="container">
            <form action="{{route('get.orders')}}" method="post">
                @csrf
                <div class="form-group row">
                <select name="customer" class="form-control col-md-4" id="customer">
                    <option value="">Select Customer</option>
                    @for($i=0; $i<count($customers); $i++)
                        <option value="{{$customers[$i]->id}}">{{$customers[$i]->name}}</option>
                    @endfor
                </select>

                <select name="order" class="form-control offset-1 col-md-4" id="order">
                    <option value="">States</option>
                </select>
                </div>
                <input class="form-control btn btn-outline-primary" name="try" type="button" value="submit">
            </form>
        </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script !src="">
    $(document).ready(function () {
        $('#customer').on('change', function () {
            var customer_id = $(this).val();
            $.ajax({
                url: '/get-orders',
                type: 'POST',
                dataType: 'json',
                data: {_token: "{{csrf_token()}}", 'data': customer_id,},
                success: function (data) {
                    $('#order').html(data.orders);
                }
            });
        });
    });
</script>
