<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class TestController extends Controller
{
    public function index()
    {
        return view('testing', [
            'imageName' => Cache::get('imageName')
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required'
        ]);
        $imageName = $this->uploadImage(
            $request->file('image')
        );

        Cache::put('imageName', $imageName);

        return redirect('/testing');
    }

    public function uploadImage($image)
    {
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image = Image::make($image->getRealPath());

        $image->resize(200, 200, function ($constraint) {
		    $constraint->aspectRatio();
        })->save(storage_path('app/public/').$imageName);
        
        return $imageName;
    }
}
