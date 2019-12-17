<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Product;
use App\Category;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        $categories = Category::all();
        return view('category.create',[
            'categories' => $categories
        ]);
    }

    public function save(Request $request) {

        //Recoger datos
        $name = $request->input('name');
        $category_id = $request->input('category_id');
        $image = $request->file('image');
        
        //Asignar valores al objeto
        $category = new Category();
        $category->name = $name;
        $category->category_id = $category_id;

        //Subir fichero
        if ($image) {
            $image_path_name = time() . $image->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image));
            $product->image = $image_path_name;
        }
        $category->save();
        return redirect()->route('home')->with([
                    'message' => 'Categoria creada correctamente'
        ]);
    }

    public function getCategory($filename) {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

    public function detail($id) {
        $category = Category::find($id);
        return view('category.detail', [
            'product' => $category
        ]);
    }

    public function delete($id) {
        $category = Category::find($id);
        if ($product->image) {
            Storage::disk('images')->delete($product->image);
        }
        //Eliminar el registro

        $category->delete();
        $message = array('message' => 'Categoria eliminada');

        return redirect()->route('home')->with($message);
    }

    public function edit($id) {
        //$user = \Auth::user();
        $category = Category::find($id);
        if ($category) {
            return view('category.edit', [
                'category' => $category
            ]);
        } else {
            return redirect()->route('home');
        }
    }

    public function update(Request $request) {
        //Recoger datos
        $category_id = $request->input('category_id');
        $name = $request->input('name');
        $upcategory_id = 1; //$request->input('category');
        $image = $request->file('image');
        
        //Asignar valores al objeto
        $category = Category::find($category_id);
        $category->name = $name;
        $category->category_id = $upcategory_id;

        //Subir fichero
        if ($image) {
            Storage::disk('images')->delete($category->image);
            $image_path_name = time() . $image->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image));
            $category->image = $image_path_name;
        }
        //Actualizar registro
        $category->update();

        //return redirect()->route('image.detail', ['id' => $image_id])
        //               ->with(['message' => 'Imagen actualizada con exito']);
        return view('category.edit', ['category' => $category])
                        ->with(['message' => 'Imagen actualizada con exito']);
    }

}