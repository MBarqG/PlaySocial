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
    .card-gap {
    margin-bottom: 20px;
    }
    </style>  
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="{{ asset('images/logo.png') }}" alt="PlaySocial" width="112" height="21"></a>
            <a class="nav-link" href="#Subscriptions">subscriptions</a>
            <a class="nav-link" href="#Goals">Goals</a>
            <a class="nav-link" href="#About us">About us</a>
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
  <h2 style="color: #dc3545" id="Subscriptions">Subscriptions</h2>
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


  <div class="container-xl text-center">
    <h2 style="color: #dc3545" id="Goals">Goals</h2>
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="5000">
          <img src="{{ asset('images/share slide.png') }}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Content Sharing</h5>
            <p>providing a medium for users to share their videos and other forms of content with a wide audience.</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
          <img src="{{ asset('images\Monetization slide.png') }}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Monetization and Revenue Generation</h5>
            <p>offer opportunities for content creators to monetize their work through advertising, sponsorships, subscriptions, or crowdfunding.</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="5000">
          <img src="{{ asset('images\Collaboration slide.png') }}" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Collaboration and Networking:</h5>
            <p>facilitate collaboration between content creators, allowing them to work together on joint projects, share resources, and build connections within the industry. </p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
</div>




<div class="container text-center">
    <h2 style="color: #dc3545" id="About us">About us</h2>


</div>




<div class="container-xl">
  <div class="row">
    <div class="col-md-6 card-gap">
      <div class="card border-danger">
        <!-- Card content here -->
          <div class="row g-0">
            <div class="col-md-4">
              <img src="{{ asset('images\MB LOGO.png') }}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Mohammed Barq</h5>
                <hr>
                <p class="card-text">Owner, Lead Developer and Designer for the platform <br> Major in Computer Science from An-Najah National University</p>
                <p class="card-text"><small class="text-muted">From: Nablus-Palestine</small></p>
              </div>
            </div>
        </div>
      </div>
  </div>
    <div class="col-md-6 card-gap">
      <div class="card border-danger">
        <!-- Card content here -->
          <div class="row g-0">
            <div class="col-md-4">
              <img src="{{ asset('images\instructor.jpg') }}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Samer Huwari</h5>
                <hr>
                <p class="card-text">CEO of Auxilium Technology and Project instructor <br> Computer Science Instructor at An-Najah National University</p>
                <p class="card-text"><small class="text-muted">From: Nablus-Palestine</small></p>
              </div>
            </div>
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