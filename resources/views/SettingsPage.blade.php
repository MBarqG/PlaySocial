<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="images/mainicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css\settingsStyle.css') }}">
    <title>PlaySocial</title>
</head>

<body>
    @include('Layout.navigation')
    <!----------side bar------->
    @include('Layout.sidebarSettings')
    {{-- --------------main------------- --}}
    <div class="container mt-5">
        <h2>Channels Settings:
            <hr>
        </h2>
        <div class="row">
          <div class="col-md-6 mx-auto">
            <form method="POST" action="update" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="form-group">
                <label for="profile-picture">Profile Picture</label>
                <div class="drop-zone" >
                 <span class="drop-zone-label">Drop or Click to select Profile Picture</span>
                 <div class="drop-zone-thumb" data-lable="myfile.txt"></div>
                 <input type="file" name="profile_picture" class="drop-zone-input" accept="image/*">
                </div>
              </div>
              <button type="submit" class="btn btn-outline-danger Settings">Save Settings</button>
            </form>
          </div>
        </div>
        <hr>
      </div>

      {{-- --------------videos------------- --}}
      <div class="container">
        <h2>Videos Settings:
            <hr>
        </h2>
        <form action="DeleteVideo" method="POST">
            @csrf
            <table class="table table-striped table-hover table-striped-red-white">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="title-column">Title</th>
                        <th scope="col" class="Description-column">Description</th>
                        <th scope="col"  >Thumbnail</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($videos as $video)
                    <tr>
                        <td>{{ $video->id }}</td>
                        <td>{{ $video->title }}</td>
                        <td>{{$video->description}}</td>
                        <td>
                            <img src="{{ $video->thumbnail }}" alt="Thumbnail" width="150" height="60">
                        </td>
                        <td>
                            <input type="checkbox" name="videosToDelete[]" value="{{ $video->id }}">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-danger Settings">Delete Selected Videos</button>
        </form>
    </div>

    {{-- --------------upload------------ --}}
    @include('Layout.uploadcard')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js\settings.js') }}"></script>
</body>

</html>
