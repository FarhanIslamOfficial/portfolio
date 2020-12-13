@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('dashboard')}}" class="btn btn-success">Back To Dashboard -></a>
        <example-component></example-component>
    </div>
@endsection