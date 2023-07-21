@extends('layouts.layout2admin')

@section('title')
    {{'Tokeni verifikacija'}}
@endsection



@section('main')
    <div class="fontsizemoj col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="show-top-grids">
            {{-- base--}}

            <div class="main-grids about-main-grids text-center">
                <h1>Tokeni Za Odobravanje</h1>
                {{--base--}}
            </div>

            <div class="main-grids about-main-grids ptt2">

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


                <table class="table table-striped ">
                    <thead>
                    <tr>
                        <th>Korisnik</th>
                        <th>Korisnicko Ime</th>
                        <th>Tokeni Za Uplatu</th>
                        <th>Vreme Dodavanja</th>
                        <th>Konvertuj</th>
                        <th>Odbij</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($statuses as $s)

                        <tr>
                            <td>{{$s->user->first_name }} {{$s->user->last_name }}</td>
                            <td> {{$s->user->username }}</td>
                            <td>{{$s->bought_tokens}}</td>
                            <td>{{$s->bought_at}}</td>
                            <td>
                                <form action="{{route('convert_token', ['id_user'=>$s->app_user_id,
                                                                        'tokens'=>$s->bought_tokens,
                                                                        'id_bytk'=>$s->id
                                                                        ] )  }}"  method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">Konvertuj</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('refusetoken', ["id_bytk"=>$s->id])}}" method="POST">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="btn btn-danger">Odbij</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>


@endsection
