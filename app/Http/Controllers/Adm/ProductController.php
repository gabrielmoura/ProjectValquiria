<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use UploadTrait;

    public function index()
    {
        $products = Product::paginate(15);
        return view('admin.products.index', compact('products'));
    }


    public function create()
    {

        $form = ['route' => 'admin.products.store', 'files' => true];
        $dataCategories = [];
        foreach (Category::all() as $category) {
            $dataCategories[$category->id] = $category->name;
        }
        return view('admin.products.form', compact('form', 'dataCategories'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'photos' => 'required'//|dimensions:min_width=900,min_height=900|mimes:jpeg,jpg,bmp,png,webp|in_array:photos.*
            , 'description' => 'required'
            , 'body' => 'required'
            , 'price' => 'required'
            , 'name' => 'required'
        ]);
        $data = $request->all();
        $categories = $request->get('categories', null);

        //$data['price'] = formatPriceToDatabase($data['price']);
        $data['price'] = str_replace(['.', ','], ['', '.'], $data['price']);

        $product = Product::create($data);

        $product->categories()->sync($categories);

        if ($request->hasFile('photos')) {
            $images = $this->imageUpload($request->file('photos'), 'products');
            $product->photos()->createMany($images);
        }

        return redirect()->route('admin.products.index')
            ->with(['success' => 'Produto Criado com Sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $form = ['route' => ['admin.products.update', 'product' => $id], 'files' => true, 'method' => 'PUT'];
        $dataCategories = [];
        foreach (Category::all() as $category) {
            $dataCategories[$category->id] = $category->name;
        }
        $product = Product::find($id);
        return view('admin.products.form', compact('form', 'dataCategories', 'product'));
    }

    public function update(Request $request, $product)
    {
        $data = $request->all();
        $categories = $request->get('categories', null);

        $product = Product::find($product);
        $product->update($data);

        if (!is_null($categories))
            $product->categories()->sync($categories);

        if ($request->hasFile('photos')) {
            $images = $this->imageUpload($request->file('photos'), 'image');

            $product->photos()->createMany($images);
        }
        return redirect()->route('admin.products.index')->with(['success' => 'Produto Atualizado com Sucesso!']);
    }

    public function destroy($id)
    {
        $product = Product::find($id)->delete();

        return redirect()->route('admin.products.index')->with(['success' => 'Produto Removido com Sucesso!']);
    }
}
