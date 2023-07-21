@extends('layouts.layout1')


@section('title')
    {{'Pocetna'}}
@endsection


@section('main')


        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

			<div class="main-grids fontsizemoj">
				<div class="top-grids">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    {{-- Logovanje i Registracija  --}}
                    @if(session()->has('goodlogin'))
                       <div class="alert alert-success">
                            {{ session('user')->first_name. ' , Uspesno ste se ulogovali!' }}
                        </div>

                        {{ session()->forget('goodlogin') }}
                    @elseif(session()->has('badlogin'))
                            <div class="alert alert-danger">
                                {{ session('badlogin') }}
                            </div>
                            {{ session()->forget('badlogin') }}
                    @endif

                    @if(session()->has('uspesnaregistracija'))
                            <div class="alert alert-success">
                                {{ session('uspesnaregistracija') }}
                            </div>
                            {{ session()->forget('uspesnaregistracija') }}
                    @endif





                        {{-- Pretraga --}}
                        <form action="{{route('home')}}"  method="GET">
                            <div class="kateogorije" >
                                <ul>
                                    @foreach($categories as $c)
                                        <li>

                                                <input id="kat-{{$c->id}}"

                                                       @if(isset($data['kategorije']) && count($data['kategorije'])>0)

                                                           @foreach($data['kategorije'] as $dc)
                                                                @if($dc==$c->id)
                                                                checked
                                                                @else
                                                                        ""
                                                                @endif
                                                           @endforeach
                                                       @endif

                                                       type="checkbox" value="{{$c->id}}" name="kategorije[]" />
                                                <label for="kat-{{$c->id}}"><span>{{$c->name_category}}  </span></label>

                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="pretraga pll">
                                @if(isset($data['reci']))
                                    <input type="text" value="{{$data['reci']}}" class="form-control" name='reci' placeholder="Kljucna rec">
                                @else
                                    <input type="text" class="form-control" name='reci' placeholder="Kljucna rec">
                                @endif
                            </div>
                            <div class="kateogorije ptt3">
                                <ul>
                                    <select class="form-select" name="drzava" aria-label="Default select example">
                                        <option value="0" selected >Sve drzave</option>
                                        @foreach($countries as $c)
                                            @if( isset($data['drzava']) && $data['drzava']==$c->id)
                                            <option selected value="{{$c->id}}">{{$c->name_country}}</option>
                                            @else
                                                <option value="{{$c->id}}">{{$c->name_country}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </ul>
                            </div>
                        <div class="uzivoiline">
                            <div>
                                @if(isset($data['datum']) && $data['datum']==1)
                                <input id="rastuce" checked type="radio" value="1" name="datum" /> <label for="rastuce"><span> Datum pocetka rastuce </span></label>
                                @else
                                    <input id="rastuce" type="radio" value="1" name="datum" /> <label for="rastuce"><span> Datum pocetka rastuce </span></label>
                                @endif
                            </div>
                            <div>
                                @if(isset($data['datum']) && $data['datum']==2)
                                <input id="opadajuce" checked  type="radio" value="2"  name="datum"  /> <label for="opadajuce"><span> Datum pocetka opadajuce </span></label>
                                @else
                                    <input id="opadajuce"  type="radio" value="2"  name="datum"  /> <label for="opadajuce"><span> Datum pocetka opadajuce </span></label>
                                @endif

                            </div>
                        </div>
                        <div class="uzivoiline">
                            <button type="submit" class=" dugme">Pretrazi</button>
                        </div>
                    </form>


                    <div class="recommended-info ptt2">
                        <h3>Sve </h3>
                    </div>



                    @if(count($lives)==0)
                            <div class="alert bojamoja"> Ne postoje rezultati </div>
                    @endif

                    @foreach($lives as $l)

                            @include('components.live-stream-component')

                    @endforeach



                </div>



                <div class="clearfix">

                </div>

            </div>
            <div class="paginacija fontsizemoj">

                {{$lives->links()}}

            </div>


@endsection
