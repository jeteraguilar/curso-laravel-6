@extends('admin.layouts.app')

@section('title', 'Cadastrar Novo Produto')


{{-- @section('content')
    <h1>Cadastrar novo Produto</h1>

<form action="{{route('products.store')}}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Nome:">
        <input type="text" name="description" placeholder="Descrição:">
        <button type="submit">Enviar</button>
    </form>
@endsection --}}

 @section('content')
     <h1>Cadastrar novo Produto</h1>

     @include('admin.includes.alerts')

<form action="{{route('products.store')}}" method="post" enctype="multipart/form-data" class="form">
        @csrf
        <div class="form-group">
            <input type="text" class="form-contol" name="name" placeholder="Nome:" value="{{old('name') }}">
        </div>
        <div class="form-group">
            <input type="text"  name="price" class="form-control"  placeholder="Preço:"value={{old('price') }}>
        </div>
        <div class="form-group">
        <input type="text" name="description" class="form-control" placeholder="Descrição:"value={{old('description') }}>
        </div>
        <div class="form-group">
        <input type="file" name="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
    </form>
@endsection

{{-- ^^^^^^Upload de arquivo^^^^^^^^^^^^ --}}

