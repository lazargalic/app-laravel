<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCategoryRequest;
use App\Models\AppUsers;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use App\Models\UserBuyingToken;
use App\Models\ActivityModel;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admins.admin');
    }

    public function categories(){
        return view('admins.admincategories', ['categories'=>Category::where('deleted_at', '=', null)->get()]);
    }

    public function destroycat($id){

        $now=date('Y-m-d H:i:s');

        $cat=Category::Find($id);

        $cat->deleted_at=$now;

        $cat->save();

        return back()->with('message', 'Uspesno ste obrisali kategoriju.');
    }

    public function createcat(AddCategoryRequest $request){


        $cat=$request->input('cateogoryname');

        try{

            Category::create([
                'name_category'=>$cat,
                'deleted_at'=>null
            ]);

            return back()->with('message', 'Uspesno ste dodali kategoriju.');

        }
        catch (\Exception $ex){
            Log::error($ex->getMessage());
            return back()->with('errmessage', 'Doslo je do greske.');
        }
    }

    public function admintokens(){
            return view('admins.admintokens', [ 'statuses'=>UserBuyingToken::where('status',0)->where('admin_refused_at', null)->get()]);
    }

    public function convertToken($id_user, $tokens, $id_bytk){

        try{
            $user=AppUsers::Find($id_user);

            $newvalue=intval($tokens)+intval($user->tokens_available);
            //dd($newvalue);

            $user->tokens_available=$newvalue;
            $user->save();

            $payment=UserBuyingToken::Find($id_bytk);
            $payment->status=1;
            $now=date('Y-m-d H:i:s');
            $payment->admin_convert_at=$now;

            $payment->save();

            return back()->with('message', 'Uspesno ste prebacili tokene.');
        }
        catch (\Exception $ex){

            Log::error($ex->getMessage());

            return back()->with('errmessage', 'Doslo je do greske, prilikom konvertovanja, proverite Log Fajl.');
        }

    }

    public function refusetoken($id){

        $now=date('Y-m-d H:i:s');

        $usrby= UserBuyingToken::Find($id);

        $usrby->admin_refused_at=$now;

        $usrby->save();

        return redirect()->back()->with('message', 'Odbili ste zahtev za konvertovanje tokena');
    }


    public function activities(){

        return view('admins.adminactivities',['activities'=>ActivityModel::all()]);

    }

    public function activitiesFilter(Request $request){

        $od=$request->post('datumod');
        $do=$request->post('datumdo');

        $all=ActivityModel::where('activity_at', '>', $od)->where('activity_at', '<', $do)->get();
        $response=['activities'=> $all];

        return $response;

    }

    public function usersadmins(){
        return view('admins.adminusers', ['users'=>AppUsers::where('deleted_at','=', null)->get()]);
    }

    public function changerole(Request $request){

        $iduser=$request->post('idkor');
        $nowrole=$request->post('uloga');
        $nova=0;

        if($nowrole == 1 || $nowrole ==2) {

            //provera i da l postoji id u bazi al verujemo adminu

            if($nowrole==1) { $nova=2; $forfront='admin'; };
            if($nowrole==2) { $nova=1; $forfront='user'; };

            $user=AppUsers::Find($iduser);

            $user->role_id=$nova;
            $user->save();

            $response=['idkor'=>$iduser, 'naziv'=>$forfront, 'trenutno'=>$nova];

            return $response;
        }

    }

    public function deleteuser(Request $request) {

        try{

            $now=date('Y-m-d H:i:s');
            $id=$request->post('id');

            $user=AppUsers::Find($id);

            $user->deleted_at=$now;
            $user->save();

            return $user->id;

        }catch (\Exception $ex) {
            Log::error($ex->getMessage());

            return view('error');
        }
    }


}
