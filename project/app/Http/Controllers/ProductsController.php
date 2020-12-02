<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;

use App\Http\Requests\ProductRequest;

use DB;


class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $data = Product::get()->toArray();
        //dd(json_encode($data));
        return view('products.list')->with(['data'=>$data]);
        
    }

    public function create()
    {
        $data = Category::whereNull('category_id')->get();
        //dd(json_encode($data));
        return view('products.add')->with(['data'=>$data]);
    }


    public function store(ProductRequest $request)
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
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'description'=>$request->description,
            'actual_price'=>$request->actual_price,
            'sale_price'=>$request->sale_price,
            'packaging'=>$request->packaging,
            'is_recommended'=>$request->is_recommended,
            'is_popular'=>$request->is_popular,
            'discount'=>$request->discount,
            'image'=>$image_name,
        );

        Product::create($data);
        
        return redirect('products')->with('success', 'Product Added Successfully.');
    }


    public function show($id)
    {
        //dd('hfgh');
    }

    public function edit($id)
    {
        $data = Category::whereNull('category_id')->get();
        $url = url('storage/app/images');
        $product = Product::where(['id'=>$id])->select(array('*', DB::raw("CONCAT('$url/', image) AS image")))->first();
      
        return view('products.edit')->with(['data'=>$data,'product'=>$product]);
    }


    public function update(Request $request, $id)
    {
        //dd($request->all());

        $input = $request->all(); 

        $product = Product::find($id);

        $product->category_id = $input['category_id'];
        $product->name = $input['name'];
        $product->description = $input['description'];
        $product->actual_price = $input['actual_price'];
        $product->sale_price = $input['sale_price'];
        $product->is_recommended = $input['is_recommended'];
        $product->is_popular = $input['is_popular'];
        $product->packaging = $input['packaging'];
        $product->discount = $input['discount'];

         if ($request->hasFile('image')) {

            if ($request->file('image')->isValid()) {


               /* $validated = $request->validate([
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);*/
                
                $extension = $request->image->extension();
                $image_name = time().".".$extension;
                $request->image->storeAs('/images', $image_name);

                $product->image = $image_name;

            }else{
                //$image_name ="default.png";
            }
        }else{
            //$image_name ="default.png";
        }

         $product->save();

          return redirect('products')->with('success', 'Product Updated Successfully.');
         
    }


    public function destroy($id)
    {
          dd('hfgh');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        //dd($id);
        $product->delete();
        return redirect('products')->with('success', 'Product Deleted Successfully.');
    }
}
