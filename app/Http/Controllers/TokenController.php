<?php

namespace App\Http\Controllers;

use App\Http\Requests\TokenRequest;
use App\Models\AppUsers;
use Illuminate\Http\Request;

use App\Models\UserBuyingToken;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Log;

class TokenController extends MyController
{
    //
    public function index(Request $request){

        $id=$request->session()->get('user')->id;
        //dd($id);

        $token=AppUsers::where('id',$id)->first();

//        dd($token);

        return view('users.token', ['token'=>$token]);

    }

    public function store(TokenRequest $request){

        $userId=AppUsers::Find($request->session()->get('user')->id)->id;
        $tokenstoadd=$request->post('brojtokena');
        $now=date('Y-m-d H:i:s');

        try{
            UserBuyingToken::create([
               'app_user_id'=>$userId,
               'bought_tokens'=>$tokenstoadd,
               'bought_at'=>$now,
                'admin_convert_at'=>null,
                'status'=>0,
                'admin_refused_at'=>null,
            ]);

            $user=$request->session()->get('user');
            $username=$user->username;
            $email=$user->email;

            Facade::ActivityLg('Dodao Tokene', $username, $email );


            return back()->with('message',
                'Uspesno ste dodali tokene, administrator ce proknjiziti vasu uplatu u najkracem periodu i konvertovace tokene.');
        }
        catch (\Exception $ex){

            Log::error($ex->getMessage());

            return back()->with('errmessage',
                'Doslo je do greske, obratite se administratoru.');
        }


        return redirect()->back();

    }

}
