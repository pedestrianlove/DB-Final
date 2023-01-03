@extends('layout')

@section('title')
    外交部員工外派資訊系統
@endsection

@section('content')
    <div class="entry-wrapper">
    <table class="table">
        <thead>
            <tr>
                <th>30 歲以上之員工人數:</th>
            </tr>
        </thead>
        <thead>
        <tr>
            <th scope="col">國家</th>
            <th scope="col">人數</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($nationList as $nation=>$count)
            <tr>
                <th scope="row">{{ $nation }}</th>
                <td>{{ $count }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <table class="table">
        <thead>
        <tr>
            <th>派駐某一洲共多少位員工:</th>
        </tr>
        </thead>
        <thead>
        <tr>
            <th scope="col">洲</th>
            <th scope="col">人數</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($continentList as $continent=>$count)
            <tr>
                <th scope="row">{{ $continent }}</th>
                <td>{{ $count }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
        <h3>30 歲以上員工之平均眷屬年齡: {{$averageAgeDependentsOver30}}</h3>
        <h3>30 歲以上員工之平均眷屬數量: {{$numberOfDependentsOver30}}</h3>
    </div>

@endsection
