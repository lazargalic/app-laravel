@extends('layouts.layout1')

@section('title')
    {{'Strim'}}
@endsection

@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="show-top-grids">
            {{-- base--}}

            <div class="main-grids about-main-grids">
                <h1>Zapocnite vas live Stream</h1>
                <p class="fontsizemoj ptt2">
                    Startovanje
                </p>

                <div class="">

                    @if(!session('user')->isActiveStream)

                    <form action="{{route('createnewstream')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('POST')
                        <div class="fontsizemoj">
                            <input type="submit" class="dugme" value="Zapocni"/>
                            <p class="ptt3"> Dodaj thumbnail sliku za strim (opciono*). </p>
                            <input type="file" name="slika"/>
                        </div>
                    </form>

                    @else
                        <form action="{{route('endlivestream', ['id'=> session('user')->isActiveStream ] )}}" method="post" >
                            @csrf
                            @method('POST')
                            <input type="submit" class="dugme" value="Prekini Live Stream"/>
                        </form>

                    @endif

                    <div class="ptt2">

                        @if( session()->get('message'))
                        <div class="alert fontsizemoj alert-success ">
                            {{session('message')}}
                        </div>
                        @endif
                    </div>
                </div>

                {{--base--}}
            </div>

@endsection
