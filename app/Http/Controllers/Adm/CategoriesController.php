<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $form = ['route' => 'admin.categories.store'];
        return view('admin.categories.form', compact('form'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $category = Category::create($data);

        return redirect()->route('admin.categories.index')->with(['success' => 'Categoria Criado com Sucesso!']);
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

    public function edit($slug)
    {
        $category = Category::whereSlug($slug)->first();
        $form = ['route' => ['admin.categories.update', 'category' => $slug], 'method' => 'PUT'];
        return view('admin.categories.form', compact('form', 'category'));
    }

    public function update(Request $request, $slug)
    {
        $data = $request->all();

        $category = Category::whereSlug($slug)->first();
        $category->update($data);

        return redirect()->route('admin.categories.index')->with(['success' => 'Categoria Atualizada com Sucesso!']);
    }


    public function destroy($slug)
    {

        $category = Category::whereSlug($slug)->first();
        $category->delete();

        return redirect()->route('admin.categories.index')->with(['success' => 'Categoria Removida com Sucesso!']);
    }
}
