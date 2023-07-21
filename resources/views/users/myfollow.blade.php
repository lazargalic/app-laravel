@extends('layouts.layout1')

@section('title')
    {{'Pratim'}}
@endsection

@section('main')

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="show-top-grids pll">
            <div class="main-grids news-main-grids ">
                <div class="recommended-info pll">
                    <h3 class="podnaslov">Pratite: </h3>

                    @if( session()->get('message'))
                        <div class="alert fontsizemoj alert-success ">
                            {{session('message')}}
                        </div>
                    @endif


                    @if(!count($streamerFollowing))
                        <div class="alert fontsizemoj alert-info ">
                            {{'Ne pratite nikoga.'}}
                        </div>
                    @else

                    @foreach($streamerFollowing as $s)

                    <div class="history-grids">
                        <div class="col-md-1 history-left">
                            <p class="fontsizemali">{{$s->followed_at}}</p>
                        </div>
                        <div class="col-md-11 history-right">
                            <h5 class="bojamoja">{{$s->userStreamers->appUser->username}}</h5>
                            <h5 class="bojamoja fontsizemali">{{$s->userStreamers->appUser->email}}</h5>
                            <h5 class="bojamoja fontsizemali">{{$s->userStreamers->appUser->first_name}} {{$s->userStreamers->appUser->last_name}}</h5>

                            @foreach($s->userStreamers->categories as $c)
                            <p>{{$c->name_category}}</p>
                            @endforeach

                        </div>

                        <div class="col-md-10 history-right">
                            <form action="{{route('otprati', ['iduser'=>session()->get('user')->id, 'idstreamer'=>$s->user_streamer_id ])}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="dugme zaprati btn-xs " id="zaprati {{$s->id}}"
                                        idStreamer="{{$s->user_streamer_id}}"
                                        idUser="{{session()->get('user')->id}}"
                                >
                                    Otprati
                                </button>
                            </form>
                        </div>



                        <div class="clearfix"> </div>
                    </div>

                    @endforeach
                    @endif

                </div>
            </div>

        </div>


@endsection
