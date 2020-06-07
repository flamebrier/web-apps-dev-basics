@extends('layout')
@section('title', 'Салон красоты')

@section('create')
    <div class="container caption row">
        <form class="form-group" action="{{action('ClientsController@create')}}" method="get">
            <label class="m-2">
                <input class="form-control m-2" name="name" type="text" placeholder="Имя клиента" />
            </label>
            <label class="m-2">
                <input class="form-control m-2" name="telephone" type="tel" size="12" placeholder="Контактный номер"/>
            </label>
            <button class="m-2 btn btn-danger primary text-center" type="submit">Новый клиент</button>
        </form>
    </div>
@endsection

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
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $item)
                <tr>
                    <td>{{$num++}}</td>
                    <td>{{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->time)->format('H:i') }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->telephone }}</td>
                    <td>{{ $item->service }}</td>
                    <td class="btn-holder p-2">
                        <a href="{{ url('add-to-queue/'.$item->id) }}" class="btn btn-warning btn-block text-center" title="Добавить в свою очередь">+</a>
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <a href="{{ url('delete/'.$item->id) }}" class=" btn btn-block btn-secondary text-center" type="submit" title="Удалить визит">-</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('clients')
    @yield($num2 = 1)
    <div class="container caption">
        <h2>Клиенты</h2>
        @foreach($clients as $item)
            <div class="row">
                <p class="m-2">{{$num2++}}.</p>
                <p class="m-2">{{ $item->name }}</p>
                <p class="m-2">{{ $item->telephone }}</p>
            </div>
        @endforeach
    </div>

@endsection
