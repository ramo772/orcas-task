@extends('layouts.app')

@section('content')

  <section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 mx-3 border-radius-lg" >
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <img src="https://static.wixstatic.com/media/d150e7_c39a8c307180414e8a58c680b334c561~mv2.png/v1/fill/w_126,h_232,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/support%20and%20callcenter%20.png"
            alt="">
        <h3 style="color: black">Orcas Register</h3>

          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="">
            <div class="">
              <form role="form text-left" method="POST" action="/register">
                @csrf
                <div class="form-outline mb-4">
                    <input type="name" name="name" id="form2Example1" class="form-control" />
                    <label class="form-label" for="form2Example1">Name</label>
                </div>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" name="email" id="form2Example1" class="form-control" />
                        <label class="form-label" for="form2Example1">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="form2Example2" class="form-control" />
                        <label class="form-label" for="form2Example2">Password</label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="password" name="password_confirmation" id="form2Example2" class="form-control" />
                        <label class="form-label" for="form2Example2">Confirm Password</label>
                    </div>
                    <!-- Submit button -->
                    <button type="submit" s class="btn btn-primary btn-block mb-4">Register</button>


                <p class="text-sm mt-3 mb-0">Already have an account? <a href="login" class="text-dark font-weight-bolder">Sign in</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

