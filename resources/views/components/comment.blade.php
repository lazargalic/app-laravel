<div class="media">

    <div class="media-left">
        <a>
            <h5 class="bojamoja">{{$s->appUser->username}}</h5>
        </a>
    </div>
    <div class="media-body">
        <p> {{$s->comment}}</p>
        @if($s->tokens)
            <p class="bojamoja"> {{$s->tokens}} tokena

                @if($s->challenges)
                    ~ {{$s->challenges->name_challenge}}
                @endif
            </p>
        @endif

    </div>
</div>
