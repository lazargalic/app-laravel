@extends('layouts.layout2admin')

@section('title')
    {{'Admin'}}
@endsection



@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main ">
        <div class="show-top-grids">
            {{-- base--}}

            <div class="main-grids about-main-grids text-center">
                 <h1>Admin Panel</h1>
            {{--base--}}
            </div>

            <div class="main-grids about-main-grids">
                <h2><a href="{{route('admincategories')}}">Kategorije</a></h2>
                {{--base--}}
            </div>
            <div class="main-grids about-main-grids">
                <h2><a href="{{route('admintokens')}}">Tokeni Za Aktivaciju</a></h2>
                {{--base--}}
            </div>
            <div class="main-grids about-main-grids">
                <h2><a href="{{route('usersadmins')}}">Svi korisnici</a></h2>
                {{--base--}}
            </div>
            <div class="main-grids about-main-grids">
                <h2><a href="{{route('activities')}}">Aktivnosti korisnika</a></h2>
                {{--base--}}
            </div>
        </div>
    </div>

@endsection
