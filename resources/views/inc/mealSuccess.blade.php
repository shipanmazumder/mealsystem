@extends('master')
@section("title_area")
Success
@endsection
@section("main_section")
    <div class="wrapper dashboard-wrapper">
    <div class="container">
      <div class="row">
        @if(Session::has('message'))
           <div class="col-lg-12 col-md-12 ">
              <div class="alert alert-{{Session::get("class")}}">{{Session::get("message")}}</div>
           </div>
        @endif
        <div class="col-lg-4 col-md-6">
          <div class="card">
            <a href="{{ url("meals/".$id."/edit") }}">
              Edit This Response
            </a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card c2">
            <a href="{{url('meals')}}">
              Create New Response
            </a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card c3">
            <a href="{{url('meals/'.$id)}}">
              View This Response
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection