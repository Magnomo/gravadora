<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index Gravadora</title>
</head>
<body>
<h1>Lista de Gravadoras</h1>

<table border=1>
<tr>
<th>id</th>
<th>Nome</th>
<th>CNPJ</th>
<th colspan=2>Ações</th>
</tr>
@foreach($gravadoras as $gravadora)
<tr>
<td>{{$gravadora->id}}</td>
<td>{{$gravadora->nome}}</td>
<td>{{$gravadora->cnpj}}</td>
<td><a href="{{url('gravadora/'.$gravadora->id.'/edit')}}"><button>Editar</button></a></td>
<td>
     <form method="POST" action="{{url('gravadora/'.$gravadora->id)}}">
        @method('delete')
         @csrf
        <button type="submit">Deletar</button>
    </form>
</td>
</tr>
@endforeach
</table>
<hr>
<table border=1>
<tr>
<th>id</th>
<th>Nome</th>
<th>CNPJ</th>
<th>Ações</th>
</tr>
@foreach($gravadoras_inativas as $gravadora)
    <td>{{$gravadora->id}}</td>
    <td>{{$gravadora->nome}}</td>
    <td>{{$gravadora->cnpj}}</td>
    <td>
    <form method="POST" action="{{url('gravadora/restore/'.$gravadora->id)}}">
                        @method('put')
                        @csrf
                        <button type="submit">Restaurar</button>
                    </form>
    </td>
@endforeach
</table>
    
</body>
</html>