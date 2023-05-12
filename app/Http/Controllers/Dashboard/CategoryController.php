<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\PutRequest;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $categories = Category::paginate(2);

        return view('dashboard.test.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();

        //dd($category);

        echo view('dashboard.test.category.create', compact('category' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        /*        
        $data['slug'] = Str::slug($data['title']);
        */

        //$data = $request->validated();

        //dd($data);

        Category::create($request->validated());
        
        return to_route("category.index")->with('status', 'Nuevo registro insertado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view("dashboard.test.category.show", compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        echo view('dashboard\test\category\edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return to_route("category.index")->with('status', 'Registro actualizado');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route("category.index")->with('status', 'Registro eliminado');
    }
}
