<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;

use App\Models\User;
use App\Models\Category;

use App\Http\Requests\CategoryRequest;


use DB;


class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $data = Category::with('parent')->get()->toArray();
        //$data = Category::whereNull('category_id')->with('childrenCategories')->get();
        //dd(json_encode($data));
        return view('categories.list')->with(['data'=>$data]);
        
    }

    public function create()
    {
        $data = Category::whereNull('category_id')->get();
        //dd(json_encode($data));
        return view('categories.add')->with(['data'=>$data]);
    }


    public function store(CategoryRequest $request)
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
            'image'=>$image_name,
        );

        Category::create($data);
        
        return redirect('categories')->with('success', 'Category Added Successfully.');
    }


    public function show($id)
    {
        //dd('hfgh');
    }

    public function edit($id)
    {
         $data = Category::whereNull('category_id')->get();
         $url = url('storage/app/images');
         $category = Category::where(['id'=>$id])->select(array('*', DB::raw("CONCAT('$url/', image) AS image")))->first();
         //dd(json_encode($category));
        return view('categories.edit')->with(['data'=>$data,'category'=>$category]);

    }


    public function update(Request $request, $id)
    {
        $input = $request->all(); 

        $category = Category::find($id);

        $category->category_id = $input['category_id'];
        $category->name = $input['name'];
      
         if ($request->hasFile('image')) {

            if ($request->file('image')->isValid()) {


               /* $validated = $request->validate([
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);*/
                
                $extension = $request->image->extension();
                $image_name = time().".".$extension;
                $request->image->storeAs('/images', $image_name);

                $category->image = $image_name;

            }else{
                //$image_name ="default.png";
            }
        }else{
            //$image_name ="default.png";
        }

         $category->save();

          return redirect('categories')->with('success', 'Category Updated Successfully.');
    }


    public function destroy($id)
    {
          dd('hfgh');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        //dd($id);
        $category->delete();
        return redirect('categories')->with('success', 'Category Deleted Successfully.');
    }
}
