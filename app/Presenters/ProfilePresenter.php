<?php


namespace App\Presenters;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfilePresenter
{

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return $this->{"$name"};
    }

    /**
     * @return string
     */
    public function id(){
        return Auth::user()->profile->id??'';
    }

    /**
     * @return string
     */
    public function email(){
        return Auth::user()->email??'';
    }
    /**
     * @return string
     */
    public function name(){
        return Auth::user()->first_name??'';
    }

    /**
     * @return string
     */
    public function nickname(){
        return Auth::user()->profile->nickname??'';
    }

    /**
     * @return string
     */
    public function plan(){
        return Auth::user()->profile->plan->label??'';
    }


    /**
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user(){
        return Auth::user();
    }

    /**
     * @return string
     */
    public function biography(){
        return Auth::user()->profile->biography??'';
    }

    /**
     * @param $attachment
     * @return bool
     */
    public function verifyIdentify($attachment){
        if(!is_null($attachment)){
            if(Str::contains($attachment->verify_identify??'', 'accept') && Str::contains($attachment->verify_address??'', 'accept')){
                return true;
            }
        }
        return false;
    }

    /**
     * @param $json
     * @param $key
     * @param $value
     * @return bool
     */
    public function inJson($json, $key, $value){
        return is_null(collect($json)->where($key, $value)->first())?false:true;
    }

}
