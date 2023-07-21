@extends('layouts.layout1')

@section('title')
    {{'Strim'}}
@endsection

@section('main')

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        @if ($errors->any())
            <div class="alert alert-danger fontsizemoj">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="show-top-grids">
            <div class="song-info">

                @if(session()->has('user'))
                    <button class="dugme zaprati btn-xs " id="zaprati{{$single->id}}"
                            idStreamer="{{$single->user_streamer_id}}"
                            idStream="{{$single->id}}"
                            idUser="{{session()->get('user')->id}}"
                    >
                        @if($prati)
                        {{'Otprati'}}
                        @else {{'Zaprati'}}
                        @endif

                    </button>
                @endif

                <h3 class="podnaslov2">

                    {{$single->userStreamer->appUser->username}}
                    |
                    {{$single->userStreamer->appUser->first_name}}
                    {{$single->userStreamer->appUser->last_name}}
                    |                         {{--$single->userStreamer->followers--}}
                    <span id="pratioci{{$single->id}}" class="bojamoja"> {{$pratioci->count()}} </span>  <span class="bojamoja"> pratilaca </span>

                </h3>

            </div>
            <div class="col-sm-8 single-left">
                <div class="song">
                    <div class="video-grid">
                        <img id='slikalg' src="{{asset('/sajtlaravel/images/mojeslike/' .$single->thumbnail_picture)}}" alt="video" />
                    </div>
                </div>




                <div class="song-grid-right pbb">

                    <div id="donacija">



                        @if( session()->get('user') )

                            <form name="donacija" method="post">
                                @csrf
                                @method('POST')
                                <input id="poruka" type="text" name="poruka" placeholder="Napisi komentar" />
                                <select class="form-control" id='celendz' name="celendz">
                                    <option value="0">Izaberi Čelendž (opciono)</option>
                                    @foreach($single->userStreamer->challenges as $c)
                                        <option value="{{$c->id}}">{{$c->name_challenge}}</option>
                                    @endforeach

                                </select>
                                <div id="mojflex">
                                    <input id="numberr" name="tokenporuka" type="number" value="" placeholder="Dodaj tokene" />
                                    <input id="posaljitoken" type="button" class="glavnaboja" value="Posalji"/>
                                </div>
                                <p> Vase Stanje :


                                    <span id="tokensavail"  class="fontsizemoj bojamoja"> {{session()->get('user')->tokens_available}}</span>
                                    tokena.
                                </p>
                                <input type="hidden" id="user" value="{{session()->get('user')->id}}" />
                                <input type="hidden" id="strimer" value="{{$single->userStreamer->id}}" />
                                <input type="hidden" id="lajv" value="{{$single->id}}" />
                            </form>


                        @else
                            <p class="fontsizemoj bojamoja mojitalic"> Morate da se ulogujete da biste mogli da komentarisete i saljete donacije </p>
                        @endif


                    </div>

                    <div id="livechat">
                        {{-- --}}
                        @foreach($sviKomentari as $s)

                            @include('components.comment')

                        @endforeach

                        @if(!count($sviKomentari))
                            <h5 class="bojamoja">Nema komentara i donacija, budite prvi.</h5>
                        @endif

                        {{-- --}}
                    </div>
                </div>
                <div class="clearfix"> </div>


            <!-- Up next
            <div class="col-md-4 single-right">
                <h3>Up Next</h3>
                <div class="single-grid-right">
                    <div class="single-right-grids">
                        <div class="col-md-4 single-right-grid-left">
                            <a href="single.html"><img src="images/r1.jpg" alt="" /></a>
                        </div>
                        <div class="col-md-8 single-right-grid-right">
                            <a href="single.html" class="title"> Nullam interdum metus</a>
                            <p class="author"><a href="#" class="author">John Maniya</a></p>
                            <p class="views">2,114,200 views</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="single-right-grids">
                        <div class="col-md-4 single-right-grid-left">
                            <a href="single.html"><img src="images/r2.jpg" alt="" /></a>
                        </div>
                        <div class="col-md-8 single-right-grid-right">
                            <a href="single.html" class="title"> Nullam interdum metus</a>
                            <p class="author"><a href="#" class="author">John Maniya</a></p>
                            <p class="views">2,114,200 views </p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="single-right-grids">
                        <div class="col-md-4 single-right-grid-left">
                            <a href="single.html"><img src="images/r3.jpg" alt="" /></a>
                        </div>
                        <div class="col-md-8 single-right-grid-right">
                            <a href="single.html" class="title"> Nullam interdum metus</a>
                            <p class="author"><a href="#" class="author">John Maniya</a></p>
                            <p class="views">2,114,200 views</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="single-right-grids">
                        <div class="col-md-4 single-right-grid-left">
                            <a href="single.html"><img src="images/r4.jpg" alt="" /></a>
                        </div>
                        <div class="col-md-8 single-right-grid-right">
                            <a href="single.html" class="title"> Nullam interdum metus</a>
                            <p class="author"><a href="#" class="author">John Maniya</a></p>
                            <p class="views">2,114,200 views</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="single-right-grids">
                        <div class="col-md-4 single-right-grid-left">
                            <a href="single.html"><img src="images/r5.jpg" alt="" /></a>
                        </div>
                        <div class="col-md-8 single-right-grid-right">
                            <a href="single.html" class="title"> Nullam interdum metus</a>
                            <p class="author"><a href="#" class="author">John Maniya</a></p>
                            <p class="views">2,114,200 views</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="single-right-grids">
                        <div class="col-md-4 single-right-grid-left">
                            <a href="single.html"><img src="images/r6.jpg" alt="" /></a>
                        </div>
                        <div class="col-md-8 single-right-grid-right">
                            <a href="single.html" class="title"> Nullam interdum metus</a>
                            <p class="author">By <a href="#" class="author">John Maniya</a></p>
                            <p class="views">2,114,200 views</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="single-right-grids">
                        <div class="col-md-4 single-right-grid-left">
                            <a href="single.html"><img src="images/r1.jpg" alt="" /></a>
                        </div>
                        <div class="col-md-8 single-right-grid-right">
                            <a href="single.html" class="title"> Nullam interdum metus</a>
                            <p class="author"><a href="#" class="author">John Maniya</a></p>
                            <p class="views">2,114,200 views</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="single-right-grids">
                        <div class="col-md-4 single-right-grid-left">
                            <a href="single.html"><img src="images/r2.jpg" alt="" /></a>
                        </div>
                        <div class="col-md-8 single-right-grid-right">
                            <a href="single.html" class="title"> Nullam interdum metus</a>
                            <p class="author"><a href="#" class="author">John Maniya</a></p>
                            <p class="views">2,114,200 views</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="single-right-grids">
                        <div class="col-md-4 single-right-grid-left">
                            <a href="single.html"><img src="images/r3.jpg" alt="" /></a>
                        </div>
                        <div class="col-md-8 single-right-grid-right">
                            <a href="single.html" class="title"> Nullam interdum metus</a>
                            <p class="author"><a href="#" class="author">John Maniya</a></p>
                            <p class="views">2,114,200 views</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="single-right-grids">
                        <div class="col-md-4 single-right-grid-left">
                            <a href="single.html"><img src="images/r4.jpg" alt="" /></a>
                        </div>
                        <div class="col-md-8 single-right-grid-right">
                            <a href="single.html" class="title"> Nullam interdum metus</a>
                            <p class="author"><a href="#" class="author">John Maniya</a></p>
                            <p class="views">2,114,200 views</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="single-right-grids">
                        <div class="col-md-4 single-right-grid-left">
                            <a href="single.html"><img src="images/r5.jpg" alt="" /></a>
                        </div>
                        <div class="col-md-8 single-right-grid-right">
                            <a href="single.html" class="title"> Nullam interdum metus</a>
                            <p class="author"><a href="#" class="author">John Maniya</a></p>
                            <p class="views">2,114,200 views</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="single-right-grids">
                        <div class="col-md-4 single-right-grid-left">
                            <a href="single.html"><img src="images/r6.jpg" alt="" /></a>
                        </div>
                        <div class="col-md-8 single-right-grid-right">
                            <a href="single.html" class="title"> Nullam interdum metus</a>
                            <p class="author"><a href="#" class="author">John Maniya</a></p>
                            <p class="views">2,114,200 views</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>

                -->
            </div>

            <div class="clearfix"> </div>


@endsection
