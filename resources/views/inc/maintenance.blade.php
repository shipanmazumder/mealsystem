@extends('master')
@section("title_area")
Maintenance
@endsection
@section("main_section")
<div class="wrapper">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5">
          <h6 class="text-right"><a href="{{route("dashboard")}}">Back To Dashboard</a></h6>
          <h4 class="mb-3">Maintenance</h4>
          <div class="card">
            <div class="card-body">
              {!! Form::open(['url' => 'maintenance']) !!}
              @method("POST")
                <select name="user_id" class="custom-select mb-2" id="meal-who" required>
                  <option  value="">Choose...</option>
                  @foreach($users as $value)
                        @if(@$single)
                            <option {{ $value->id==$single->user_id?"selected":"" }} value="{{$value->id}}">{{ $value->name }}</option>
                        @else
                            <option {{ $value->id==Auth::id()?"selected":"" }} value="{{$value->id}}">{{ $value->name }}</option>
                        @endif
                  @endforeach
                </select>
                  @error('user_id')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                <input type="text" name="amount" value="{{ @$single->amount }}" class="form-control mb-2" required placeholder="Amount*">
                <input type="hidden" name="id" value="{{ @$single->id }}">
                  @error('amount')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                <input type="text" name="description" class="form-control mb-2" value="{{ @$single->description }}" required placeholder="Description*">
                <input type="date" name="date" value="{{ @$single->date!=''?@date("Y-d-m",strtotime($single->date)):date("Y-m-d") }}" class="form-control mb-2" required>
                  @error('date')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                <button type="submit" class="btn btn-primary mt-1 w-100">Submit</button>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection