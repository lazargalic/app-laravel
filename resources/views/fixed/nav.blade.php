@if(isset($countries)? '': $countries=[])
@endif

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>                                   {{-- <img src="{{ asset('/sajtlaravel/images/logo.png') }}" alt="" /> --}}
            <a class="navbar-brand" href="/"><h1 class="glavnaboja peding">TwitchTV </h1></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

            <div class="header-top-right">

                <div class="signin">

                    @if(!session()->has('user'))
                    <a href="#small-dialog2" class="play-icon popup-with-zoom-anim">Registruj se</a>
                    @endif
                    <script type="text/javascript" src="{{ asset('/sajtlaravel/js/modernizr.custom.min.js') }} "></script>
                    <link href="{{ asset('/sajtlaravel/css/popuo-box.css') }} " rel="stylesheet" type="text/css" media="all" />
                    <script src="{{ asset('/sajtlaravel/js/jquery.magnific-popup.js') }} " type="text/javascript"></script>
                    <!--//pop-up-box -->
                    <div id="small-dialog2" class="mfp-hide">
                        <h3>Napravite Nalog</h3>
                        <div class="social-sits">
                            <div class="facebook-button">
                                <a href="#">Poveži sa Facebook-om</a>
                            </div>
                            <div class="chrome-button">
                                <a href="#">Poveži sa Google-om</a>
                            </div>
                            <div class="button-bottom">
                                <p>Već imate nalog? <a href="#small-dialog" class="play-icon popup-with-zoom-anim">Ulogujte se</a></p>
                            </div>
                        </div>
                        <div class="signup">
                            <div>
                                Uslovi koriscenja
                            </div>
                            <div class="continue-button">
                                <a href="#small-dialog3" class="glavnaboja hvr-shutter-out-horizontal play-icon popup-with-zoom-anim">Registruj se ovde </a>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div id="small-dialog3" class="mfp-hide">
                        <h3>Napravite Nalog</h3>
                        <div class="social-sits">
                            <div class="facebook-button">
                                <a href="#">Poveži sa Facebook-om</a>
                            </div>
                            <div class="chrome-button">
                                <a href="#">Poveži sa Google-om</a>
                            </div>
                            <div class="button-bottom">
                                <p>Već imate nalog? <a href="#small-dialog" class="play-icon popup-with-zoom-anim">Ulogujte se</a></p>
                            </div>
                        </div>
                        <div class="signup">
                            <form action="{{  route('register') }}" method="post">
                                @csrf
                                @method('POST')

                                <input type="text"  @if((@old('firstname')) ) value="{{@old('firstname') }}"  @endif  placeholder="Unesite ime" name="firstname" class="email" />
                                <input type="text" @if((@old('lastname')) ) value="{{@old('lastname') }}"  @endif  name="lastname" class="email" placeholder="Unesite prezime" />
                                <input type="text" @if((@old('email')) ) value="{{@old('email') }}"  @endif  name="email" class="email" placeholder="Unesite e-mail" />
                                <input type="text" @if((@old('username')) ) value="{{@old('username') }}"  @endif  name="username" class="email" placeholder="Unesite korisničko ime" />
                                <input type="text" @if((@old('mobile')) ) value="{{@old('mobile') }}"  @endif  name="mobile" class="email" placeholder="Unesite mobilni telefon"  />
                                <input type="password" name="password" class="email" placeholder="Unesite šifru"  />
                                {{--<input type="password" name="password" class="email" placeholder="Ponovo unesite šifru"  />--}}

                                <div class="radio">
                                    <select class="form-control" name="country">
                                        <option value="null">Drzava Porekla</option>

                                        @foreach($countries as $c)
                                            <option
                                                @if( @old('country')== $c->id ) {{'selected'}} @endif
                                                value="{{$c->id}}">{{$c->name_country}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="radio">
                                    <p>Pol: </p>
                                    <label>
                                        <input
                                            @if( @old('gender')== 1) {{'checked'}} @endif
                                            type="radio" name="gender" value="1">
                                        Muški
                                    </label>
                                    <label>
                                        <input @if( @old('gender')== 2) {{'checked'}} @endif type="radio" name="gender"  value="2" > Ženski
                                    </label>
                                </div>



                                <input type="submit" class="glavnaboja" value="Registruj se"/>
                            </form>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div id="small-dialog7" class="mfp-hide">
                        <h3>Napravite Nalog</h3>
                        <div class="social-sits">
                            <div class="facebook-button">
                                <a href="#">Poveži sa Facebook-om</a>
                            </div>
                            <div class="chrome-button">
                                <a href="#">Poveži sa Google-om</a>
                            </div>
                            <div class="button-bottom">
                                <p>Već imate nalog? <a href="#small-dialog" class="play-icon popup-with-zoom-anim">Ulogujte se</a></p>
                            </div>
                        </div>
                        <!--
                        <div class="signup">
                            <form action="../../public/sajtlaravel/upload.html">
                                <input type="text" class="email" placeholder="Email" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" title="Enter a valid email"/>
                                <input type="password" placeholder="Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
                                <input type="submit"  value="Sign In"/>
                            </form>
                        </div>
                        -->
                        <div class="clearfix"> </div>
                    </div>
                    <div id="small-dialog4" class="mfp-hide">
                        <h3>Feedback</h3>
                        <div class="feedback-grids">
                            <div class="feedback-grid">
                                <p>Suspendisse tristique magna ut urna pellentesque, ut egestas velit faucibus. Nullam mattis lectus ullamcorper dui dignissim, sit amet egestas orci ullamcorper.</p>
                            </div>
                            <div class="button-bottom">
                                <p><a href="#small-dialog" class="play-icon popup-with-zoom-anim">Sign in</a> to get started.</p>
                            </div>
                        </div>
                    </div>
                    <div id="small-dialog5" class="mfp-hide">
                        <h3>Help</h3>
                        <div class="help-grid">
                            <p>Suspendisse tristique magna ut urna pellentesque, ut egestas velit faucibus. Nullam mattis lectus ullamcorper dui dignissim, sit amet egestas orci ullamcorper.</p>
                        </div>
                        <div class="help-grids">
                            <div class="help-button-bottom">
                                <p><a href="#small-dialog4" class="play-icon popup-with-zoom-anim">Feedback</a></p>
                            </div>
                            <div class="help-button-bottom">
                                <p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Lorem ipsum dolor sit amet</a></p>
                            </div>
                            <div class="help-button-bottom">
                                <p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Nunc vitae rutrum enim</a></p>
                            </div>
                            <div class="help-button-bottom">
                                <p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Mauris at volutpat leo</a></p>
                            </div>
                            <div class="help-button-bottom">
                                <p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Mauris vehicula rutrum velit</a></p>
                            </div>
                            <div class="help-button-bottom">
                                <p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Aliquam eget ante non orci fac</a></p>
                            </div>
                        </div>
                    </div>
                    <div id="small-dialog6" class="mfp-hide">
                        <div class="video-information-text">
                            <h4>Video information & settings</h4>
                            <p>Suspendisse tristique magna ut urna pellentesque, ut egestas velit faucibus. Nullam mattis lectus ullamcorper dui dignissim, sit amet egestas orci ullamcorper.</p>
                            <ol>
                                <li>Nunc vitae rutrum enim. Mauris at volutpat leo. Vivamus dapibus mi ut elit fermentum tincidunt.</li>
                                <li>Nunc vitae rutrum enim. Mauris at volutpat leo. Vivamus dapibus mi ut elit fermentum tincidunt.</li>
                                <li>Nunc vitae rutrum enim. Mauris at volutpat leo. Vivamus dapibus mi ut elit fermentum tincidunt.</li>
                                <li>Nunc vitae rutrum enim. Mauris at volutpat leo. Vivamus dapibus mi ut elit fermentum tincidunt.</li>
                                <li>Nunc vitae rutrum enim. Mauris at volutpat leo. Vivamus dapibus mi ut elit fermentum tincidunt.</li>
                            </ol>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('.popup-with-zoom-anim').magnificPopup({
                                type: 'inline',
                                fixedContentPos: false,
                                fixedBgPos: true,
                                overflowY: 'auto',
                                closeBtnInside: true,
                                preloader: false,
                                midClick: true,
                                removalDelay: 300,
                                mainClass: 'my-mfp-zoom-in'
                            });

                        });
                    </script>
                </div>

                <div class="signin">
                    @if(!session()->has('user'))
                    <a href="#small-dialog" class="play-icon popup-with-zoom-anim">Uloguj se</a>
                    @else
                        <p class="kopirajt"> Copyright © 2022 TwitchTV. All Rights Reserved </p>
                    @endif
                    <div id="small-dialog" class="mfp-hide">
                        <h3>Login</h3>
                        <div class="social-sits">
                            <div class="facebook-button">
                                <a href="#">Poveži sa Facebook-om</a>
                            </div>
                            <div class="chrome-button">
                                <a href="#">Poveži sa Google-om</a>
                            </div>
                            <div class="button-bottom">
                                <p>Nemate nalog? <a href="#small-dialog2" class="play-icon popup-with-zoom-anim">Registrujte se</a></p>
                            </div>
                        </div>
                        <div class="signup">
                            <form action="{{route('login')}}" method="post">
                                @csrf
                                @method('post')
                                <input type="text" @if((@old('email')) ) value="{{@old('email') }}"  @endif name="email" class="email" placeholder="Unesite e-mail" />
                                <input type="password" name="password"  placeholder="Unesite šifru" />
                                <input type="submit" class="glavnaboja" value="Uloguj se"/>
                            </form>
                            <div class="forgot">
                                <a href="#">Zaboravili ste sifru ?</a>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>

                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</nav>

