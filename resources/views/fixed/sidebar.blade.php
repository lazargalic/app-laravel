<div class="col-sm-3 col-md-2 sidebar ">
    <div class="top-navigation ">
        <div class="t-menu">MENU</div>
        <div class="t-img">
            <img src="" alt="" />
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="drop-navigation drop-navigation">
        <ul class="nav nav-sidebar">

            <li class="{{ (request()->is('/')) ? 'active' : '' }}" ><a href="{{route('home')}}" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Početna</a></li>

            @if(session()->has('user'))
            <li class="{{ (request()->is('streamerStart')) ? 'active' : '' }}" ><a href="{{route('streamerStart')}}" class="news-icon"><span class="glyphicon glyphicon-film" aria-hidden="true"></span>Strimuj sada</a></li>
            <li class="{{ (request()->is('token')) ? 'active' : '' }}" ><a href="{{route('token')}}" class="news-icon"><span class="glyphicon glyphicon-film glyphicon-king" aria-hidden="true"></span>Tokeni</a></li>
            <li class="{{ (request()->is('myFollows')) ? 'active' : '' }}" ><a href="{{route('myFollows')}}" class="news-icon"><span class="glyphicon glyphicon-home glyphicon-bookmark" aria-hidden="true"></span>Pratim</a></li>
            <!-- <li><a href="../../public/sajtlaravel/news.html" class="news-icon"><span class="glyphicon glyphicon-home glyphicon-blackboard" aria-hidden="true"></span>Gledaj kao kreator</a></li> -->
            @endif

            <li class="{{ (request()->is('about')) ? 'active' : '' }}" ><a href="{{route('about')}}" class="news-icon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>O autoru</a></li>

            @if(session()->has('user') && session()->get('user')->isAdmin))
            <li  class="{{ (request()->is('admins*')) ? 'active' : '' }}" ><a href="{{route('admins')}}" class="news-icon"><span class="glyphicon glyphicon-home glyphicon-book " aria-hidden="true"></span>Admin</a></li>
            @endif

            @if(session()->has('user'))
                @if(session('user')->isActiveStream)
                    <li><a href="{{route('logout',  ['id'=> session('user')->isActiveStream ] ) }}" class="news-icon"><span class="glyphicon glyphicon-home glyphicon-log-out " aria-hidden="true"></span>Odjavi se</a></li>

                @else
                    <li><a href="{{route('logout') }}" class="news-icon"><span class="glyphicon glyphicon-home glyphicon-log-out " aria-hidden="true"></span>Odjavi se</a></li>
                @endif
            @endif


        </ul>

            <!--
            <li><a href="#" class="menu"><span class="glyphicon glyphicon-film glyphicon-king" aria-hidden="true"></span>Sports<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>
            <ul class="cl-effect-1">
                <li><a href="../../public/sajtlaravel/sports.html">Football</a></li>
                <li><a href="../../public/sajtlaravel/sports.html">Cricket</a></li>
                <li><a href="../../public/sajtlaravel/sports.html">Tennis</a></li>
                <li><a href="../../public/sajtlaravel/sports.html">Shattil</a></li>
            </ul>
            <li><a href="../../public/sajtlaravel/movies.html" class="song-icon"><span class="glyphicon glyphicon-music" aria-hidden="true"></span>Songs</a></li>
            <li><a href="../../public/sajtlaravel/shows.html" class="user-icon"><span class="glyphicon glyphicon-home glyphicon-blackboard" aria-hidden="true"></span>TV Shows</a></li>
            -->
            <!-- script-for-menu -->

            <script>/*
                $( "li a.menu" ).click(function() {
                    $( "ul.cl-effect-1" ).slideToggle( 300, function() {
                        // Animation complete.
                    });
                }); */
            </script>



        <!-- script-for-menu -->
        <script>
            $( ".top-navigation" ).click(function() {
                $( ".drop-navigation" ).slideToggle( 300, function() {
                    // Animation complete.
                });
            });
        </script>

        <div class="side-bottom">
            <div class="side-bottom-icons">
                <ul class="nav2">
                    <li><a href="#" class="facebook"> </a></li>
                    <li><a href="#" class="facebook twitter"> </a></li>
                    <li><a href="#" class="facebook chrome"> </a></li>
                    <li><a href="#" class="facebook dribbble"> </a></li>
                </ul>
            </div>
            <div class="copyright">
                <p> Copyright © 2022 TwitchTV. All Rights Reserved</p>
            </div>
        </div>
    </div>
</div>
