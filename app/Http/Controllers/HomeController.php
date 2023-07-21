<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilteringRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\LiveStream;
use App\Models\UserFollow;
use Illuminate\Http\Request;
use App\Models\UserStreamer;

use App\Models\LiveStreamComment;

use Illuminate\Support\Facades\DB;
use App\Models\AppUsers;
use App\Models\Country;
use App\Models\Category;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Facade;

class HomeController extends MyController
{

    public function index(FilteringRequest $request)
    {
        //dd($lives->livesPagination());

        $data=null;
        $data=$request->only('kategorije','reci', 'drzava', 'datum');


        $nowLiveStream=LiveStream::where('finished_at', null);

        if( isset($data['drzava']) && $data['drzava']!=0 ) {
            $drzava = $data['drzava'];


            $nowLiveStream = LiveStream::where('finished_at', null)
                ->whereHas('userStreamer.appUser', function ($query) use ($drzava) {
                    $query->where('app_users.country_id', $drzava);

                });

           // dd($nowLiveStream->get());
        }

        if( isset($data['kategorije']) && count($data['kategorije'])!=0 ) {
            $categories = $data['kategorije'];

            $nowLiveStream = $nowLiveStream
                ->whereHas('userStreamer.categories', function ($query) use ($categories) {
                    $query->whereIn('categories.id', $categories);

                });
        }

        if( isset($data['reci']) ) {
            $keyword = $data['reci'];

            $nowLiveStream = $nowLiveStream
                ->whereHas('userStreamer.appUser', function ($query) use ($keyword) {
                    $query->where('app_users.first_name', '%' . $keyword .'%')
                          ->orWhere('app_users.last_name', 'LIKE', '%'.$keyword.'%')
                          ->orWhere('app_users.username', 'LIKE', '%'.$keyword.'%');

                });
        }

        if( isset($data['datum']) ) {

            $datum=$data['datum'];

            if($datum==1) {
                $nowLiveStream=$nowLiveStream->orderBy('started_at');
            }
            if($datum==2) {
                $nowLiveStream=$nowLiveStream->orderByDesc('started_at');
            }


        }


        $nowLiveStream=$nowLiveStream->paginate(4);



        return view('users.home', [
            'countries'=>Country::all(),
            'categories'=>Category::where('deleted_at',null)->get(),
            'lives'=>$nowLiveStream,
            'data'=>$data
        ]);
    }

    public function login(LoginRequest $request){

        $email=$request->input('email');
        $password=$request->input('password');

        try{
            $obj= new AppUsers();

            $user=$obj->login($email,$password);
            if($user && $user->role_id==2){
                $user->isAdmin='admins';
                $user->streamer=false;

            }

            $str=$user->isStreamer;

            if(!empty($str[0]->id)){
                $user->streamer=$str[0];
                // dd($user->streamer->id); moze ovako da mu se pristupa
            }

            //dd($user->streamer->id);

            $request->session()->put('user', $user);
            // dd($user->streamer);
            $request->session()->put('goodlogin', $user);
            //dd($user);



            //Activities

            $user=$request->session()->get('user');
            $username=$user->username;
            $email=$user->email;

            Facade::ActivityLg('Logovanje', $username, $email );


            return redirect()->route('home');
        }
        catch(\Exception $ex){

            Log::error($ex->getMessage());

            $request->session()->put('badlogin', 'Doslo je do greske prilikom logovanja. Proverite kredencijale za unos. ');

            return redirect()->route('home');
        }


    }

    public function store(RegisterRequest $request)
    {

        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $username = $request->input('username');
        $mobile = $request->input('mobile');
        $gender = $request->input('gender');
        $country = $request->input('country');
        $password = md5($request->input('password'));

        $now=date('Y-m-d H:i:s');

        //log fajl, sesija ako je uspesno

        try{
            AppUsers::create([
                    'first_name'=>$firstname,
                    'last_name'=>$lastname,
                    'email'=>$email,
                    'username'=>$username,
                    'mobile'=>$mobile,
                    'password'=>$password,
                    'gender_id'=>$gender,
                    'role_id'=>1,
                    'country_id'=>$country,
                    'tokens_available'=>200,
                    'last_view'=>0,
                    'created_at'=>$now,
                    'last_updated_at'=>null,
                    'deleted_at'=>null,
                ]
            );

            $request->session()->put('uspesnaregistracija','Uspesno ste se registrovali. Ulogujte se.');



            Facade::ActivityLg('Registracija', $username, $email );

            return redirect()->route('home');

        }
        catch (\Exception $ex){

            Log::error($ex->getMessage());

            return view ('error');
        }


    }

    public function logout(Request $request, $id=null){

        try {
            // $user=$request->session()->get('user');

            $now=date('Y-m-d H:i:s');

            if($id){
                $liveStream=LiveStream::Find($id);
                $liveStream->finished_at=$now;
                $liveStream->save();
            }

            $user=$request->session()->get('user');
            $username=$user->username;
            $email=$user->email;

            Facade::ActivityLg('Odjava', $username, $email );

            $request->session()->remove('user');

            return redirect()->route('home');
        }
        catch (\Exception $ex){

            Log::error($ex->getMessage());
            return redirect()->route('home');
        }


    }

    public function show($id=null, Request $request)
    {
        $usrid = null;
        if ($request->session()->has('user') ) {
            $usrid = $request->session()->get('user')->id;

            $user = AppUsers::Find($usrid);

            $request->session()->get('user')->tokens_available=$user->tokens_available;



        }

        $lajv=LiveStream::where('id', $id)->first();

        $strimer=$lajv->user_streamer_id;

        return view('users.single', [
            'countries'=>Country::all(),
            'single'=> $lajv,
            'sviKomentari'=>LiveStreamComment::Where('live_stream_id', $id)->get()->sortByDesc('commented_at'),
            'pratioci'=>UserFollow::where('user_streamer_id',$strimer)->get(),
            'prati'=> DB::table('user_follows')->where('app_user_id', $usrid )
                                                    ->where('user_streamer_id', $strimer)->count()
            ]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }


}
