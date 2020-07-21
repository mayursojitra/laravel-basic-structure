<?php

namespace App\Http\Controllers\Api;

use Auth;
use Validator;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function verifyUser(){
        echo "verifyUser";
    }

    public function register(Request $request){
        $res = array();

        $messages = [
            'name.required' => 'Please enter your name',
            'mobile.required' => 'Please enter valid mobile number',
            'password.required' => 'Please enter password',
            'imei_no.required' => 'You device is not authorized'
        ];

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'mobile' => 'required',
            'password' => 'required',
            'imei_no' => 'required',
        ]);

        if($validator->fails()){
            $error = $validator->errors()->first();
            $res['error_code'] = 400;
            $res['error_msg'] = $validator->errors()->first();
            return json_encode($res);
        }

        $user = User::where('mobile',$request->mobile)
                        ->first();
        if($user){
            if($user->status == "disable"){
                if($user->otp != NULL){

                    $user->otp = rand(111111,999999);
                    $user->save();

                    $res['error_code'] = 200;
                    $res['error_msg'] = "Your registration successfull!!!";
                    $res['user_id'] = $user->id;
                    return json_encode($res);
                }else{
                    $res['error_code'] = 400;
                    $res['error_msg'] = "Mobile number already registered!!!";
                    return json_encode($res);
                }
            }else{
                $res['error_code'] = 400;
                $res['error_msg'] = "Mobile number already registered!!!";
                return json_encode($res);
            }
        }else{
            $params = array(
                'name' => $request->name,
                'email' => $request->mobile."@mindmaster.in",
                'mobile' => $request->mobile,
                'password' => bcrypt($request->password),
                'status' => 'active'
            );

            $user = User::create($params);

            $res['error_code'] = 200;
            $res['error_msg'] = "Your registration successfull!!!";
            $res['user_id'] = $user->id;
            return json_encode($res);
        }
    }

    public function forgotPassword(){
        echo "forgotPassword";
    }

    public function resetPassword(){
        echo "resetPassword";
    }

    public function login(Request $request){

        $res = array();

        $messages = [
            'mobile.required' => 'Please enter valid mobile number',
            'password.required' => 'Please enter password',
            'imei_no.required' => 'You device is not authorized'
        ];

        $validator = Validator::make($request->all(),[
            'mobile' => 'required',
            'password' => 'required',
            'imei_no' => 'required',
        ]);

        if($validator->fails()){
            $error = $validator->errors()->first();
            $res['error_code'] = 400;
            $res['error_msg'] = $validator->errors()->first();
            return json_encode($res);
        }

        if(Auth::attempt(['mobile' => $request->mobile, 'password' => $request->password,'status' => 'active'])){
            $user = Auth::user();
            if($user->imei_no == NULL || $user->imei_no == $request->imei_no){
                $user->imei_no = $request->imei_no;

                if($request->gcm_token)
                    $user->gcm_token = $request->gcm_token;

                $user->save();

                $user->token = $user->createToken("BrrainoThon")->accessToken;
                
                unset($user->email_verified_at);
                unset($user->api_token);
                unset($user->forgot_token);

                if($user->dob == null){
                    $user->dob = "";
                }

                if($user->profile_photo == null){
                    $user->profile_photo = "";
                }
                    

                $res['error_code'] = 200;
                $res['error_msg'] = "";
                $res['user'] = $user;

                return json_encode($res);

            }else{
                $res['error_code'] = 400;
                $res['error_msg'] = "You device is not authorized. Please contact to administrator.";
                return json_encode($res);
            }
        }else{
            $res['error_code'] = 400;
            $res['error_msg'] = "Mobile or Password are incorrect!!!";
            return json_encode($res);
        }
    }
}
