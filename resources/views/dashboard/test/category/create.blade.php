@extends('dashboard/layout')

@section('content')
    <h1>Vamos a crear una categor&iacute;a</h1>        
    @include('dashboard\test\fragment\error-form')
    <form action="{{ route('category.store') }}" method="post">
        @include('dashboard.test.category.form')
    </form>
@endsection
