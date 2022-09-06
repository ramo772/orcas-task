@extends('layouts.app')
@section('content')
    <main class="main-content  mt-0">
        <section>
            <div class=" ">
                <div class="container" style="
                transform: translate(24%, 43%);
            ">
                    <div class="row align-items-center">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card-header pb-0 text-left bg-transparent"
                                style="
                            display: flex;
                            flex-direction:column;
                            text-align: center;
                            align-items: center;
                            justify-content: center;
                        ">
                                <img src="https://static.wixstatic.com/media/d150e7_c39a8c307180414e8a58c680b334c561~mv2.png/v1/fill/w_126,h_232,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/support%20and%20callcenter%20.png"
                                    alt="">
                                <h3 style="color: black">Orcas Task</h3>
                            </div>
                            <form method="POST" action="/login">
                                @csrf
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
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="container ">
                                <img src="{{ asset('logo.png') }}" style="max-width: 75%;" alt="">
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </main>
@endsection
