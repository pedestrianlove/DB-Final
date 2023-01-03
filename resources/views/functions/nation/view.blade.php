@extends('layout')
@section('title', '國家資料表')

@section('extra_left')
    @php
        $totalFriends = 0;
        $totalPopulation_F = 0;
        $totalEnemies = 0;
        $totalPopulation_E = 0;
        foreach ($nations as $nation)
            if ($nation->IsFriend == 'yes') {
                $totalFriends++;
                $totalPopulation_F += $nation->Population;
            } else {
                $totalEnemies++;
                $totalPopulation_E += $nation->Population;
            }

    @endphp
   <h2>Total {{ $nations->count() }} records</h2>
        <h2>邦交國數量: {{ $totalFriends }}, 人口: {{ $totalPopulation_F }}</h2>
        <h2>非邦交國數量: {{$totalEnemies}}, 人口: {{ $totalPopulation_E }}</h2>
@endsection

@section('content')
    <main class="grid">
        @if ($nations->count())
        @foreach ($nations as $nation)
            <article>
                <x-dynamic-component component="flag-country-{{ strtolower(substr($nation->Code, 0, 2)) }}" />
                <div class="text">
                    <h3>{{$nation->Name}}</h3>
                    <p>Leader: {{$nation->Leader}}</p>
                    <p>Continent: {{$nation->Continent}}</p>
                    <p>Is friend: {{$nation->IsFriend}}</p>
                    <button onclick="location.href='/nation/{{$nation->Code}}'">More</button>
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
