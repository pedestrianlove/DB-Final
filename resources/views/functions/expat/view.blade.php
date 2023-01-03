@extends('layout')
@section('title', "派駐資料表")

@section('extra_left')
    @php
        $totalExpat = $expats ->count();
        $totalArea = 0;
        $totalEmployee = 0;
        $nationList = [];
        $employeeList = [];
        if ($totalExpat) {
            foreach($expats as $expat) {
                if (! in_array ($expat->Nation->Code, $nationList)) {
                    $nationList[] = $expat->Nation->Code;
                    $totalArea += $expat->Nation->Area;
                }
                if (! in_array ($expat->Employee->ID, $employeeList)) {
                    $employeeList[] = $expat->Employee->ID;
                    $totalEmployee ++;
                }
            }
        }
    @endphp
   <h2>Total {{ $totalExpat }} records</h2>
    @if ($totalExpat)
        <h3>員工人數： {{ $totalEmployee }}</h3>
        <h3>單位面積的員工人數 {{ $totalEmployee/$totalArea }}</h3>
    @endif
@endsection

@section('content')
    <main class="grid">
        @if ($expats->count())
        @foreach ($expats as $expat)
            <article>
                <x-dynamic-component component="flag-country-{{ strtolower(substr($expat->Nation->Code, 0, 2)) }}" />
                <img src="{{($expat->Employee->Picture == "https://picsum.photos/600/400/?random")? "https://picsum.photos/600/400/?random" : \Storage::url ($expat->Employee->Picture) }}" alt="Sample photo">
                <div class="text">
                    <h3>{{$expat->Employee->Name}}</h3>
                    <p>Rank: {{$expat->Employee->Rank}}</p>
                    <p>Nation: {{$expat->Nation->Name}}</p>
                    <p>Ambassador: {{$expat->Ambassador_Name}}</p>
                    <button onclick="location.href='/expat/{{$expat->expat_id}}'">More</button>
                </div>
            </article>
        @endforeach
        @else
            <img src="{{\Storage::url("public/img/nothing.gif")}}" alt="No records.">
            <img src="{{\Storage::url("public/img/nothing.gif")}}" alt="No records.">
            <img src="{{\Storage::url("public/img/nothing.gif")}}" alt="No records.">
            <img src="{{\Storage::url("public/img/nothing.gif")}}" alt="No records.">
            <img src="{{\Storage::url("public/img/nothing.gif")}}" alt="No records.">
            <img src="{{\Storage::url("public/img/nothing.gif")}}" alt="No records.">
            <img src="{{\Storage::url("public/img/nothing.gif")}}" alt="No records.">
            <img src="{{\Storage::url("public/img/nothing.gif")}}" alt="No records.">
            <img src="{{\Storage::url("public/img/nothing.gif")}}" alt="No records.">
            <img src="{{\Storage::url("public/img/nothing.gif")}}" alt="No records.">
        @endif

    </main>
@endsection
