<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soma Database</title>
</head>

<form action="/" method="get">
    <input type="search" name="procurar" value="{{ old('procurar') }}">
    <button type="submit">Procurar</button>
    <select name="select_day" id="select_day">
        <option value="9999" @if (old('select_day')=='9999' ) selected="selected" @endif>Todos</option>
        <option value="7" @if (old('select_day')=='7' ) selected="selected" @endif>7 Dias</option>
        <option value="30" @if (old('select_day')=='30' ) selected="selected" @endif>30 Dias</option>

    </select>
</form>

<form action="/contato" method="post">
    @csrf
    <input type="text" name="nome" placeholder="Nome">
    <input class="money" type="text" name="valor" placeholder="Valor 1">
    <input class="money" type="text" name="valor2" placeholder="Valor 2">
    <button type="submit">Enviar</button>
</form>

<body>
    <div style="display:flex; gap: 1rem">
        @foreach($valorT as $valor)
        <p style="text-transform: capitalize">{{ $valor->nome }}</p>
        @endforeach
    </div>

    <div>
        <p style="font-weight: bold">Total de ganhos: <span style="color: {{ $soma < 0 ? 'red' : 'green' }}">R${{ number_format($soma, 2, ',', '.') }}</span></p>
    </div>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('.money').mask("#.##0,00", {
        reverse: true
    });

</script>

<script>
    var select = document.getElementById('select_day');
    select.onchange = function() {
        this.form.submit();
    };

</script>
