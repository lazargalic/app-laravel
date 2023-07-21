@extends('layouts.layout1')

@section('title')
    {{'Tokeni'}}
@endsection


@section('main')

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="show-top-grids">
            <div class="main-grids about-main-grids">
                <div class="recommended-info">
                    <h3 class="podnaslov">TOKENI</h3>
                    <p class="fontsizemoj">Vase trenutno stanje iznosi: <span class="spanmoj"> {{$token->tokens_available}} </span> tokena.
                    </p> <br/>

                    <p class="fontsizemoj">Dodajte jos tokena tako sto cete odabrati broj tokena.</p>
                    <p class="fontsizemoj">    Provericemo uplate sa vaseg korisnickog imena ka nasem racunu i konvertovati.  </p>
                    <p class="fontsizemoj">   Administratori ce u najkracem roku proveriti transakciju i izvrsiti konverziju.
                    </p>

                    {{--Mssg--}}

                    @if( session()->get('message'))
                        <div class="alert fontsizemoj alert-success ">
                            {{session('message')}}
                        </div>
                    @endif

                    @if( session()->get('errmessage'))
                        <div class="alert fontsizemoj alert-danger ">
                            {{session('message')}}
                        </div>
                    @endif


                <form action="{{route('addtokens')}}" class="form-inline ptt" method="post">
                    @csrf
                    @method('POST')
                        <div class="form-group">
                            <input type="number" placeholder="Broj Tokena" class="form-control" id="brojtokena" name="brojtokena">
                        </div>
                        <br/>
                        <div class="form-group fontsizemoj">

                        </div><br/>
                        <button id="kupitokene" type="submit" class="btn btn-default">Kupi</button>
                </form>
                    <div class="about-grids">
                        <div class="about-bottom-grids">
                            <div class="col-sm-6 about-left">
                                <div class="about-left-grids">
                                    <div class="col-md-2 about-left-img">
                                        <span class="glyphicon glyphicon-user glyphicon-facetime-video" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-10 about-left-info">
                                        <a href="#">When We Started</a>
                                        <p>Suspendisse cursus tempus ullamcorper Praesent molestie urna a metus auctor vulputate molestie urna a metus auctor molestie urna a metus auctor.</p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            <div class="col-sm-6 about-right">
                                <div class="about-left-grids">
                                    <div class="col-md-2 about-left-img">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-10 about-left-info">
                                        <a href="#">Community Guidelines</a>
                                        <p>Suspendisse cursus tempus ullamcorper Praesent molestie urna a metus auctor vulputate molestie urna a metus auctor molestie urna a metus auctor.</p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="about-bottom-grids">
                            <div class="col-sm-6 about-left">
                                <div class="about-left-grids">
                                    <div class="col-md-2 about-left-img">
                                        <span class="glyphicon glyphicon-user glyphicon-book" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-10 about-left-info">
                                        <a href="#">About Our Site</a>
                                        <p>Suspendisse cursus tempus ullamcorper Praesent molestie urna a metus auctor vulputate molestie urna a metus auctor molestie urna a metus auctor.</p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            <div class="col-sm-6 about-right">
                                <div class="about-left-grids">
                                    <div class="col-md-2 about-left-img">
                                        <span class="glyphicon glyphicon-user glyphicon-headphones" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-10 about-left-info">
                                        <a href="#">New Update</a>
                                        <p>Suspendisse cursus tempus ullamcorper Praesent molestie urna a metus auctor vulputate molestie urna a metus auctor molestie urna a metus auctor.</p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="about-bottom-grids">
                            <div class="col-sm-6 about-left">
                                <div class="about-left-grids">
                                    <div class="col-md-2 about-left-img">
                                        <span class="glyphicon glyphicon-user glyphicon-folder-open" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-10 about-left-info">
                                        <a href="#">Careers</a>
                                        <p>Suspendisse cursus tempus ullamcorper Praesent molestie urna a metus auctor vulputate molestie urna a metus auctor molestie urna a metus auctor.</p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            <div class="col-sm-6 about-right">
                                <div class="about-left-grids">
                                    <div class="col-md-2 about-left-img">
                                        <span class="glyphicon glyphicon-user glyphicon-phone" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-10 about-left-info">
                                        <a href="#">Contact Us</a>
                                        <p>Suspendisse cursus tempus ullamcorper Praesent molestie urna a metus auctor vulputate molestie urna a metus auctor molestie urna a metus auctor.</p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>


@endsection
