@extends('app.layouts.basico')

@section('titulo', 'Produtos')

@section('conteudo')
    
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Listagem de Produtos</p>
    </div>
    <div class="menu">
        <ul>
            <li>
                <a href="{{ route('produto.create') }}">Novo</a>
            </li>
            <li>
                <a href="">Consulta</a>
            </li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;">
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Fornecedor</th>
                        <th>Peso</th>
                        <th>Unidade ID</th>
                        <th>Comprimento</th>
                        <th>Largura</th>
                        <th>Altura</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <th>{{ $produto->nome }}</th>
                            <th>{{ $produto->descricao }}</th>
                            <th>{{ $produto->fornecedor->nome }}</th>
                            <th>{{ $produto->peso }}</th>
                            <th>{{ $produto->unidade_id }}</th>
                            <th>{{ $produto->produtoDetalhe->comprimento ?? '' }}</th>
                            <th>{{ $produto->produtoDetalhe->largura ?? '' }}</th>
                            <th>{{ $produto->produtoDetalhe->altura ?? '' }}</th>
                            <th><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></th>
                            <th><a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a></th>
                            <th>
                                <form id="form_{{$produto->id}}" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                </form>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $produtos->appends($request)->links('vendor.pagination.default') }}
        </div>
    </div>
</div>

@endsection