<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostcreateRequest;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Product;


class ProductController extends Controller
{
    public function products(){
        return view("product");
    }
    public function form(){
        return view("form");
    }

    public function getproducts()
    {
        $products = Product::all();
        return view('product', compact('products'));
    }
    public function formCreate(Request $request, User $user)
{
    $validator = Validator::make($request->all(), [
        'gambar' => 'required',
        'name' => 'required',
        'berat' => 'required',
        'harga' => 'required',
        'stock' => 'required',
        'kondisi' => 'required',
        'deskripsi' => 'required',
    ],
    [
        'gambar.required' => 'Error: Field gambar wajib di isi!',
        'name.required' => 'Error: Field nama wajib di isi!',
        'berat.required' => 'Error: Field berat wajib di isi!',
        'harga.required' => 'Error: Field harga wajib di isi!',
        'stock.required' => 'Error: Field stock wajib di isi!',
        'kondisi.required' => 'Error: Field kondisi wajib di isi!',
        'deskripsi.required' => 'Error: Field deskripsi wajib di isi!',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
    }

    Product::create([
        'user_id' => $user->id,
        'image' => $request->gambar,
        'name' => $request->name,
        'berat' => $request->berat,
        'harga' => $request->harga,
        'kondisi' => $request->kondisi,
        'stock' => $request->stock,
        'description' => $request->deskripsi,
    ]);

    return redirect()->route('admin.create', ['user' => $user->id]);
}

public function getAdmin(User $user)
{
    $products = Product::where('user_id', $user->id)->get();
    return view('admin', ['products' => $products, 'user' => $user]);
}

    public function formRequest( User $user)
    {
        return view('form', ['user' => $user]);
    }
    
    public function updatebyProduct(Request $request, User $user, Product $product){
        
        if ($product->user_id === $user->id) {
            $validator = Validator::make($request->all(), [
                'gambar' => 'required',
                'name' => 'required',
                'berat' => 'required',
                'harga' => 'required',
                'stock' => 'required',
                'kondisi' => 'required',
                'deskripsi' => 'required',
            ],
            [
                'gambar.required' => 'Error: Field gambar wajib di isi!',
                'name.required' => 'Error: Field nama wajib di isi!',
                'berat.required' => 'Error: Field berat wajib di isi!',
                'harga.required' => 'Error: Field harga wajib di isi!',
                'stock.required' => 'Error: Field stock wajib di isi!',
                'kondisi.required' => 'Error: Field kondisi wajib di isi!',
                'deskripsi.required' => 'Error: Field deskripsi wajib di isi!',
            ]);
    
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            if ($product->user_id === $user->id) {
                $product->name = $request->name;
                $product->stock = $request->stock;
                $product->berat = $request->berat;
                $product->harga = $request->harga;
                $product->description = $request->deskripsi;
                $product->kondisi = $request->kondisi;
                $product->image = $request->gambar;
                $product->save();
            }
    
            return redirect()->route('admin.create', ['user' => $user->id])->with('status', 'Berhasil mengupdate data');
        } 
    }
    public function editProduct( User $user, Product $product)
    {
        return view('formedit', ['product' => $product, 'user' => $user]);
    }
    public function getProduct()
    {
        $products = Product::all();
        return view('product', compact('products'));
    }
    public function deleteProduct( User $user, Product $product)
    {
        if ($product->user_id === $user->id) {
            $product->delete();
        }
        return redirect()->back()->with('status', 'Berhasil menghapus data');
    }
    



    public function updateProduct(Request $request, User $user){

        
    }

    public function ajaxProduct(User $user, PostcreateRequest $request){
        
        $validatedData = $request->validated();
        
        $image = $request->file('image');
        $image->storeAs('public/product', $image->hashName());

        $post = new Product();
        $post->name = $validatedData['name'];
        $post->harga = $validatedData['harga'];
        $post->description = $validatedData['description'];
        $post->image = $image->hashName();
        $post->user_id = $user->id;
        $post->stock = $validatedData['stock'];
        $post->berat = $validatedData['berat'];
        $post->kondisi = $validatedData['kondisi'];
        $post->save();

        return response()->json(['message' => 'Produk berhasil disimpan'], 200);
    }

    public function ajaxProductUpdate( Product $product, PostUpdateRequest  $request){
    {

        $validatedData = $request->validated();
        $product->update([
            'name'=> $validatedData['name'],
            'image'=> $validatedData['image'],
            'harga'=> $validatedData['harga'],
            'stock'=> $validatedData['stock'],
            'berat'=> $validatedData['berat'],
            'kondisi'=> $validatedData['konsisi'],
            'description'=> $validatedData['description'],

        ]);
        return response()->json(['message'=> ''], 200);
    }
    }


    
            


      
    
}
