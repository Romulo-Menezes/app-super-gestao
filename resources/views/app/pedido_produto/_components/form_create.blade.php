<form action="{{ route('pedido-produto.store', ['pedido' => $pedido->id]) }}" method="post">
    @csrf
    <label for="produto_id">Produto</label>

    <select name="produto_id">
        <option value="">-- Selecione um Produto --</option>

        @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}"
                {{ old('produto_id') == $produto->id ? 'selected' : '' }}>
                {{ $produto->nome }}</option>
        @endforeach
    </select>

    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

    <label for="quantidade">Quantidade</label>

    <input type="number" name="quantidade" value="{{old('quantidade') ?? 1}}" min="1" placeholder="Quantidade" class="borda-preta">

    {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}

    <button type="submit" class="borda-preta"> Cadastrar </button>
</form>
