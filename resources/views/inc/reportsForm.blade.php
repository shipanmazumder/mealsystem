@extends('master')
@section("title_area")
Reports
@endsection
@section("main_section")
<div class="wrapper">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5">
          <h6 class="text-right"><a href="{{ route("dashboard")  }}">Back To Dashboard</a></h6>
          <h4 class="mb-3">Search Repoart</h4>
          <div class="card">
            <div class="card-body">
              {!! Form::open(['url' => 'reports']) !!}
              @method("POST")
                <select class="custom-select mb-2" name="month" id="meal-who" required>
                  <option selected disabled  value="">Select Month</option>
                  <option value="01">January</option>
                  <option value="02">February</option>
                  <option value="03">March</option>
                  <option value="04">April</option>
                  <option value="05">May</option>
                  <option value="06">June</option>
                  <option value="07">July</option>
                  <option value="08">August</option>
                  <option value="09">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
                <select class="custom-select mb-2"  name="year" id="meal-who" required>
                  <option selected disabled value="">Select Year</option>
                  @for($i=2020;$i<=2030;$i++)
                    <option value="{{$i}}">{{ $i  }}</option>
                  @endfor;
                </select>
                <select class="custom-select mb-2" name="type" id="meal-who" required>
                  <option selected disabled value="">Select Type</option>
                  <option value="All">All</option>
                  <option value="Bazar">Bazar</option>
                  <option value="Maintenance">Maintenance</option>
                  <option value="Meal">Meal</option>
                </select>
                <select class="custom-select mb-2" name="user" id="meal-who" required>
                  <option selected disabled  value="">Select User</option>
                  <option value="All">All</option>
                 @foreach($users as $value)
                    <option {{ $value->id==Auth::id()?"selected":"" }} value="{{$value->id}}">{{ $value->name }}</option>
                  @endforeach
                </select>
                <button type="submit" class="btn btn-primary mt-1 w-100">Show</button>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection