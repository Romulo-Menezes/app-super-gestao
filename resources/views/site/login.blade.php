@extends('site.layouts.basico')

@section('titulo', 'Login')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action="{{ route('site.login') }}" method="post">
                    @csrf
                    <label for="usuario">E-mail</label>
                    <input name="usuario" value="{{old('usuario')}}" type="text" placeholder="exemplo@email.com" class="borda-preta">
                    {{ $errors->has('usuario') ? $errors->first('usuario') : ''}}
                    <br>
                    <label for="senha">Senha</label>
                    <input name="senha" value="{{old('senha')}}" type="password" placeholder="senha" class="borda-preta">
                    {{ $errors->has('senha') ? $errors->first('senha') : ''}}
                    <br>
                    <button type="submit" class="borda-preta">Entrar</button>
                </form>
                {{ isset($erro) && $erro != '' ? $erro : '' }}
            </div>
        </div>  
    </div>
    @include('site.layouts._partials.rodape')
@endsection