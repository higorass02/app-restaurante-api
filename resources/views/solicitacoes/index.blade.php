@extends('base')

@section('content')
    <div class="container">
    Tabela Solicitações
        <table>
            <tr>
                <th>ID</th>
                <th>Nome Cliente</th>
                <th>Endereço Cliente</th>
            </tr>
            @foreach ($lista_solicitacoes as $item)
            <tr>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['cliente']->name }}</td>
                <td>{{ $item['cliente']->email }}</td>
            </tr>            
            @endforeach       
        </table>
    </div>
@endsection