@extends('layout.principal')

@section('conteudo')
            <h1>Detalhes do produto: {{$p->nome}} </h1>
            <ul>
                <li>
                    <b>Valor:</b> R$ {{ $p->valor }}
                    <!-- usando blade para renderizar (pode-se usar o 'or' caso a variavel esteja vazia)-->
                </li>
                <li>
                    <b>Descrição:</b> {{$p->descricao}}
                </li>
                <li>
                    <b>Quantidade em estoque:</b> {{$p->quantidade}}
                </li>
            </ul>
@stop