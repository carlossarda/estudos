@extends('layout.principal')
@section('conteudo')
    <h1>Detalhes do {{$p->nome }} </h1>
    <ul>
        <li>
            Descrição: {{$p->descricao}}
        </li>

        <li>
            Valor: {{$p->valor}}
        </li>
        <li>
            Quantidade: {{$p->quantidade}}
        </li>
    </ul>
@stop