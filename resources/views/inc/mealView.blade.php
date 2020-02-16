@extends('master')
@section("title_area")
Meal View
@endsection
@section("main_section")
     <div class="wrapper">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5">
          <h6 class="text-right"><a href="{{route("dashboard")}}">Back To Dashboard</a></h6>
          <h4 class="text-center">Meal View</h4>
          <div class="table-responsive mt-2">
            <table class="table">
              <thead>
                <tr class="bg-primary text-white">
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Meal</th>
                  <th scope="col">Date</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>{{$meal->user->name}}</td>
                  <td>{{$meal->total_meal}}</td>
                  <td>{{$meal->date}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection