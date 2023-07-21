<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterStreamerRequest;
use App\Models\AppUsers;
use Illuminate\Http\Request;

use App\Models\UserStreamer;
use App\Models\LiveStream;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use function Psy\debug;
use App\Models\UserStreamerChallenge;
use App\Models\UserStreamerCategories;


class StreamNowController extends Controller
{
    //

    public function index(Request $request){

        $id= $request->session()->get('user')->id;

        $streamer= UserStreamer::where('app_user_id', $id)
            ->where('deleted_at', null)->first();

        if(!$streamer){
            return view('users.streamNowRegister', [
                'categories'=>Category::where('deleted_at', '=', null)->get()
            ]);
        }

        return view('users.startStream');

    }

    public function create(RegisterStreamerRequest $request){

        try{
            $id= $request->session()->get('user')->id;
            $now=date('Y-m-d H:i:s');

            $userStreamer=UserStreamer::create([
                'app_user_id'=>$id,
                'started_at'=>$now,
                'deleted_at'=>null
            ]);

            $userStreamerId=$userStreamer->id;

            $categories=$request->input('kategorije');
            $challenge1=$request->input('celendz1');
            $challenge2=$request->input('celendz2');
            $challenge3=$request->input('celendz3');
            $price1=$request->input('cena1');
            $price2=$request->input('cena2');
            $price3=$request->input('cena3');

            $prices=[$price1, $price2, $price3];
            $challenges=[$challenge1, $challenge2, $challenge3];


            for($i=0;$i<3;$i++){
                UserStreamerChallenge::create([
                    'user_streamer_id'=>$userStreamerId,
                    'name_challenge'=>$challenges[$i],
                    'price'=>$prices[$i],
                    'created_at'=>$now,
                    'deleted_at'=>null
                ]);
            }

            for($i=0;$i<count($categories);$i++) {
                    UserStreamerCategories::create([
                        'category_id'=>$categories[$i],
                        'user_streamer_id'=>$userStreamerId,
                        'user_streamer_id'=>$userStreamerId,
                        'added_at'=>$now
                ]);
            }

            return back()->with('message', 'Cestitamo, postali ste streamer. Iskoristite ovu opciju i njegove funkcionalnosti');

        }
        catch (\Exception $ex) {
            Log::error($ex->getMessage());

            return view('error');
        }


    }

    public function createnewstream(Request $request){

        try{

        $iduser=session()->get('user')->id;

        $picture=$request->file('slika');
        $picturename=null;

        if(!$picture){
            $picturename='livepic.png';
        }
        else{

            $ext=['jpg', 'jpeg', 'png', 'gif'];
            if( !in_array($picture->getClientOriginalExtension(), $ext) ){
                return redirect()->back()->with('message', 'Slika mora biti u formatu png, jpg, jpeg ili gif formatu, probajte ponovo. ');

            }
            else{
                $picturename=$picture->getClientOriginalName(). time() . '.' . $picture->getClientOriginalExtension();

                $picture->move(public_path() . "/sajtlaravel/images/mojeslike/", $picturename);
            }

        }



        $user=AppUsers::Find($iduser);

        $str=$user->isStreamer;
        $user->streamer=$str[0];

        //dd($user);

        $request->session()->put('user', $user);

        $streamerid=$user->streamer->id;

        $now=date('Y-m-d H:i:s');





            $liveStream=LiveStream::create([
                'user_streamer_id'=>$streamerid,
                'started_at'=>$now,
                'finished_at'=>null,
                'thumbnail_picture'=>$picturename
            ]);

            $user= $request->session()->get('user');

            $user->isActiveStream=$liveStream->id;

            //dd($user->streamer);

            return back()->with('message', 'Vas strim je poceo, pritisnite na dugme zaustavi da biste ga zaustavili ');

        }
        catch (\Exception $ex) {
            Log::error($ex->getMessage());

            return view('error');
        }


    }


    public function endlivestream($id, Request $request){

      $now=date('Y-m-d H:i:s');
      $livestream= LiveStream::find($id);

      $livestream->finished_at=$now;

      $livestream-> save();

      $user= $request->session()->get('user');

      $user->isActiveStream=false;

      return redirect()->back()->with('message', 'Live Stream je uspesno zavrsen.');




    }

}
