@extends('layout.principal')
@section('conteudo')
    <h1>Listagem de Produtos</h1>
    @if(old('nome'))
        <div class="alert alert-success">
            <strong>Sucesso!</strong> O produto {{old('nome')}} foi adicionado.
        </div>
    @endif
    @if(empty($produtos))
        <div class="alert alert-danger">
            Você não tem nenhum produto cadastrado.
        </div>
    @else
        <table class="table table-bordered">
            <tr>
                <td>Nome</td>
                <td>Valor</td>
                <td>Descrição</td>
                <td>Quantidade</td>
                <td>Tamanho</td>
                <td>Categoria</td>
                <td>Detalhes</td>
                <td>Remover</td>
            </tr>
            @foreach ($produtos as $p)
                <tr class="{{ $p->quantidade <=1 ? 'alert-danger' : 'alert-success'}}">
                    <td>{{ $p->nome}}</td>
                    <td>{{ $p->valor}}</td>
                    <td>{{ $p->descricao}}</td>
                    <td>{{ $p->quantidade}}</td>
                    <td>{{ $p->tamanho}}</td>
                    <td>{{ $p->categoria->nome}}</td>
                    <td>
                        <a href="/produtos/mostra/{{ $p->id }}">
                            <i class="material-icons">search</i>
                        </a>
                    </td>
                    <td>
                        <a href="/produtos/remove/{{ $p->id }}">
                            <i class="material-icons badge-danger rounded">delete</i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
@stop