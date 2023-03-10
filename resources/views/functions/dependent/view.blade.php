@extends('layout')

@section('title', '眷屬資料表')

@section('extra_left')
    @php
        $male = 0; $female = 0;
        $maleAge = 0; $femaleAge = 0;
        foreach ($dependents as $dependent) {
            if ($dependent->Sex == 'M') {
                $male++;
                $maleAge += $dependent->Age();
            } else {
                $female++;
                $femaleAge += $dependent->Age();
            }
        }
    @endphp
    <h2>男性人數: {{$male}} / 女性人數: {{$female}}</h2>
    <h2>男性平均年齡: {{($male)? round ($maleAge/$male, 2) : 0 }} / 女性平均年齡: {{($female)? round ($femaleAge/$female, 2) : 0}}</h2>

@endsection

@section('content')
    <main class="grid">
        @if ($dependents->count())
        @foreach ($dependents as $dependent)
            <article>
                <img src="{{($dependent->Employee->Picture == "https://picsum.photos/600/400/?random")? "https://picsum.photos/600/400/?random" : \Storage::url ($dependent->Employee->Picture) }}" alt="Sample photo">
                <div class="text">
                    <h3>{{$dependent->Name}}</h3>
                    <p>Related Employee: {{$dependent->Employee->Name}}</p>
                    <p>Relationship: {{$dependent->Relationship}}</p>
                    <button onclick="location.href='/dependent/{{$dependent->dependent_id}}'">More</button>
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
