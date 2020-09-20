@extends('layouts.master')

@section('title', 'this is title')

@section('sidebar')
@parent


@endsection

@section('content')

<div class="row">
    <h3>Data Table</h3>

    <table id="reportTable" class="display table table-bordered">
        <thead>
             <tr>
                  <th scope="col">SL</th>
                  <th scope="col">Name</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Email</th>

             </tr>
        </thead>
        <tbody>
             @php
             $x = 1
             @endphp
             @foreach ($records as $record)
             <tr>
                  <th scope="row">{{ $x++ }}</th>
                  <td>{{ $record->name }}</td>
                  <td>{{ $record->phone }}</td>
                  <td>{{ $record->email }}</td>
             </tr>
             @endforeach
        </tbody>

   </table>

</div>



@endsection