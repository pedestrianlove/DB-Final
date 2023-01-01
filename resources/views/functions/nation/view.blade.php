@extends('layout')
@section('title', '國家資料表')

@section('extra_left')
   <h2>Total {{ $nations->count() }} records</h2>
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
