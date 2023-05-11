<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $posts = Post::paginate(2);

        return view('dashboard/test/post/index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('id', 'title');
        $post = new Post();

        //dd($categories);

        echo view('dashboard\test\post\create', compact('categories', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        /*        
        $data['slug'] = Str::slug($data['title']);
        */

        $data = $request->validated();

        //dd($data);
        Post::create($data);

        return to_route("post.index")->with('status', 'Nuevo registro insertado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("dashboard.test.post.show", compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('id', 'title');
        echo view('dashboard\test\post\edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        // Validar los datos recibidos en la solicitud.
        $data = $request->validated();

        // Verificar si existe un archivo de imagen y moverlo a la carpeta "image" dentro del directorio público.
        if (isset($data["image"])) {
            $data["image"] = $filename = time() . "." . $data["image"]->extension();
            $request->image->move(public_path("image"), ($filename));
        }

        /* Actualizar el modelo "Post" con los datos validados y, en caso de éxito, redireccionar al usuario a la página de 
         * índice de "Post" con un mensaje de éxito.
         */
        $post->update($data);
        return to_route("post.index")->with('status', 'Registro actualizado');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route("post.index")->with('status', 'Registro eliminado');
    }
}
