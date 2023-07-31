<nav class="flex-div">
    <div class="navStart flex-div">
        <img src="{{ asset('images/menu.png') }}" class="menu-icon">
        <a href="/Profile"><img src="{{ asset('images/logo.png') }}" class="logo"></a>
    </div>
    <div class="navMid flex-div">
        <div class="Search-box flex-div">
            <form method="GET" action="Search">
                @csrf
                <input autocomplete="off" type="text" placeholder="Search" name="text">
                <button class="hiddenbutton" type="submit"><img
                        src="{{ asset('images/search-icon.png') }}"></button>
            </form>
        </div>
    </div>
    <div class="navEnd flex-div">
        <img src="{{ asset('images/upload.png') }}" class="upload-icon">
    @auth
        @php
            $tier = Auth::user()->subscription ?? 0;
        @endphp
        <img src="{{ asset(Auth::user()->profile_picture) }}" class="user-icon{{ $tier > 0 ? '-T' . $tier : '' }}">
    @endauth 
    </div>
</nav>