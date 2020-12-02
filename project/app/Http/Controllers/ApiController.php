<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 

use Illuminate\Support\Facades\Auth; 
use Validator;

use Illuminate\Support\Facades\Storage;


use App\User;
use App\Models\Currency;


use DB;

use App\Http\Requests\PayUmoneyHashRequest;


class ApiController extends Controller 
{

    public $successStatus = 200;

    #**********************************************#

    function generateRandomString() {

    $length = 5;
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    }

    #**********************************************#

    public function login(Request $request){ 
		//print_R('ddd');die;
        $validator = Validator::make($request->all(), [ 

            'email' => 'required', 
            'password' => 'required', 
            'device_type' => 'required', 
            'device_id' => 'required', 
        ]);

        if ($validator->fails()) { 
            return response()->json(['status' => 0,'error'=>$validator->errors()], 401);   
        }

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['status' => 1,'success' => $success], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['status' => 0,'error'=>'Unauthorised'], 401); 
        } 
    }

    #**********************************************#

    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            //'type' =>'required|numeric',
            //'referral_code' =>'required',
            'name' => 'required', 
            'email' => 'required|email|unique:users', 
            'phone_no' => 'required|min:10|numeric|unique:users',
            'password' => 'required', 
            'c_password' => 'required|same:password',
            'device_type' => 'required', 
            'device_id' => 'required', 
        ]);

        if ($validator->fails()) { 
            return response()->json(['status' => 0,'error'=>$validator->errors()], 401);   
        }

        $input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $input['is_admin'] = 2;
        $input['image'] = 'default.png';

        //print_R($input);die;
        $user = User::create($input); 
        $success['token'] =  $user->createToken('MyApp')-> accessToken; 
        $success['name'] =  $user->name;
        return response()->json(['status' => 1,'success'=>$success], $this-> successStatus); 
    }

    #**********************************************#

    public function getProfile() 
    { 
        $url = url('storage/app/images');

        $user = User::where(['id'=>Auth::user()->id])->select('id','name', 'email', 'phone_no', DB::raw("CONCAT('$url/', image) AS image"))->first();
        return response()->json(['status' => 1,'success' => $user], $this-> successStatus); 
    } 

    #**********************************************#

    public function getCurrency(Request $request) 
    { 
        $input = $request->all(); 
        $currency = Currency::select(array('id as CurrencyID','Value as Rate'))->paginate($input['page_size']);
        return response()->json(['status' => 1,'success' => $currency], $this-> successStatus); 
    } 

    #***********************************#

    
}