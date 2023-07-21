<?php

namespace App\Http\Controllers;

use App\Models\AppUsers;
use App\Models\LiveStream;
use App\Models\User;
use App\Models\UserFollow;
use App\Models\UserStreamer;
use Illuminate\Http\Request;
USE App\Models\UserStreamerChallenge;
use App\Models\LiveStreamComment;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Log;

class OneLiveStreamController extends Controller
{

    public function price($id){


        if($id==0) return 0;
        return UserStreamerChallenge::where('id',$id)->first();


    }

    public function donate(Request $request) {

       $now=date('Y-m-d H:i:s');

       $por=$request->post('poruka');
       $idcelendz=$request->post('idcelendz');
       $idlajv=$request->post('idlajv');
       $idstrimer=$request->post('idstrimer');
       $iduser=$request->post('iduser');
       $tokeni=$request->post('tokeni');


       if(!$tokeni) $tokeni=null;
       if(!$idcelendz) $idcelendz=null;

       if($idcelendz){
            $cel=UserStreamerChallenge::Find($idcelendz);
            $tokeni=$cel->price;
       }

       $app_user=AppUsers::Find($iduser);
       if($app_user->tokens_available <= $tokeni){
           $poruka=[ 'porukauspeh'=>"Nemate dovoljno tokena, vase stanje je " . $app_user->tokens_available . ". 1 token morate ostaviti minimnalno na racunu. Dodajte jos tokena" ];

           return response()->json($poruka);
       }


        try{
            LiveStreamComment::create([
               'app_user_id'=>$iduser,
               'user_streamer_id'=>$idstrimer,
               'live_stream_id'=>$idlajv,
               'user_streamer_challenge_id'=>$idcelendz,
               'tokens'=>$tokeni,
               'comment'=>$por,
               'commented_at'=>$now,
            ]);

            $user= AppUsers::Find($iduser);
            $stara= intval($user->tokens_available);
            $minus= intval($tokeni);
            $nova=$stara-$minus;

            $user->tokens_available=$nova;
            $user->save();

            $request->session()->get('user')->tokens_available=$user->$nova;


            $objj=new LiveStreamComment();
            $sviKomentari=$objj->VratiSveZaIspis($idlajv);

            $response=[
                "porukauspeh"=>"Uspesno.",
                "stanjeUsera"=>$nova,
                "comments"=>$sviKomentari,
            ];


            $user=$request->session()->get('user');
            $username=$user->username;
            $email=$user->email;

            Facade::ActivityLg('Komentarisao', $username, $email );

            return response()->json($response);
        }
        catch (\Exception $ex) {

           Log::error($ex->getMessage());
        }

    }


    public function follow(Request $request) {
        $iduser=$request->post('idUser');
        $idstreamer=$request->post('idStreamer');
        $idstream=$request->post('idStream');
        $now=date('Y-m-d H:i:s');


        if( AppUsers::Find($iduser) && UserStreamer::Find($idstreamer) && LiveStream::Find($idstream)  ) {

            try{

                $exits= UserFollow::where('app_user_id',$iduser)->where('user_streamer_id', $idstreamer)->first();

                if($exits) {
                    UserFollow::destroy($exits->id);
                    $broj=UserFollow::where('user_streamer_id', $idstreamer)->count();

                    $response=['poruka'=>'Zaprati' , 'pratioci'=>$broj, 'strim'=>$idstream];
                    return $response;  // jer je otpracen
                }
                else {
                    UserFollow::create([
                        'app_user_id'=>$iduser,
                        'user_streamer_id'=>$idstreamer,
                        'followed_at'=>$now,
                    ]);
                    $broj=UserFollow::where('user_streamer_id', $idstreamer)->count();

                    $response=['poruka'=>'Otprati', 'pratioci'=>$broj, 'strim'=>$idstream];
                    return $response;  // jer je zapracen

                }
            }
            catch (\Exception $ex) {
                Log::error($ex->getMessage());
                return view('error');
            }


        }

    }
}
