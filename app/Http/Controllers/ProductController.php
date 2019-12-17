<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Product;
use App\Category;

class ProductController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        return view('product.create',[
            'categories' => Category::all()
        ]);
    }

    public function save(Request $request) {

        //Recoger datos
        $name = $request->input('name');
        $description = $request->input('description');
        $weight = $request->input('weight');
        $price = $request->input('price');
        $category = $request->input('category_id');
        $image1 = $request->file('image1');
        $image2 = $request->file('image2');
        $image3 = $request->file('image3');

        //Asignar valores al objeto
        $product = new Product();
        $product->name = $name;
        $product->description = $description;
        $product->weight = $weight;
        $product->price = $price;
        $product->category_id = $category;

        //Subir fichero
        if ($image1) {
            $image_path_name = time() . $image1->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image1));
            $product->image1 = $image_path_name;
        }
        if ($image2) {
            $image_path_name = time() . $image2->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image2));
            $product->image2 = $image_path_name;
        }
        if ($image3) {
            $image_path_name = time() . $image3->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image3));
            $product->image3 = $image_path_name;
        }
        $product->save();
        return redirect()->route('home')->with([
                    'message' => 'La foto ha sido subida correctamente'
        ]);
    }

    public function getProduct($filename) {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

    public function detail($id) {
        $product = Product::find($id);
        return view('product.detail', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    public function delete($id) {
        $user = \Auth::user();
        $product = Product::find($id);
        if ($product->image1) {
            Storage::disk('images')->delete($product->image1);
        }
        if ($product->image2) {
            Storage::disk('images')->delete($product->image2);
        }
        if ($product->image3) {
            Storage::disk('images')->delete($product->image3);
        }
        //Eliminar el registro

        $product->delete();
        $message = array('message' => 'Producto eliminado');

        return redirect()->route('home')->with($message);
    }

    public function edit($id) {
        //$user = \Auth::user();
        $product = Product::find($id);
        if ($product) {
            return view('product.edit', [
                'product' => $product,
                'categories' => Category::all()
            ]);
        } else {
            return redirect()->route('home');
        }
    }

    public function update(Request $request) {

        //Recoger datos
        $product_id = $request->input('product_id');
        $name = $request->input('name');
        $description = $request->input('description');
        $weight = $request->input('weight');
        $price = $request->input('price');
        $category = $request->input('category_id');
        $image1 = $request->file('image1');
        $image2 = $request->file('image2');
        $image3 = $request->file('image3');


        //Conseguir objeto image
        $product = Product::find($product_id);
        $product->name = $name;
        $product->description = $description;
        $product->weight = $weight;
        $product->price = $price;
        $product->category_id = $category;

        //Subir fichero
        if ($image1) {
            Storage::disk('images')->delete($product->image1);
            $image_path_name = time() . $image1->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image1));
            $product->image1 = $image_path_name;
        }
        if ($image2) {
            Storage::disk('images')->delete($product->image2);
            $image_path_name = time() . $image2->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image2));
            $product->image2 = $image_path_name;
        }
        if ($image3) {
            Storage::disk('images')->delete($product->image3);
            $image_path_name = time() . $image1->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image3));
            $product->image3 = $image_path_name;
        }

        //Actualizar registro
        $product->update();

        //return redirect()->route('image.detail', ['id' => $image_id])
        //               ->with(['message' => 'Imagen actualizada con exito']);
        return view('product.edit', ['product' => $product, 'categories' => Category::all()])
                        ->with(['message' => 'Imagen actualizada con exito']);
    }

}
