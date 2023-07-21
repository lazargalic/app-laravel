<div class="col-md-3 mb resent-grid recommended-grid slider-top-grids">
    <div class="resent-grid-img recommended-grid-img">
        <a href="{{ route('one', ['id'=>$l->id] ) }}"><img class="slikaa2" src=" {{ asset('/sajtlaravel/images/mojeslike/'.$l->thumbnail_picture) }}" alt="" /></a>
        <div class="time">
            <p>Live</p>
        </div>
        <div class="clck">
            <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
        </div>

    </div>
    <div class="resent-grid-info recommended-grid-info mojd ">
        @foreach($l->userStreamer->categories as $c)
            <p class="right-list"><p class="views views-info bojamoja">    {{$c->name_category}}         </p></p>
        @endforeach
    </div>

    <div class="resent-grid-info recommended-grid-info ">


        <ul>
            <li><p class="author author-info">

                    <a href="#" class="author">
                        {{$l->userStreamer->appUser->first_name}} {{$l->userStreamer->appUser->last_name}}
                    </a></p></li>
            <li class="right-list"><p class="views views-info">Pratioci: {{$l->userStreamer->numberfollowers($l->userStreamer->id) }}</p></li>
            <p class="views views-info mojd ptt3">{{$l->userStreamer->appUser->countrr->name_country}}</p>
            <p class="views views-info mojd ptt3"> Poceo: {{$l->started_at}} </p>

        </ul>

    </div>
</div>
