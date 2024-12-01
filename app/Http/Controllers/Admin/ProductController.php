<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderBy('created_at','DESC')->get();
        return view('admin.products.index',[
            'products'=>$products
        ]);
    }

    public function create(){
        return view('admin.products.create');
    }

    public function store(Request $request) { 
        $rules = [
            'name' => 'required|min:5',
            'skin' => 'required|min:1|numeric',
            'hero' => 'required|min:1|numeric',
            'price' => 'required|numeric',
            'username'=>'required',
            'password'=>'required'
        ];

        if($request->image != ""){
            $rules['image']='image';
        }

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return redirect()->route('admin.products.create')->withInput()->withErrors($validator);
        }

        $product = new Product();
        $product->name = $request->name;
        $product->skin = $request->skin;
        $product->hero = $request->hero;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->username = $request->username;
        $product->password = $request->password;
        $product->save();

        if($request->image != ""){
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;

            //save image to products directory
            $image->move(public_path('uploads/products'),$imageName);
        
            //save image name in database
            $product->image = $imageName;
            $product->save();
        }
        
        return redirect()->route('admin.products')->with('success','Product added successfully.');
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        return view('admin.products.edit',[
            'product'=>$product
        ]);

    }

    public function update($id,Request $request){

        $product = Product::findOrFail($id);

        $rules = [
            'name' => 'required|min:5',
            'skin' => 'required|min:1|numeric',
            'hero' => 'required|min:1|numeric',
            'price' => 'required|numeric',
            'username'=>'required',
            'password'=>'required'
        ];

        if($request->image != ""){
            $rules['image']='image';
        }

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return redirect()->route('admin.products.edit',$product->id)->withInput()->withErrors($validator);
        }

        //Update 
        $product->name = $request->name;
        $product->skin = $request->skin;
        $product->hero = $request->hero;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->username = $request->username;
        $product->password = $request->password;
        $product->save();

        if($request->image != ""){
            // delete old image
            File::delete(public_path('uploads/products'.$product->image));


            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;

            //save image to products directory
            $image->move(public_path('uploads/products'),$imageName);
        
            //save image name in database
            $product->image = $imageName;
            $product->save();
        }
        
        return redirect()->route('admin.products')->with('success','Product updated successfully.');
    }

    public function destroy($id){
        $product = Product::findOrFail($id);

        File::delete(public_path('uploads/products'.$product->image));

        $product->delete();

        return redirect()->route('admin.products')->with('success','Product deleted successfully.');
    }
}
