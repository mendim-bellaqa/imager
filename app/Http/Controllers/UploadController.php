<?php

namespace App\Http\Controllers;

use App\Models\Uploadfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'images' => 'required',
            'images.*' => 'mimes:png,jpeg,jpg'
        ]);

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/product_images', $filename);
                $data[] = $filename;
            }
        }

        $file= new Uploadfile();
        $file->images = json_encode($data);
        $file->save();
        return view('order-info')->with('success', 'Fotografitë tuaja janë ngarkuar me sukses!');
    }
}
