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
            @foreach($queue as $item)
                <tr>
                    <td>{{$num++}}</td>
                    <td>{{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->time)->format('H:i') }}</td>
                    <td>{{ $item->client }}</td>
                    <td>{{ $item->telephone }}</td>
                    <td>{{ $item->service }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
