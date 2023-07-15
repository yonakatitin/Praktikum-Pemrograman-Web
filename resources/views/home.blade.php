@extends('layouts.app')

@section('content')

      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
              @endif

              <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
              <h6 class="font-weight-normal mb-0">You are logged in as User!</h6>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-10 grid-margin stretch-card">
          <div class="card tale-bg">
            <div class="card-people mt-auto">
              <img src="{{ asset('images/dashboard/people.svg') }}" alt="people">
              <div class="weather-info">
                <div class="d-flex">
                  <div>
                    <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                  </div>
                  <div class="ml-2">
                    <h4 class="location font-weight-normal">Bangalore</h4>
                    <h6 class="font-weight-normal">India</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection
