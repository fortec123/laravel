<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 

use Illuminate\Support\Facades\Auth; 
use Validator;

use Illuminate\Support\Facades\Storage;


use App\User;
use App\Models\Product;
use App\Models\ContactUs; 
use App\Models\Address;
use App\Models\Order; 
use App\Models\OrderDetail;
use App\Models\Category;
use App\Models\PromoCode;
use App\Models\Payment;
use App\Models\Ingredient;
use App\Models\Slider;

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

        $user = User::where(['id'=>Auth::user()->id])->with('address')->select('id','name', 'email', 'phone_no', DB::raw("CONCAT('$url/', image) AS image"))->first();
        return response()->json(['status' => 1,'success' => $user], $this-> successStatus); 
    } 

    #**********************************************#

    public function forgotPassword(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'email' => 'required|email', 
        ]);

        if ($validator->fails()) { 
            return response()->json(['status' => 0,'error'=>$validator->errors()], 401);   
        }

        $input = $request->all(); 
        $password = rand(11111111,99999999);
        $hashpassword = bcrypt($password);

        User::where('email', $input['email'])->update(['orignal_password' => $password,'password' => $hashpassword]);
        $result = array ('password'=>$password);

        return response()->json(['status' => 1,'success' => $result], $this-> successStatus); 
    } 

    #**********************************************#

    public function editProfile(Request $request) 
    { 

        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
        ]);

        if ($validator->fails()) { 
            return response()->json(['status' => 0,'error'=>$validator->errors()], 401);   
        }

        $input = $request->all(); 

        $user = User::find(Auth::user()->id);
        $user->name = $input['name'];

        
         if ($request->hasFile('image')) {

            if ($request->file('image')->isValid()) {


               /* $validated = $request->validate([
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);*/
                
                $extension = $request->image->extension();
                $image_name = time().".".$extension;
                $request->image->storeAs('/images', $image_name);

                $user->image = $image_name;

            }else{
               // $image_name ="default.png";
            }
        }else{
           // $image_name ="default.png";
        }

        $user->save();

        return response()->json(['status' => 1], $this-> successStatus); 
    } 

    #**********************************************#


    public function getAllProducts(Request $request) 
    { 

        $url = url('storage/app/images');

        $input = $request->all(); 

         $products =  Product::select(array('*', DB::raw("CONCAT('$url/', image) AS image")))
         ->where(['category_id'=>$input['category_id']])->paginate(10);

        return response()->json(['status' => 1,'success' => $products], $this-> successStatus); 
    } 


    #**********************************************#

    public function productDetail(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'product_id' => 'required', 
        ]);

        if ($validator->fails()) { 
            return response()->json(['status' => 0,'error'=>$validator->errors()], 401);   
        }

        $url = url('storage/app/images');

        $product = Product::select(array('*', DB::raw("CONCAT('$url/', image) AS image")))->where(['id'=>$request->product_id])->first();

        return response()->json(['status' => 1,'success' => $product], $this-> successStatus); 
    } 

     #**********************************************#

     public function contactUs(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'phone_no' => 'required|min:10|numeric',
            'description' => 'required', 
        ]);

        if ($validator->fails()) { 
            return response()->json(['status' => 0,'error'=>$validator->errors()], 401);   
        }

        $input = $request->all(); 
        
        ContactUs::create($input); 

        return response()->json(['status' => 1], $this-> successStatus); 
    }

    public function addAddress(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'phone_no' => 'required|min:10|numeric',
            'address' => 'required',
            'city' => 'required', 
            'state' => 'required',  
        ]);

        if ($validator->fails()) { 
            return response()->json(['status' => 0,'error'=>$validator->errors()], 401);   
        }

        $input = $request->all(); 
        $input['user_id'] = Auth::user()->id;
        
        Address::create($input); 

        return response()->json(['status' => 1], $this-> successStatus); 
    }


    public function editAddress(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'address_id' => 'required',
            'name' => 'required', 
            'phone_no' => 'required|min:10|numeric',
            'address' => 'required',
            'city' => 'required', 
            'state' => 'required',  
        ]);

        if ($validator->fails()) { 
            return response()->json(['status' => 0,'error'=>$validator->errors()], 401);   
        }

        $input = $request->all(); 
        
        //$address = new Address;

        $address = Address::find($input['address_id']);

        $address->user_id = Auth::user()->id;
        $address->name = $input['name'];
        $address->phone_no = $input['phone_no'];
        $address->address = $input['address'];
        $address->city = $input['city'];
        $address->state = $input['state'];

        $address->save();

        return response()->json(['status' => 1], $this-> successStatus); 
    }

    #**********************************************#


    public function deleteAddress(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'address_id' => 'required',
        ]);

        if ($validator->fails()) { 
            return response()->json(['status' => 0,'error'=>$validator->errors()], 401);   
        }

        $input = $request->all(); 

        $address = Address::find($input['address_id']);
        $address->delete();

        return response()->json(['status' => 1], $this-> successStatus); 
    }


    #**********************************************#

    public function placeOrder(Request $request) 
    { 

        $validator = Validator::make($request->all(), [ 
            'order' => 'required',
            'total' => 'required',
            'address_id' => 'required',
            'payment_mode' => 'required',
        ]);

        if ($validator->fails()) { 
            return response()->json(['status' => 0,'error'=>$validator->errors()], 401);   
        }

        $input = $request->all(); 


        if($request->has('promo_id') && !empty($request->input('promo_id'))) {
            $promo_id = $input['promo_id'];
        }else{
            $promo_id ="";
        }

        $data = array(
            'user_id'=>Auth::user()->id,
            'order'=>$input['order'],
            'total'=>$input['total'],
            'address_id'=>$input['address_id'],
            'promo_id'=>$promo_id,
        ); 

        $order = Order::create($data);
        $order_id = $order->id;

        $array = json_decode($input['order']);
  
        foreach($array as $array){
           
            $data1 = array(
                'order_id'=>$order_id,
                'product_id'=>$array->product_id,
                'price'=>$array->price,
                'quantity'=>$array->quantity,
                'subtotal'=>$array->price*$array->quantity,
            ); 

           $OrderDeatil = OrderDetail::create($data1);
            // print_r($data1);
        }


        if($request->has('transaction_id') && !empty($request->input('transaction_id'))) {
            $transaction_id = $input['transaction_id'];
        }else{
            $transaction_id ="";
        }

        $data2 = array(
                'order_id'=>$order_id,
                'amount'=>$input['total'],
                'transaction_id'=>$transaction_id,
                'mode'=>$input['payment_mode'],
            ); 

        $payment = Payment::create($data2);


        return response()->json(['status' => 1], $this-> successStatus); 
    } 

    #**********************************************#


    public function myOrders(Request $request) 
    {  

        //$orders = Order::where(['user_id'=>Auth::user()->id])->with('order_detail')->select('id','user_id','status')->get();


         //$orders = Order::where(['user_id'=>Auth::user()->id])->with('user')->get()->toArray();

         $orders =  Order::where(['user_id'=>Auth::user()->id])->with(array('user'=>function($query){
                $query->select('id','name');
        }))->select('id','total','status','user_id','created_at')->get();

        return response()->json(['status' => 1,'success' => $orders], $this-> successStatus); 
    } 

    #**********************************************#


     public function orderDetail(Request $request) 
    { 

        $validator = Validator::make($request->all(), [ 
            'order_id' => 'required',
        ]);

        if ($validator->fails()) { 
            return response()->json(['status' => 0,'error'=>$validator->errors()], 401);   
        }

        $input = $request->all();
    
        $orders =  Order::where(['id'=>$input['order_id']])
        ->with(array(
            'user'=>function($query){
                $query->select('id','name');
            },
            'delivery_address'=>function($query){
                $query->select('id','name','address','city','state','phone_no');
            },
            'order_detail'=>function($query){
                $query->select('product_id','order_id','quantity','subtotal');
            },
            'order_detail.products'=>function($query){

                $url = url('storage/app/images');
                $query->select(array('id','name', DB::raw("CONCAT('$url/', image) AS image")));

            }
        ))->select('id','total','status','user_id','address_id','created_at')->first();


         //$orders =   Order::with('order_detail:order_id,product_id','order_detail.products:id,name,CONCAT("ss",image) as img",'user:id,name')->first();


        return response()->json(['status' => 1,'success' => $orders], $this-> successStatus); 
    } 

    #**********************************************#

    public function checknumber(Request $request){ 

       // print_r('ffff');die;
        $validator = Validator::make($request->all(), [ 
            'phone_no' => 'required', 
        ]);

        if ($validator->fails()) { 
            return response()->json(['status' => 0,'error'=>$validator->errors()], 401);   
        }


        $input = $request->all(); 


        $user = User::where(['phone_no'=>$input['phone_no']])->select('id','name', 'email', 'phone_no')->first();

        if($user){
            return response()->json(['status' => 1,'success' => $user], $this-> successStatus); 
        } else{ 
            return response()->json(['status' => 0,'error'=>'Not Found'], 401); 
        } 
    }

    #**********************************************#



    public function updatePassword(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'user_id' => 'required',
            'password' => 'required', 
        ]);

        if ($validator->fails()) { 
            return response()->json(['status' => 0,'error'=>$validator->errors()], 401);   
        }

        $input = $request->all(); 
        
        //$address = new Address;


        $user = User::where(['id'=>$input['user_id']])->first();

        if($user){

            $hashpassword = bcrypt($input['password']);

            $user = User::find($input['user_id']);
            $user->password = $hashpassword;
            $user->save();

            return response()->json(['status' => 1], $this-> successStatus);  
        } else{ 
            return response()->json(['status' => 0,'error'=>'Not Found'], 401); 
        } 
  
    }

    #***********************************#

     public function getCategories() 
    { 

        //$category = Category::all();

          $url = url('storage/app/images');

         //$products =  Product::select(array('*', DB::raw("CONCAT('$url/', image) AS image")))->paginate(10);

        $category = Category::select(array('*', DB::raw("CONCAT('$url/', image) AS image")))->whereNull('category_id')->with('subcategory')->get();
        return response()->json(['status' => 1,'success' => $category], $this-> successStatus); 
    } 

    #************************************#


    public function getPromoCodes(Request $request) 
    { 
         $url = url('storage/app/images');

         $codes =  PromoCode::select(array('*', DB::raw("CONCAT('$url/', image) AS image")))->get();

        //$codes = PromoCode::all();
        return response()->json(['status' => 1,'success' => $codes], $this-> successStatus); 
    } 

    #************************************#

    public function checkPromoCode(Request $request) 
    { 

        //$user = User::where(['id'=>Auth::user()->id])->with('address')->select('id','name', 'email', 'phone_no')->first();

        $input = $request->all(); 
        //print_R($input['promo']);die;

         $code = PromoCode::where(['code'=>$input['promo']])->first();
        if($code){
            return response()->json(['status' => 1,'success' => $code], $this-> successStatus);
        }else{
             return response()->json(['status' => 0,'error'=>'Invalid Promo Code'], 401); 
        }
         
    } 

    #**********************************************#

    public function cancelOrder(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'order_id' => 'required'
        ]);

        if ($validator->fails()) { 
            return response()->json(['status' => 0,'error'=>$validator->errors()], 401);   
        }

        $input = $request->all(); 

        Order::where('id', $input['order_id'])->update(['status' => '4']);

        return response()->json(['status' => 1], $this-> successStatus); 
    } 


    #**********************************************#


    public function getRecommendedProducts(Request $request) 
    { 

        $url = url('storage/app/images');

        $input = $request->all(); 

         $products =  Product::select(array('*', DB::raw("CONCAT('$url/', image) AS image")))
         ->where(['is_recommended'=>2])->paginate(10);

        return response()->json(['status' => 1,'success' => $products], $this-> successStatus); 
    } 


      #**********************************************#


    public function getPopularProducts(Request $request) 
    { 

        $url = url('storage/app/images');

        $input = $request->all(); 

         $products =  Product::select(array('*', DB::raw("CONCAT('$url/', image) AS image")))
         ->where(['is_popular'=>2])->paginate(10);

        return response()->json(['status' => 1,'success' => $products], $this-> successStatus); 
    } 


    #**********************************************#


    public function getAllIngredients(Request $request) 
    { 

        $url = url('storage/app/images');

        $input = $request->all(); 

         $ingredients =  Ingredient::select(array('*', DB::raw("CONCAT('$url/', image) AS image")))->paginate(10);

        return response()->json(['status' => 1,'success' => $ingredients], $this-> successStatus); 
    } 

    #**********************************************#


    public function getToSaleProducts(Request $request) 
    { 

        $url = url('storage/app/images');

        $input = $request->all(); 

         $products =  Product::select(array('*', DB::raw("CONCAT('$url/', image) AS image")))
         ->whereNotNull('discount')->paginate(10);

        return response()->json(['status' => 1,'success' => $products], $this-> successStatus); 
    } 

    #**********************************************#


      public function getSliders(Request $request) 
    { 

        $url = url('storage/app/images');

        $input = $request->all(); 

         $sliders =  Slider::select(array('*', DB::raw("CONCAT('$url/', image) AS image")))->get();

        return response()->json(['status' => 1,'success' => $sliders], $this-> successStatus); 
    } 

    #**********************************************#

    public function getPayUmoneyHash(PayUmoneyHashRequest $request) 
    { 
        $input = $request->all(); 

        $key = $input['key'];
        $txnid = $input['txnid'];
        $amount = $input['amount'];
        $productinfo = $input['productinfo'];
        $firstname = $input['firstname'];
        $email = $input['email'];


        $hash = ApiController::makeHash($key, $txnid, $amount, $productinfo, $firstname, $email);

        $data = array('hash'=>$hash);

        return response()->json(['status' => 1,'success' => $data], $this-> successStatus);

       /* $MERCHANT_KEY = "QFp54ccl"; 
        $SALT = "PZ8ZIAhydi"; 

        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
      
        $hash = '';
        $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
  
        $hashVarsSeq = explode('|', $hashSequence);
        $hash_string = '';  
        foreach($hashVarsSeq as $hash_var) {
            $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
            $hash_string .= '|';
        }
        $hash_string .= $SALT;

        $hash = strtolower(hash('sha512', $hash_string));

        //print_R($hash);die;

        $data = array('hash'=>$hash);

        return response()->json(['status' => 1,'success' => $data], $this-> successStatus); */
    } 


    function makeHash($key, $txnid, $amount, $productinfo, $firstname, $email){
        $salt = "seVTUgzrgE"; //Please change the value with the live salt for production environment
     
        $payhash_str = $key . '|' . ApiController::checkNull($txnid) . '|' . ApiController::checkNull($amount) . '|' . ApiController::checkNull($productinfo) . '|' . ApiController::checkNull($firstname) . '|' . ApiController::checkNull($email) . '|||||||||||' . $salt;
     
        $hash = strtolower(hash('sha512', $payhash_str));
        return $hash;
    }
 
    function checkNull($value)
    {
        if ($value == null) {
            return '';
        } else {
            return $value;
        }
    }
 


    #**********************************************#
}