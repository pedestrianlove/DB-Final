@extends('layout')

@section('title', '眷屬資料表')

@section('extra_left')
   <h2>Total {{ $dependents->count() }} records</h2>
@endsection

@section('content')
    <main class="grid">
        @if ($dependents->count())
        @foreach ($dependents as $dependent)
            <article>
                <img src="https://picsum.photos/600/400/?random" alt="Sample photo">
                <div class="text">
                    <h3>{{$dependent->Name}}</h3>
                    <p>Related Employee: {{$dependent->employee->Name}}</p>
                    <p>Relationship: {{$dependent->Relationship}}</p>
                    <button>More</button>
                </div>
            </article>
        @endforeach
        @else
            <p>No records.</p>
        @endif

    </main>

@endsection
