@if (isset($produto_detalhe->id))
    <form action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}" method="post">
        @method('PUT')
    @else
        <form action="{{ route('produto-detalhe.store') }}" method="post">
@endif
@csrf
<label for="produto_id">ID do Produto</label>
<input type="text" name="produto_id" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" placeholder="ID do Produto" class="borda-preta">
{{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

<label for="comprimento">Comprimento</label>
<input type="number" name="comprimento" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" placeholder="Comprimento"
    class="borda-preta">
{{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

<label for="largura">Largura</label>
<input type="number" name="largura" value="{{ $produto_detalhe->largura ?? old('largura') }}" placeholder="Largura" class="borda-preta">
{{ $errors->has('largura') ? $errors->first('largura') : '' }}

<label for="altura">Altura</label>
<input type="number" name="altura" value="{{ $produto_detalhe->altura ?? old('altura') }}" placeholder="Altura" class="borda-preta">
{{ $errors->has('altura') ? $errors->first('altura') : '' }}

<label for="unidade_id">Unidade de Medida</label>
<select name="unidade_id" id="">
    <option value="">-- Selecione a Unidade de Medida --</option>

    @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }}"
            {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
            {{ $unidade->descricao }}</option>
    @endforeach
</select>
{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

<button type="submit" class="borda-preta">
    @if (isset($produto_detalhe->id))
        Editar
    @else
        Cadastrar
    @endif
</button>
</form>
