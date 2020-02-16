@extends('master')
@section("title_area")
Dashboard
@endsection
@section("main_section")
<div class="wrapper dashboard-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="card">
            <a href="{{ url("bazar") }}">
              BAZAR
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card c2">
            <a href="{{url('maintenance')}}">
              MAINTENANCE
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card c3">
            <a href="{{url('meals')}}">
              MEAL
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card c4">
            <a href="{{url("reports")}}">
              REPORTS
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection