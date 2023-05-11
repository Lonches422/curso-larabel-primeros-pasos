@extends('dashboard/layout')

@section('content')
    <h1>Vamos a actualizar post: {{ $post->title }}</h1>        
    @include('dashboard\test\fragment\error-form')
    <form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
        @method("PATCH")
        @include('dashboard.test.post.form', ["task" => "edit"])
    </form>
@endsection
