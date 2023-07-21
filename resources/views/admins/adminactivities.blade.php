@extends('layouts.layout2admin')

@section('title')
    {{'Aktivnosti'}}
@endsection



@section('main')
    <div class="fontsizemoj col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="show-top-grids">
            {{-- base--}}

            <div class="main-grids about-main-grids text-center">
                <h1>Aktivnosti korisnika na sajtu </h1>
                {{--base--}}
            </div>


            <div class="main-grids about-main-grids text-center">
                <label>Od:</label>
                <input type="date" id="od" />

                <label>Zakljucno sa:</label>
                <input type="date" id="do" />

                <div class="aligg">
                    <input type="button" class="dugme" id="filtriraj" value="Filtriraj" />
                </div>

            </div>



            <div class="main-grids about-main-grids ptt2 pbb2 pbb" id="ispisaktivnosti">


                <table class="table table-striped pbb2 pbb ">
                    <thead>
                    <tr>
                        <th>username</th>
                        <th>mejl</th>
                        <th>aktivnost</th>
                        <th>datum aktivnosti</th>
                    </tr>
                    </thead>


                    <tbody>
                        @foreach($activities as $a)
                            <tr>
                                <td>{{$a->username}}</td>
                                <td>{{$a->email}}</td>
                                <td>{{$a->activity}}</td>
                                <td>{{$a->activity_at}}</td>

                            </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>



        </div>
    </div>


@endsection
