<?php

namespace App\Http\Controllers;

use App\Models\AppUsers;
use App\Models\UserFollow;
use App\Models\UserStreamer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MyFollowsController extends Controller
{
    //
    public function index(Request $request){

        $userId=$request->session()->get('user')->id;
        return view('users.myfollow', ['streamerFollowing'=> UserFollow::where('app_user_id', $userId)->get() ]);

    }

    public function destroy($iduser, $idstreamer) {


        if(AppUsers::Find($iduser) && UserStreamer::Find($idstreamer)) {

            try{

                $row=UserFollow::where('app_user_id',$iduser)->where('user_streamer_id', $idstreamer)->first();

                UserFollow::destroy($row->id);

                return redirect()->back()->with('message', 'Uspesno otpraceno.');
            }
            catch (\Exception $ex){
                Log::error($ex->getMessage());
                return view('error');
            }
        }

    }
}
