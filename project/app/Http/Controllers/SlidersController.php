<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\PromoCode;
use App\Models\Slider;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\PromoCodeRequest;

use App\Http\Requests\SliderRequest;

use DB;

class SlidersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $data = Slider::get()->toArray();
        //dd(json_encode($data));
        return view('sliders.list')->with(['data'=>$data]);
        
    }

    public function create()
    {
        return view('sliders.add');
    }


    public function store(SliderRequest $request)
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

        Slider::create($data);
        
        return redirect('sliders')->with('success', 'Slider Added Successfully.');
    }


    public function show($id)
    {
        //dd('hfgh');
    }

    public function edit($id)
    {
        
         $url = url('storage/app/images');
        $sliders = Slider::where(['id'=>$id])->select(array('*', DB::raw("CONCAT('$url/', image) AS image")))->first();
        return view('sliders.edit')->with(['sliders'=>$sliders]);
    }


    public function update(Request $request, $id)
    {
        $input = $request->all(); 

        $slider = Slider::find($id);

        $slider->title = $input['title'];
      
         if ($request->hasFile('image')) {

            if ($request->file('image')->isValid()) {


               /* $validated = $request->validate([
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);*/
                
                $extension = $request->image->extension();
                $image_name = time().".".$extension;
                $request->image->storeAs('/images', $image_name);

                $slider->image = $image_name;

            }else{
                //$image_name ="default.png";
            }
        }else{
            //$image_name ="default.png";
        }

         $slider->save();

          return redirect('sliders')->with('success', 'Slider Updated Successfully.');
    }


    public function destroy($id)
    {
          dd('hfgh');
    }

    public function delete($id)
    {
        $slider = Slider::findOrFail($id);
        //dd($id);
        $slider->delete();
        return redirect('sliders')->with('success', 'Slider Deleted Successfully.');
    }
}
