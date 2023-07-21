@extends('layouts.layout2admin')


@section('title')
    {{'Kategorije'}}
@endsection


@section('main')
    <div class="fontsizemoj col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="show-top-grids">
            {{-- base--}}

            <div class="main-grids about-main-grids text-center">
                <h1>Kategorije</h1>
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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                <table class="table table-striped ">
                    <thead>
                    <tr>
                        <th>Naziv Kategorije</th>
                        <th>Obrisi Kategoriju</th>
                    </tr>
                    </thead>

                    <tbody>
                      @foreach($categories as $c)
                          <tr>
                              <td>{{$c->name_category}}</td>
                              <td>
                                  <form action="{{route('admindeletecat',['id'=>$c->id])}}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger">Obrisi</button>

                                  </form>

                              </td>
                          </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>

            <div class="main-grids about-main-grids text-center">
                <h2>Dodaj novu Kategoriju</h2>
            </div>

            <div class="main-grids about-main-grids">
                <form action="{{route('admincreatecat')}}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="text" name="cateogoryname" placeholder="Ime Kateogorije" />
                    <input class="btn btn-primary" type="submit" value="Dodaj Kategoriju">

                </form>
            </div>

        </div>
    </div>


@endsection
