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
                <img src="https://picsum.photos/600/400/?random" alt="Sample photo">
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
            <p>No records.</p>
        @endif

    </main>
@endsection
