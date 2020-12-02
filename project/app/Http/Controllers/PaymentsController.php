<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Payment;

use App\Http\Requests\ProductRequest;


class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        //$data = Payment::get()->toArray();
        $data = Order::with('user')->with('payment')->with('order_detail')->get()->toArray();
        //dd(json_encode($data));
        return view('payments.list')->with(['data'=>$data]);
        
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
        //
    }


    public function update(Request $request, $id)
    {
        //
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
