@extends('layouts.layout2admin')


@section('title')
    {{'Uvid Korisnika'}}
@endsection


@section('main')
    <div class="fontsizemoj col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="show-top-grids">
            {{-- base--}}

            <div class="main-grids about-main-grids text-center">
                <h1>Svi Korisnici</h1>
                {{--base--}}
            </div>


            <div class="main-grids about-main-grids ptt2 pbb2 pbb" id="ispisaktivnosti">


                <table class="table table-striped pbb2 pbb ">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Username</th>
                        <th>Mejl</th>
                        <th>Uloga</th>
                        <th>Drzava</th>
                        <th></th>

                    </tr>
                    </thead>


                    <tbody>
                    @foreach($users as $u)
                        <tr id="red-{{$u->id}}">
                            <td>{{$u->id}}</td>
                            <td>{{$u->first_name}}</td>
                            <td>{{$u->last_name}}</td>
                            <td>{{$u->username}}</td>
                            <td>{{$u->email}}</td>
                            <td>
                                <span id="role-{{$u->id}}">
                                    {{$u->role->name_role}}  |
                                    <a class="bojamoja menjanje" iduser="{{$u->id}}" trenutno="{{$u->role_id}}" >Promeni </a>
                                </span>
                            </td>
                            <td>{{$u->countrr->name_country}}</td>
                            <td>
                                <button type="button" class="obrisiusera btn btn-danger" iduser="{{$u->id}}">Obrisi</button>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>


                </table>
            </div>



        </div>
    </div>


@endsection
