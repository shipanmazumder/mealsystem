@extends('master')
@section("title_area")
Login
@endsection
@section("main_section")
  <div class="wrapper">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5">
          <h4 class="mb-3">Login</h4>
          <div class="card">
            <div class="card-body">
              <form method="POST" action="{{ route('login') }}">
                        @csrf
                <div class="form-group mb-2">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required id="email" placeholder="email@example.com">
                   @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required id="pass" placeholder="Password">
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                  <button type="submit" class="btn btn-primary mt-1 w-100">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection