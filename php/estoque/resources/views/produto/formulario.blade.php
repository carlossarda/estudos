@extends('layout.principal')
@section('conteudo')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/produtos/adiciona" method="post">
        <input name="_token" type="hidden" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Nome</label>
            <input name="nome" class="form-control" value="{{ old('nome') }}"/>
        </div>
        <div class="form-group">
            <label>Valor</label>
            <input name="valor" class="form-control" value="{{ old('valor') }}"/>
        </div>
        <div class="form-group">
            <label>Quantidade</label>
            <input name="quantidade" class="form-control" value="{{ old('quantidade') }}"/>
        </div>
        <div class="form-group">
            <label>Tamanho</label>
            <input name="tamanho" class="form-control" value="{{ old('tamanho') }}"/>
        </div>
        <div class="form-group">
            <label>Categoria</label>
            <select name="categoria_id" class="form-control" value="{{ old('id') }}">
                @foreach($categoria as $cat)
                    <option value="{{$cat->id}}">{{$cat->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Descrição</label>
            <textarea name="descricao" class="form-control">{{ old('descricao') }}</textarea>
        </div>
        <button class="btn btn-primary" type="submit">Adicionar</button>
    </form>
@stop