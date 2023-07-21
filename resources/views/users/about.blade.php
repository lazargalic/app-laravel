@extends('layouts.layout1')

@section('title')
        {{'O nama'}}
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
            <div class="main-grids about-main-grids">
                <div class="recommended-info">
                    <h3 class="podnaslov">O autoru</h3>
                    <p class="history-text">My name is Lazar Galic. I was born in march of 2002 and I study Internet Technologies at the 'ICT College' in Belgrade, Serbia.
                        I went to high school of electrotechnics 'Nikola Tesla' and graduated as a electrotechnician of multimedia. I came across web design
                        and internet technologies in high school for the first timeand it became one of my interests. My dream is to work for a successful company until
                        I acquire some experience in order to hopefully start my own company some day.
                    </p>
                    <div class="about-grids">
                        <img class="slikaa2" src="{{asset('/sajtlaravel/images/mojeslike/autor1.jpg')}}" alt="Autor" />
                        {{--<div class="about-bottom-grids">
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
                        --}}
                    </div>

                </div>
            </div>
        </div>


@endsection
