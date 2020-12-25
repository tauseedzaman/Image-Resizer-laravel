<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
class imageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function resizeimage(Request $request)
    {
        if ($request->validate([
            'image' => 'required |image',
            'width' => 'required',
        ])) {
            $file = $request->image;
            $width = $request->width;
            $filenameWithExt = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $fileNameToStore = time() . '.' . $extension;
            $resize = Image::make($file)->resize($width, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg');
            $save = Storage::put("public/images/{$fileNameToStore}", $resize->__toString());
            if ($save) {
                return ("<center><h1>operation successful </h1></center> <center><img src='./storage/images/{$fileNameToStore}'></center><center>width:{$width}</center><center>Saved at: public/storage/images</center><center><a href='/ResizeImage/public/' style='background-color: deepskyblue'>Home</a></center>");
            }
            return "something went wrong";
        }
    }
}
