@if (isset($pedido->id))
    <form action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}" method="post">
        @method('PUT')
    @else
        <form action="{{ route('pedido.store') }}" method="post">
@endif
@csrf
<label for="cliente_id">Cliente</label>

<select name="cliente_id">
    <option value="">-- Selecione um Cliente --</option>

    @foreach ($clientes as $cliente)
        <option value="{{ $cliente->id }}"
            {{ ($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : '' }}>
            {{ $cliente->nome }}</option>
    @endforeach
</select>

{{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}

<button type="submit" class="borda-preta">
    @if (isset($pedido->id))
        Editar
    @else
        Cadastrar
    @endif
</button>
</form>
