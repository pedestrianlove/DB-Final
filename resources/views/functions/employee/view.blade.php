@extends('layout')

@section('title', '人員資料表')

@section('extra_left')
   <h2>Total {{ $employees->count() }} records</h2>
@endsection

@section('content')
    <main class="grid">
        @if ($employees->count())
        @foreach ($employees as $employee)
            <article>
                <img src="{{($employee->Picture == "https://picsum.photos/600/400/?random")? "https://picsum.photos/600/400/?random" : \Storage::url ($employee->Picture) }}" alt="Sample photo">
                <div class="text">
                    <h3>{{$employee->Name}}</h3>
                    <p>Rank: {{$employee->Rank}}</p>
                    <button onclick="location.href='/employee/{{$employee->ID}}'">More</button>
                </div>
            </article>
        @endforeach
        @else
            <p>No records.</p>
        @endif


    </main>

@endsection
