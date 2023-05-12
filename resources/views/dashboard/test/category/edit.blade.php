@extends('dashboard/layout')

@section('content')
    <h1>Vamos a actualizar categor&iacute;a: {{ $category->title }}</h1>        
    @include('dashboard\test\fragment\error-form')
    <form action="{{ route('category.update',$category->id) }}" method="post">
        @method("PATCH")
        @include('dashboard.test.category.form')
    </form>
@endsection