@extends('dashboard.layout')

@section('content')
    
    <!-- http://miprimerlaravel.test/post/create post.create -->

    <a href="{{ route('post/create') }}">Crear nuevo posteo</a>
    <table>
        <tr>
            <th>T&iacute;tulo</th>
            <th>Categor&iacute;a</th>
            <th>Posted</th>
            <th>Acciones</th>
        </tr>
        <tbody>
            @foreach ($posts as $p)
                <tr>
                    <td> {{ $p->title }} </td>
                    <td> {{ $p->category->title }} </td>
                    <td> {{ $p->posted }} </td>
                    <td> 
                        <a href="{{ route('post/edit', $p) }}">Editar</a>
                        <a href="{{ route('post.show', $p) }}">Ver</a>
                        
                        <form action="{{ route('post.destroy', $p) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit">Eliminar</button>

                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
@endsection