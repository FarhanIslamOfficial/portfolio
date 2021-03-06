@extends('layouts.app')
@section('content')
<div class="container">
    @if (session("message"))
    <div class="alert alert-success" style="z-index:100;">
        {{ session("message") }}
    </div>
    @endif
    @foreach($experiences as  $exp)
    <div class="row">
        <div class="card col-sm-12 col-md-10 col-lg-10">
          
                <div class="card-header">
                    <div class="card-title"><h4>{{$exp->designation}}</h4></div>
                </div>
                <div class="card-body">
                    <div class="card-title"><h6>{{$exp->company_name}}</h6></div>
                    <div class="card-text">{{$exp->job_description}}</div>
                    <br>
                    <div class="col-md-6 col-sm-12 offset-6 d-flex flex-row-reverse" >
                    <small class="text-muted ml-2">From: {{$exp->start_date}}</small>

                    <small class="text-muted">To: {{$exp->end_date}}</small>
                    <br/>
                    <br>
                    </div>
                    <div class="row">
                        <a href="{{route('experience.delete',['id'=>$exp->id])}}" class=" col-md-5 col-sm-5 col-lg-5 ml-4 mr-4 btn btn-danger">Delete</a>
                        <button class=" col-md-5 col-sm-5 col-lg-5 ml-4 mr-4 btn btn-primary">Edit</button>
                    </div>
                </div>
                
              
              
           
        </div>
    
    </div>
    <br>
    @endforeach
</div>
@endsection