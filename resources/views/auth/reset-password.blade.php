@extends('layouts.user-layout')


@section('resetpassword')
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="">
                  <h3 class="text-center"><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p class="text-center">You can reset your password here.</p>
                  <x-success></x-success>
                  <x-wrongemail></x-wrongemail>
                  <div class="panel-body">
                <form method="post" action="{{route('Reset')}}">
                    @csrf
                    @method('PUT')
                 <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ old('email') }}">
                </div>
                <x-error field="email"></x-error>
                <div class="mb-3 text-start">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <x-error field="password"></x-error>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation"class="form-control" id="exampleInputPassword1">
                </div>
                <x-error field="password_confirmation"></x-error>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary ">Submit</button>
                <a href="/" class="pd-3">login</a>
                </form> 
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
 

@endsection
