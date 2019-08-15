<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Gravadora</title>
</head>
<body>
    <div class="formulario">
    @if(session('message'))
                <div>
                    {{ session('message') }}
                </div>
                @endif
        <form action="{{url(isset($gravadora) ? 'gravadora/'.$gravadora->id : 'gravadora/')}}" method="POST">

        @if(isset($gravadora))
            @method('PUT')
        @endif

        @csrf
        <label for="nome">Nome</label> <input type="text" name="nome" value="{{(isset($gravadora)) ? $gravadora->nome : ''}}"><br>
        {{$errors->first('nome')}}<br>
        <label for="cnpj">CNPJ</label> <input type="text" name="cnpj" value="{{(isset($gravadora)) ? $gravadora->cnpj : ''}}"><br>
        {{$errors->first('cnpj')}}<br>
        <input type="submit" value="salvar">
        

        </form>
    </div>
</body>
</html>