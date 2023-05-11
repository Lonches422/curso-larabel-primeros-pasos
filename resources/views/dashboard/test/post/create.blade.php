@extends('dashboard/layout')

@section('content')
    <h1>Vamos a crear un post</h1>        
    @include('dashboard\test\fragment\error-form')
    <form action="{{ route('post.store') }}" method="post">
        @include('dashboard.test.post.form')
    </form>
@endsection
