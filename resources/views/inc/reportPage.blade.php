@extends('master')
@section("title_area")
Report Page
@endsection
@section("main_section")
<div class="wrapper">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5">
          <h6 class="text-right"><a href="{{ route("dashboard") }}">Back To Dashboard</a></h6>
          <h4 class="mb-3">Search Result</h4>
          @isset($bazar)
          <div class="table-responsive mt-5">
            <h5>Bazar Report</h5>
            <table class="table">
              <thead>
                <tr class="bg-primary text-white">
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Date</th>
                </tr>
              </thead>
              <tbody>
              @foreach($bazar as $key=>$value)
                <tr>
                  <th scope="row">{{++$key}}</th>
                  <td>{{$value->user->name}}</td>
                  <td>{{$value->amount}}</td>
                  <td>{{$value->date}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @endisset
          @isset($maintenance)
          <div class="table-responsive mt-5">
            <h5>Maintenance Report</h5>
            <table class="table">
              <thead>
                <tr class="bg-primary text-white">
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Desc.</th>
                  <th scope="col">Date</th>
                </tr>
              </thead>
              <tbody>
              @foreach($maintenance as $key=>$value)
                <tr>
                  <th scope="row">{{++$key}}</th>
                  <td>{{$value->user->name}}</td>
                  <td>{{$value->amount}}</td>
                  <td>{{$value->description}}</td>
                  <td>{{$value->date}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @endisset
          @isset($meal)
          <div class="table-responsive mt-5">
            <h5>Meal Report</h5>
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
              @foreach($meal as $key=>$value)
                <tr>
                  <th scope="row">{{++$key}}</th>
                  <td>{{$value->user->name}}</td>
                  <td>{{$value->total_meal}}</td>
                  <td>{{$value->date}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @endisset
          @isset($meal_summery)
          <div class="table-responsive mt-5">
            <h5>Summary Report</h5>
            <table class="table table-bordered">
              <tr>
                <td><strong>Total Bazar:</strong></td>
                <td><span class="text-danger">{{$total_bazar}}</span></td>
              </tr>
              <tr>
                <td><strong>Total Maintenance:</strong></td>
                <td><span class="text-danger">{{$total_maintenance}}</span></td>
              </tr>
              <tr>
                <td><strong>Total Meal:</strong></td>
                <td><span class="text-danger">{{$total_meal}}</span></td>
              </tr>
              <tr>
                <td><strong>Meal Charge:</strong></td>
                <td><span class="text-danger">{{number_format($meal_charge,2)}}</span></td>
              </tr>
              <tr>
                <td><strong>Maintenance Charge:</strong></td>
                <td><span class="text-danger">{{number_format($extra_charge,2)}}</span></td>
              </tr>
            </table>
            
            <table class="table">
              <thead>
                <tr class="bg-primary text-white">
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Total Meal</th>
                  <th scope="col">Total Tk</th>
                </tr>
              </thead>
              <tbody>
              @foreach($meal_summery as $key=>$value)
                <tr>
                  <th scope="row">{{++$key}}</th>
                  <td>{{$value->user->name}}</td>
                  <td>{{$value->per_user_meal}}</td>
                  <td>{{number_format(($value->per_user_meal*$meal_charge)+$extra_charge,2)}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @endisset
        </div>
      </div>
    </div>
  </div>
@endsection