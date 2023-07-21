@extends('layouts.layout1')

@section('title')
    {{'Postani strimer'}}
@endsection


@section('main')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <div class="show-top-grids">
            {{-- base--}}

            <div class="main-grids about-main-grids">
                <h1>Postanite Streamer</h1>
                <p class="fontsizemoj">
                    Ukoliko zelite da postane streamer i da koristite ovu web aplikaciju u drugom svetlu
                    morate da se usaglasite sa nasim pravilima. Ukoliko se slazete aktivirajte vas nalog u strimer opciji.
                </p>
                <div class="fontsizemoj ptt2">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <form action="{{route('registerStreamer')}}" method='post'  >
                {{--Category to choose --}}
                <p class="fontsizemoj">
                    Odaberite Kategorije kojima pripada vas content, da bi vas korisnici lakse pronasli.
                </p>

                <div class="fontsizemoj ">

                    @foreach($categories as $c)

                        <input
                            @if(@old('kategorije') )
                                @foreach(@old('kategorije') as $oc)
                                    @if($c->id==$oc)
                                        {{'checked'}}
                                    @endif
                                @endforeach
                            @endif
                            name="kategorije[]"  id="kat-{{$c->id}}" type="checkbox" value="{{$c->id}}"
                        />

                        <label for="kat-{{$c->id}}"><span>{{$c->name_category}}  </span></label>
                        <br/>

                    @endforeach
                </div>

                {{--Challenges to choose --}}

                <p class="fontsizemoj ptt2">
                    Za pocetak odaberite 3 celendza i njihovu cenu u tokenima koje korisnici mogu da kupuju.
                </p>

                @for($i=0;$i<3;$i++)
                <div class="form-group challengeslg">
                    <input type="text" @if( @old('celendz'.strval($i+1))  ) value="{{@old('celendz'. strval($i+1)) }}"  @endif  placeholder="Naziv {{$i+1}}. celendza" class="form-control" name="celendz{{$i+1}}">
                    <input type="number"  @if( @old('cena'.strval($i+1)) ) value="{{@old('cena'. strval($i+1))  }}"  @endif placeholder="Cena u Tokenima" class="form-control" name="cena{{$i+1}}">
                </div>
                @endfor

                <div class="ptt2">

                    @csrf
                    @method('POST')
                   <input type="submit" class="dugme" value="Aktiviraj"/>
                </div>

                </form>


                {{--base--}}
            </div>

@endsection
