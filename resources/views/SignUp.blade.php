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
        .centered-card {
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
        }
      </style>
</head>
<body>


          <div class="centered-card p-10 max-w-lg mx-auto mt-24">
            <div class="card border-danger text-center">
                <header class="text-center">
                <h5 class="card-title">Sign Up</h5>
                <p class="mb-4">Create an account</p>
                <hr>
                </header>
                <form method="POST" action="/users">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="inline-block text-red mb-4"> Name </label>
                        <input type="text" class="border border-danger rounded" name="name"/>
                        @error('name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="email" class="inline-block text-red mb-4"> Email </label>
                        <input type="email" class="border border-danger rounded" name="email" value="{{old('email')}}"/>
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="password" class="inline-block text-red mb-4"> Password </label>
                        <input type="password" class="border border-danger rounded" name="password" value="{{old('password')}}"/>
                        @error('Password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="password2" class="inline-block text-red mb-4"> Confirm Passworld </label>
                        <input type="password" class="border border-danger rounded" name="password_confirmation" value="{{old('password_confirmation')}}" />
                        @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                    <button type="submit" class="btn btn-lg btn-outline-danger rounded py-2 px-4 hover:bg-black">Sign Up</button>
                    </div>
                    <div class="mt-8">
                        <p>
                          Already have an account?
                          <a href="/Log in" class="text-danger">Login</a>
                        </p>
                    </div>
                </form>
            </div>
          </div>


    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>