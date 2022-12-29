@extends('layout')
  
@section('content')
<style>
  /* .bgsec:hover .bgflatfood::after{content:'';position:absolute;top:0;left:0;width:100%;height:100%}
.bgsec:hover .bgflatfood::after{  
  background-color:red;

  background-image:url("/public/fds.jpg");background-repeat:no-repeat;background-position:100% 0;background-size: cover;
  opacity: 0.04;
} */
</style>
<!-- <main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Login User</div>
                  <div class="card-body">
  
                      <form action="{{ route('login.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password" required>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="remember"> Remember Me
                                      </label>
                                  </div>
                              </div>
                          </div>
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Login
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main> -->
<!-- <section class="vh-100" style="background-color: #9A616D;"> -->
<section class="vh-100 bgsec  " >
  <div class="container bgflatfood">
    <div class="row d-flex justify-content-center align-items-center h-100 py-5">
      <div class="col col-xl-10">
        <div class="card " style="border-radius: 1rem;">
          <div class="row g-0 ">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="{{url('food.jpg')}}"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black ">

              <form action="{{ route('login.post') }}" method="POST">
@csrf

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Logo</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <!-- <input type="email" id="form2Example17" class="form-control form-control-lg" /> -->
                    <label class="form-label" for="form2Example17">Email address</label>
                    
                  </div>

                  <div class="form-outline mb-4">
                  <input type="password" id="password" class="form-control" name="password" required>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    <!-- <input type="password" id="form2Example27" class="form-control form-control-lg" /> -->
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-lg btn-block btn-primary" type="submit">Login</button>
                  </div>

                  <!-- <a class="small text-muted" href="#!">Forgot password?</a> -->
                  <!-- <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="{{ route('register') }}"
                      style="color: #393f81;">Register here</a></p> -->
                  <!-- <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a> -->
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection