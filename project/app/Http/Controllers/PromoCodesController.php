<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\PromoCode;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\PromoCodeRequest;

use DB;

class PromoCodesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $data = PromoCode::get()->toArray();
        //dd(json_encode($data));
        return view('promocodes.list')->with(['data'=>$data]);
        
    }

    public function create()
    {
        return view('promocodes.add');
    }


    public function store(PromoCodeRequest $request)
    {

    ///dd($request->file('image'));
        if ($request->hasFile('image')) {

            if ($request->file('image')->isValid()) {


               /* $validated = $request->validate([
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);*/
                
                $extension = $request->image->extension();
                $image_name = time().".".$extension;
                $request->image->storeAs('/images', $image_name);
            }else{
                $image_name ="default.png";
            }
        }else{
            $image_name ="default.png";
        }


         $data = array(
            'code'=>$request->code,
            'discount'=>$request->discount,
            'image'=>$image_name,
        );

        PromoCode::create($data);
        
        return redirect('promocodes')->with('success', 'PromoCode Added Successfully.');
    }


    public function show($id)
    {
        //dd('hfgh');
    }

    public function edit($id)
    {
        
         $url = url('storage/app/images');
        $promocodes = PromoCode::where(['id'=>$id])->select(array('*', DB::raw("CONCAT('$url/', image) AS image")))->first();
        return view('promocodes.edit')->with(['promocodes'=>$promocodes]);
    }


    public function update(Request $request, $id)
    {
        $input = $request->all(); 

        $promo = PromoCode::find($id);

        $promo->code = $input['code'];
        $promo->discount = $input['discount'];
      
         if ($request->hasFile('image')) {

            if ($request->file('image')->isValid()) {


               /* $validated = $request->validate([
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);*/
                
                $extension = $request->image->extension();
                $image_name = time().".".$extension;
                $request->image->storeAs('/images', $image_name);

                $promo->image = $image_name;

            }else{
                //$image_name ="default.png";
            }
        }else{
            //$image_name ="default.png";
        }

         $promo->save();

          return redirect('promocodes')->with('success', 'PromoCode Updated Successfully.');
    }


    public function destroy($id)
    {
          dd('hfgh');
    }

    public function delete($id)
    {
        $promo = PromoCode::findOrFail($id);
        //dd($id);
        $promo->delete();
        return redirect('promocodes')->with('success', 'PromoCode Deleted Successfully.');
    }
}
