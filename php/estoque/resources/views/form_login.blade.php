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
    <form action="/login" method="post">
        <input name="_token" type="hidden" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Email</label>
            <input name="email" class="form-control" value="{{ old('email') }}"/>
        </div>
        <div class="form-group">
            <label>Senha</label>
            <input name="password" type="password" class="form-control" />
        </div>

        <button class="btn btn-primary" type="submit">Login</button>
    </form>
@stop