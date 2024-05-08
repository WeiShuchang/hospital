<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>De Anza Hospital</title>

  <link rel="stylesheet" href="{{asset('/assets/css/maicons.css')}}">

  <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.css')}}">

  <link rel="stylesheet" href="{{asset('/assets/vendor/owl-carousel/css/owl.carousel.css')}}">

  <link rel="stylesheet" href="{{asset('/assets/vendor/animate/animate.css')}}">

  <link rel="stylesheet" href="{{asset('/assets/css/theme.css')}}">
</head>
<body>

<div class="back-to-top"></div>


<div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

      <form class="main-form" action="{{url('appointment')}}" method="post">
        @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="name" class="form-control" placeholder="Full name" @auth value="{{Auth::user()->name}}" @endauth required>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" name="email" class="form-control" placeholder="Email address.." @auth value="{{Auth::user()->email}}" @endauth  required>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" name="date" class="form-control">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="doctor" id="departement" class="custom-select" required>
              <option>--Select Doctor--</option>
              @foreach($doctor as $doctors)
              <option value="{{$doctors->name}}">{{$doctors->name}}--Specialization-- {{$doctors->speciality}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" name="phone" class="form-control" placeholder="Phone Number.." required>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="2" placeholder="Enter preferred time.."></textarea>
          </div>
        </div>

        <button type="submit" style="background-color:skyblue; padding: 10px; border-radius: 10px;">Submit Request</button>
      </form>
    </div>
  </div>

  <script src="{{asset('/assets/js/jquery-3.5.1.min.js')}}"></script>

<script src="{{asset('/assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('/assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

<script src="{{asset('/assets/vendor/wow/wow.min.js')}}"></script>

<script src="{{asset('/assets/js/theme.js')}}"></script>

  </body>
</html>