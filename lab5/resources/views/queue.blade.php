@extends('layout')
@section('title', 'Моя очередь')
@section('content')
    @yield($num = 1)
    <div class="container caption">
        <table class="caption" style="display: inline-block;">
            <thead>
            <tr>
                <th>#</th>
                <th>Дата</th>
                <th>Время</th>
                <th>Клиент</th>
                <th>Контактный номер</th>
                <th>Услуга</th>
            </tr>
            </thead>
            <tbody>
            @if(session('queue'))
                @foreach(session('queue') as $id=>$item)
                    <tr>
                        <td>{{$num++}}</td>
                        <td>{{ $item['date'] }}</td>
                        <td>{{ $item['time'] }}</td>
                        <td>{{ $item['client'] }}</td>
                        <td>{{ $item['telephone'] }}</td>
                        <td>{{ $item['service'] }}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection
