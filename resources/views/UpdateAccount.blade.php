<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="images/mainicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>PlaySocial</title>
    <style>
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card">
            <div class="card-header">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <a id="btn-1" class="btn btn-danger"
                               href="#" onclick="showForm('option1')">Beginner plan</a>
                        </div>
                        <div class="col text-center">
                            <a id="btn-2" class="btn btn-outline-danger" style="width: 150px"
                               href="#" onclick="showForm('option2')">Professional plan</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="upgrade"  id="option1-form" style="{{ $selectedOption === 'option1' ? 'display:block' : 'display:none' }}">
                     @csrf
                     <div class="mb-6">
                        <label for="email" class="inline-block text-lg mb-4">Email</label>
                        <input type="email" class="border border-danger rounded " name="email"
                            value="{{ old('email') }}" />
    
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <div class="mb-6">
                        <label for="password" class="inline-block text-lg mb-4">
                            Password
                        </label>
                        <input type="password" class="border border-danger rounded " name="password"
                            value="{{ old('password') }}" />
    
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <input style="display: none" type="unsignedTinyInteger" name="subscription" value="1">
    
                    <div class="mb-6">
                        <button type="submit" class="btn btn-lg btn-outline-danger rounded py-2 px-4 hover:bg-black">Upgrade</button>
                    </div>
                </form>
                <form method="POST" action="upgrade" id="option2-form" style="{{ $selectedOption === 'option2' ? 'display:block' : 'display:none' }}">
                    @csrf
                    <div class="mb-6">
                        <label for="email" class="inline-block text-lg mb-4">Email</label>
                        <input type="email" class="border border-danger rounded " name="email"
                            value="{{ old('email') }}" />
    
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <div class="mb-6">
                        <label for="password" class="inline-block text-lg mb-4">
                            Password
                        </label>
                        <input type="password" class="border border-danger rounded " name="password"
                            value="{{ old('password') }}" />
    
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <input style="display: none" type="unsignedTinyInteger" name="subscription" value="2">
    
                    <div class="mb-6">
                        <button type="submit" class="btn btn-lg btn-outline-danger rounded py-2 px-4 hover:bg-black">Upgrade</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showForm(option) {
            if (option === 'option1') {
                document.getElementById('option1-form').style.display = 'block';
                document.getElementById('option2-form').style.display = 'none';
                document.getElementById('btn-1').classList.add("btn-danger");
                document.getElementById('btn-1').classList.remove("btn-outline-danger");
                document.getElementById('btn-2').classList.remove("btn-danger");
                document.getElementById('btn-2').classList.add("btn-outline-danger");
            } else if (option === 'option2') {
                document.getElementById('option1-form').style.display = 'none';
                document.getElementById('option2-form').style.display = 'block';
                document.getElementById('btn-2').classList.add("btn-danger");
                document.getElementById('btn-2').classList.remove("btn-outline-danger");
                document.getElementById('btn-1').classList.remove("btn-danger");
                document.getElementById('btn-1').classList.add("btn-outline-danger");
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
</body>

</html>
