@section('navbar-profile')
<div class="navbar-mobile active" style="height:4.5rem">
    <a href="/" class="item">
        <svg width="20" height="20"  viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M2.5 7.49999L10 1.66666L17.5 7.49999V16.6667C17.5 17.1087 17.3244 17.5326 17.0118 17.8452C16.6993 18.1577 16.2754 18.3333 15.8333 18.3333H4.16667C3.72464 18.3333 3.30072 18.1577 2.98816 17.8452C2.67559 17.5326 2.5 17.1087 2.5 16.6667V7.49999Z"
                stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M7.5 18.3333V10H12.5V18.3333" stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <p>Home</p>
    </a>

    <a class="dropdown-toggle item" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        <!--                   <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">-->
        <!--    <path-->
        <!--        d="M9.16667 15.8333C12.8486 15.8333 15.8333 12.8486 15.8333 9.16667C15.8333 5.48477 12.8486 2.5 9.16667 2.5C5.48477 2.5 2.5 5.48477 2.5 9.16667C2.5 12.8486 5.48477 15.8333 9.16667 15.8333Z"-->
        <!--        stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />-->
        <!--    <path d="M17.5 17.5L13.875 13.875" stroke="#B8BABC" stroke-linecap="round" stroke-linejoin="round" />-->
        <!--</svg>-->
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 64 64" id="home-searching">
            <path fill="#B8BABC"
                d="M44.9 40.6c8.7-8.6 8.7-22.7.1-31.3S22.4.5 13.7 9.1 5 31.8 13.6 40.5c8.1 8.1 21 8.8 29.9 1.5l15.9 14.8c.4.4 1 .4 1.4 0s.4-1 0-1.4L44.9 40.6zM10 25.4c0-10.8 8.9-19.5 19.7-19.5 10.7.1 19.4 8.8 19.5 19.5 0 10.8-8.8 19.6-19.6 19.6C18.7 45 10 36.2 10 25.4z">
            </path>
            <path fill="#B8BABC"
                d="M43.6 25.7c.2-.4.1-.8-.2-1.1L30.3 12.3c-.4-.4-1-.4-1.4 0L15.8 24.6c-.4.4-.4 1 0 1.4.2.2.5.3.7.3H19v11.4c0 .6.4 1 1 1h19.3c.6 0 1-.4 1-1V26.4h2.5c.3 0 .7-.3.8-.7zm-14-11.3 10.6 9.9H19l10.6-9.9zm-.1 22.2v-4.5h1.9v4.5h-1.9zm8.7.2h-4.8v-5.7c0-.6-.4-1-1-1h-3.9c-.6 0-1 .4-1 1v5.7h-6.6V26.4h17.3v10.4z">
            </path>
            <path fill="#B8BABC"
                d="M29.6 22.9c1.6 0 2.9-1.3 2.9-2.9 0-1.6-1.3-2.9-2.9-2.9-1.6 0-2.9 1.3-2.9 2.9 0 1.7 1.3 2.9 2.9 2.9zm0-3.7c.5 0 .9.4.9.9s-.4.9-.9.9-.9-.4-.9-.9.4-.9.9-.9z">
            </path>
        </svg>
        <p>Perumahan</p>
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li>
            <a class="dropdown-item" href="/Housing/Greenland">
                <div>
                    <center>
                        <img style="width: 50%;
                        height: 55%;" src="{{ asset('Home') }}/images/logo-tidar-green.png" alt="">
                    </center>
                </div>
            </a>
        </li>
        <br>

        <li>
            <a class="dropdown-item" href="/Housing/Kalm">
                <div>
                    <center>
                        <img style="width:40%; height:40%;" src="{{ asset('Home') }}/images/logo-kalm.png" alt="">
                    </center>
                </div>
            </a>
        </li>
    </ul>
    @if (!empty(Session::get('guest')))
    <a href="" class="item">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16" id="user">
            <path fill="#B8BABC"
                d="M7.763 2A6.77 6.77 0 0 0 1 8.763c0 1.807.703 3.505 1.98 4.782a6.718 6.718 0 0 0 4.783 1.981 6.77 6.77 0 0 0 6.763-6.763A6.77 6.77 0 0 0 7.763 2ZM3.675 13.501a5.094 5.094 0 0 1 3.958-1.989c.024.001.047.007.071.007h.023c.022 0 .042-.006.064-.007a5.087 5.087 0 0 1 3.992 2.046 6.226 6.226 0 0 1-4.02 1.468 6.212 6.212 0 0 1-4.088-1.525zm4.032-2.494c-.025 0-.049.004-.074.005a2.243 2.243 0 0 1-2.167-2.255 2.246 2.246 0 0 1 2.262-2.238 2.246 2.246 0 0 1 2.238 2.262c0 1.212-.97 2.197-2.174 2.232-.028-.001-.056-.006-.085-.006Zm4.447 2.215a5.594 5.594 0 0 0-3.116-2.052 2.749 2.749 0 0 0 1.428-2.412A2.747 2.747 0 0 0 7.704 6.02a2.747 2.747 0 0 0-2.738 2.762 2.73 2.73 0 0 0 1.422 2.386 5.602 5.602 0 0 0-3.081 1.995 6.22 6.22 0 0 1-1.806-4.398 6.27 6.27 0 0 1 6.263-6.263 6.27 6.27 0 0 1 6.263 6.263 6.247 6.247 0 0 1-1.873 4.457z">
            </path>
        </svg>
        <p>
            {{$userPelanggan->nama_plgn}}
        </p>
    </a>
    @endif
    @if (!empty(Session::get('user')))
    <a href="/dashboard-admin/Greenland" class="item">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16" id="user">
            <path fill="#B8BABC"
                d="M7.763 2A6.77 6.77 0 0 0 1 8.763c0 1.807.703 3.505 1.98 4.782a6.718 6.718 0 0 0 4.783 1.981 6.77 6.77 0 0 0 6.763-6.763A6.77 6.77 0 0 0 7.763 2ZM3.675 13.501a5.094 5.094 0 0 1 3.958-1.989c.024.001.047.007.071.007h.023c.022 0 .042-.006.064-.007a5.087 5.087 0 0 1 3.992 2.046 6.226 6.226 0 0 1-4.02 1.468 6.212 6.212 0 0 1-4.088-1.525zm4.032-2.494c-.025 0-.049.004-.074.005a2.243 2.243 0 0 1-2.167-2.255 2.246 2.246 0 0 1 2.262-2.238 2.246 2.246 0 0 1 2.238 2.262c0 1.212-.97 2.197-2.174 2.232-.028-.001-.056-.006-.085-.006Zm4.447 2.215a5.594 5.594 0 0 0-3.116-2.052 2.749 2.749 0 0 0 1.428-2.412A2.747 2.747 0 0 0 7.704 6.02a2.747 2.747 0 0 0-2.738 2.762 2.73 2.73 0 0 0 1.422 2.386 5.602 5.602 0 0 0-3.081 1.995 6.22 6.22 0 0 1-1.806-4.398 6.27 6.27 0 0 1 6.263-6.263 6.27 6.27 0 0 1 6.263 6.263 6.247 6.247 0 0 1-1.873 4.457z">
            </path>
        </svg>
        <p>{{$user->nama_ua}}</p>
    </a>
    @endif
    @if (empty(Session::get('user')) && empty(Session::get('guest')))
    <a href="/login" class="item">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 100 100" id="Login">
            <path
                d="M72.2 52H7c-1.1 0-2-.9-2-2s.9-2 2-2h65.2L59.6 35.4c-.8-.8-.8-2 0-2.8.8-.8 2-.8 2.8 0l16 16c.8.8.8 2 0 2.8l-16 16c-.4.4-.9.6-1.4.6s-1-.2-1.4-.6c-.8-.8-.8-2 0-2.8L72.2 52zM87 10H23c-4.4 0-8 3.6-8 8v16c0 1.1.9 2 2 2s2-.9 2-2V18c0-2.2 1.8-4 4-4h64c2.2 0 4 1.8 4 4v64c0 2.2-1.8 4-4 4H23c-2.2 0-4-1.8-4-4V66c0-1.1-.9-2-2-2s-2 .9-2 2v16c0 4.4 3.6 8 8 8h64c4.4 0 8-3.6 8-8V18c0-4.4-3.6-8-8-8z"
                fill="#B8BABC" class="color000000 svgShape">
            </path>
        </svg>
        <p>Login/Register</p>
    </a>
    </a>
    @endif
</div>
@endsection
