@extends('layout')

@section('title', '人員資料表')

@section('extra_left')
    @php
        $totalEmployee = $employees->count ();
        if ($totalEmployee) {
            // average salary
            $totalSalary = 0;
            foreach ($employees as $employee)
                $totalSalary += $employee->Salary;
            $averageSalary = $totalSalary / $totalEmployee;

            // average age
            $totalAge = 0;
            foreach ($employees as $employee)
                $totalAge += ($employee->Age());
            $averageAge = $totalAge / $totalEmployee;
        }
   @endphp
    <h2> Total {{ $totalEmployee }} records</h2>
    @if ($totalEmployee)
        <h2> 平均收入: {{ $averageSalary }}$ &nbsp&nbsp 平均年齡: {{ $averageAge }}</h2>
    @endif
@endsection

@section('content')
    <main class="grid">
        @if ($employees->count())
        @foreach ($employees as $employee)
            <article>
                <img src="{{($employee->Picture == "https://picsum.photos/600/400/?random")? "https://picsum.photos/600/400/?random" : \Storage::url ($employee->Picture) }}" alt="Sample photo">
                <div class="text">
                    <h3>{{$employee->Name}}</h3>
                    <p>ID: {{$employee->ID}}</p>
                    <p>Rank: {{$employee->Rank}}</p>
                    <button onclick="location.href='/employee/{{$employee->ID}}'">More</button>
                </div>
            </article>
        @endforeach
    </main>
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



@endsection
