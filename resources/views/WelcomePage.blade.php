<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="images/375 red.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="resources\css\app.css">
    <title>PlaySocial</title>
    <style>
    .container-xl{
      margin-top: 10rem
    }
    .bg-image {
    margin-top: 8rem;
    margin-right: 10rem;
    height: 400px; /* Adjust the height as needed */
    opacity: 0.5; /* Adjust the opacity as needed */
    float: right;
    z-index: -1;
    }
    .custom-rounded-top{
    border-radius: 20px 20px 0px 0px;
    }
    .custom-rounded {
    border-radius: 20px;
    }
    </style>  
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="{{ asset('images/logo.png') }}" alt="PlaySocial" width="112" height="21"></a>
            <a class="nav-link" href="#">subscriptions</a>
            <a class="nav-link" href="#">Goals</a>
            <a class="nav-link" href="#">About us</a>
            <span><div class="container">
            <button type="button" class="btn btn-danger">Log in</button>
            <button type="button" class="btn btn-sm btn-outline-danger">Sign up</button>
            </div></span>
      </div>
   </nav>
   <img class="bg-image" src="{{ asset('images/375 red.png') }}" alt="">

   <div class="container-xl">
    <h1 style="margin-bottom: 2rem">Welcome to</h1> 
    <h1><span style="color: #dc3545">Play</span>Social</h1>
    <hr>
    <div class="d-grid gap-2 col-4">
    <button class="btn btn-primary btn-lg btn-danger" type="button">Log in</button>
    <button class="btn btn-lg btn-outline-danger" type="button">Sign up</button>
    </div>
  </div>
<br>

  <div class="container-xl text-center">
  <h2 style="color: #dc3545" st>Subscriptions</h2>
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
      <div class="card text-center custom-rounded h-100">
        {{-- <img src="..." class="card-img-top" alt="..."> --}}
        <div class="card-body text-white bg-danger custom-rounded-top">
          <h5 class="card-title">Free plan</h5>
          <hr>
          <p class="card-text">5 minutes max video time limit.<br>100 videos max upload.<br>70 to 30 spilt in monetization between creator and platform.</p>
          <a href="#" class="btn btn-light">Sign up</a>
        </div>
        <div class="card-footer">
          <small class="text-muted">Free</small>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card text-center custom-rounded h-100">
        {{-- <img src="..." class="card-img-top" alt="..."> --}}
        <div class="card-body text-white bg-danger custom-rounded-top">
          <h5 class="card-title">beginner plan</h5>
          <hr>
          <p class="card-text">not video time limit.<br>2000 videos max upload.<br>80 to 20 spilt in monetization between creator and platform.</p>
          <a href="#" class="btn btn-light">Purchase Now</a>
        </div>
        <div class="card-footer">
          <small class="text-muted">4.99$ Pre Month</small>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card text-center custom-rounded h-100">
        {{-- <img src="..." class="card-img-top" alt="..."> --}}
        <div class="card-body text-white bg-danger custom-rounded-top">
          <h5 class="card-title">professional plan</h5>
          <hr>
          <p class="card-text">not video time limit.<br>no videos upload limit.<br>90 to 10 spilt in monetization between creator and platform.</p>
          <a href="#" class="btn btn-light">Purchase Now</a>
        </div>
        <div class="card-footer">
          <small class="text-muted">14.99$ Pre Month</small>
        </div>
      </div>
    </div>
  </div>
  </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>