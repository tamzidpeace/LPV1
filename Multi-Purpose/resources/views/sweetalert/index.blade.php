@extends('layouts.app')

@section('content')

<h1>Hello</h1>

<a href="{{ route('st') }}" class="btn btn-outline-primary"> Alert </a>

@endsection

@section('scripts')

<script>
 $(function() {
@if(Session::has('message')) 
     Swal.fire({
  title: 'Error!',
  text: 'Do you want to continue',
  icon: 'error',
  confirmButtonText: 'Cool'
});
});
@endif


</script>
    
@endsection