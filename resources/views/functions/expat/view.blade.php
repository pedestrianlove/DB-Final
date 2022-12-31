@extends('layout')
@section('title', "派駐資料表")

@section('extra_left')
   <h2>Total {{ $expats->count() }} records</h2>
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
            <p>No records.</p>
        @endif

    </main>
@endsection
