<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Settings\Company;
use App\Models\Settings\Branch;
use App\Http\Traits\ResponseTrait;
use App\Http\Requests\Authentication\SignupRequest;
use App\Http\Requests\Authentication\SigninRequest;
use App\Models\Erpuser;
use Illuminate\Support\Facades\Hash;
use Exception;
class AuthenticationController extends Controller
{
    use ResponseTrait;

    public function signUpForm(){
        return view('authentication.register');
    }

   
    public function signUpStore(SignupRequest $request){
        try{
            $user=new Erpuser;
            $user->name=$request->FullName;
            $user->contact_no=$request->PhoneNumber;
            $user->email=$request->EmailAddress;
            $user->password=Hash::make($request->password);
            $user->role_id=1;
            if($user->save())
                return redirect('/')->with($this->resMessageHtml(true,null,'Successfully Registred'));
            else
                return redirect('/')->with($this->resMessageHtml(false,'error','Please try again'));
        }catch(Exception $e){
            //dd($e);
            return redirect('/')->with($this->resMessageHtml(false,'error','Please try again'));
        }

    }

    public function signInForm(){
        return view('authentication.login');
    }

    public function signInCheck(SigninRequest $request){
        try{
            $user=Erpuser::where('contact_no',$request->PhoneNumber)->first();
            if($user){
                if(Hash::check($request->password , $user->password)){
                    $this->setSession($user);
                    return redirect()->route($user->role->identity.'.dashboard')->with($this->resMessageHtml(true,null,'Successfully login'));
                }else
                    return redirect()->route('login')->with($this->resMessageHtml(false,'error','Your phone number or password is wrong!'));
            }else
                return redirect()->route('login')->with($this->resMessageHtml(false,'error','Your phone number or password is wrong!'));
        }catch(Exception $e){
            //dd($e);
            return redirect()->route('login')->with($this->resMessageHtml(false,'error','Your phone number or password is wrong!'));
        }
    }

    public function setSession($user){
        return request()->session()->put(
                [
                    'userId'=>encryptor('encrypt',$user->id),
                    'userName'=>encryptor('encrypt',$user->name),
                    'role'=>encryptor('encrypt',$user->role->type),
                    'roleIdentity'=>encryptor('encrypt',$user->role->identity),
                    'language'=>encryptor('encrypt',$user->language),
                    'image'=>encryptor('encrypt',$user->image)
                ]
            );
    }

    public function singOut(){
        request()->session()->flush();
        return redirect('/')->with($this->resMessageHtml(false,'error',currentUserId()));
    }
}
