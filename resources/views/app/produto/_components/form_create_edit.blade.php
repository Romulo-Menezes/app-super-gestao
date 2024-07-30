@if (isset($produto->id))
    <form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="post">
        @method('PUT')
    @else
        <form action="{{ route('produto.store') }}" method="post">
@endif
@csrf

<label for="fornecedor_id">Fornecedor</label>
<select name="fornecedor_id">
    <option value="">-- Selecione um Fornecedor --</option>

    @foreach ($fornecedores as $fornecedor)
        <option value="{{ $fornecedor->id }}"
            {{ ($produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : '' }}>
            {{ $fornecedor->nome }}</option>
    @endforeach
</select>
{{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}

<label for="nome">Nome</label>
<input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
{{ $errors->has('nome') ? $errors->first('nome') : '' }}

<label for="descricao">Descrição</label>
<input type="text" name="descricao" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descrição"
    class="borda-preta">
{{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

<label for="peso">Peso</label>
<input type="number" name="peso" value="{{ $produto->peso ?? old('peso') }}" placeholder="Peso" class="borda-preta">
{{ $errors->has('peso') ? $errors->first('peso') : '' }}

<label for="unidade_id">Unidade de Medida</label>
<select name="unidade_id">
    <option value="">-- Selecione a Unidade de Medida --</option>

    @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }}"
            {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
            {{ $unidade->descricao }}</option>
    @endforeach
</select>
{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

<button type="submit" class="borda-preta">
    @if (isset($produto->id))
        Editar
    @else
        Cadastrar
    @endif
</button>
</form>
