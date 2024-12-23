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
        $products = Product::where('status','!=','Deleted')->orderBy('created_at','DESC')->paginate(5);
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
            'skin' => 'required|min:1|numeric|gt:0',
            'hero' => 'required|min:1|numeric|gt:0',
            'price' => 'required|numeric|gt:0',
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
            $image->move(public_path('/uploads/products'),$imageName);
        
            //save image name in database
            $product->image = $imageName;
            $product->save();
        }
        
        return redirect()->route('admin.products.index')->with('success','Product added successfully.');
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
            'skin' => 'required|min:1|numeric|gt:0',
            'hero' => 'required|min:1|numeric|gt:0',
            'price' => 'required|numeric|gt:0',
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
            File::delete(public_path('/uploads/products/'.$product->image));


            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;

            //save image to products directory
            $image->move(public_path('/uploads/products'),$imageName);
        
            //save image name in database
            $product->image = $imageName;
            $product->save();
        }
        
        return redirect()->route('admin.products.index')->with('success','Product updated successfully.');
    }

    public function destroy($id){
        $product = Product::findOrFail($id);

        File::delete(public_path('/uploads/products/'.$product->image));

        $product->delete();

        return redirect()->route('admin.products.index')->with('success','Product deleted successfully.');
    }

    public function filter(Request $request)
    {
        $query = Product::query();
    
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }
    
        if ($request->filled('skin_filter')) {
            switch ($request->skin_filter) {
                case '0-100':
                    $query->whereBetween('hero', [0, 100]);
                    break;
                case '101-200':
                    $query->whereBetween('hero', [101, 200]);
                    break;
                case '201-300':
                    $query->whereBetween('hero', [201, 300]);
                    break;  
                case '300':
                    $query->where('hero', '>', 300);
                    break;
            }
        }
    
        $products = $query->where('status','!=','Deleted')->get();
    
        return view('products-list', ['products'=>$products,'filterApplied' => true]);
    }
    

}
