<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\PromoCode;
use App\Models\Ingredient;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\PromoCodeRequest;

use App\Http\Requests\IngredientRequest;

use DB;

class IngredientsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $data = Ingredient::get()->toArray();
        //dd(json_encode($data));
        return view('ingredients.list')->with(['data'=>$data]);
        
    }

    public function create()
    {
        return view('ingredients.add');
    }


    public function store(IngredientRequest $request)
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
            'title'=>$request->title,
            'image'=>$image_name,
        );

        Ingredient::create($data);
        
        return redirect('ingredients')->with('success', 'Ingredient Added Successfully.');
    }


    public function show($id)
    {
        //dd('hfgh');
    }

    public function edit($id)
    {
        
         $url = url('storage/app/images');
        $ingredients = Ingredient::where(['id'=>$id])->select(array('*', DB::raw("CONCAT('$url/', image) AS image")))->first();
        return view('ingredients.edit')->with(['ingredients'=>$ingredients]);
    }


    public function update(Request $request, $id)
    {
        $input = $request->all(); 

        $ingredient = Ingredient::find($id);

        $ingredient->title = $input['title'];
      
         if ($request->hasFile('image')) {

            if ($request->file('image')->isValid()) {


               /* $validated = $request->validate([
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);*/
                
                $extension = $request->image->extension();
                $image_name = time().".".$extension;
                $request->image->storeAs('/images', $image_name);

                $ingredient->image = $image_name;

            }else{
                //$image_name ="default.png";
            }
        }else{
            //$image_name ="default.png";
        }

         $ingredient->save();

          return redirect('ingredients')->with('success', 'Ingredient Updated Successfully.');
    }


    public function destroy($id)
    {
          dd('hfgh');
    }

    public function delete($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        //dd($id);
        $ingredient->delete();
        return redirect('ingredients')->with('success', 'Ingredient Deleted Successfully.');
    }
}
