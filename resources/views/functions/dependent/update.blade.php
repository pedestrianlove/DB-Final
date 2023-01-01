@extends('layout', ['key'=> $dependent->dependent_id])

@section('title', '眷屬資料表')

@section('content')
    <form action="#" method="POST">
        @csrf
        <div class="entry-wrapper">
        <label class="entry-text" for="employee_id">員工身分證字號:</label>
        <input class="entry-input" type="text" id="employee_id" name="Employee_ID" value="{{$dependent->Employee_ID}}" disabled="disabled">
            @error('Employee_ID')
            <p class="error-format">{{ $message }}</p>
            @enderror
            <label class="entry-text" for="employee_id">員工姓名:</label>
            <input class="entry-input" type="text" id="employee_name" name="Employee_Name" value="{{$dependent->Employee->Name}}" disabled="disabled">

        <label class="entry-text" for="family_id">眷屬身份證字號:</label>
        <input class="entry-input" type="text" id="family_id" name="ID" value="{{$dependent->ID}}" disabled="disabled">
            @error('ID')
            <p class="error-format">{{ $message }}</p>
            @enderror

        <label class="entry-text" for="family_name">眷屬姓名:</label>
        <input class="entry-input" type="text" id="family_name" name="Name" value="{{$dependent->Name}}">
            @error('Name')
            <p class="error-format">{{ $message }}</p>
            @enderror

        <label class="entry-text" for="family_gender">眷屬性別:</label>
            <select class="entry-input" id="gender" name="Sex">
                @if ($dependent->Sex == 'M')
                    <option value="M" selected>男</option>
                    <option value="F">女</option>
                @else
                    <option value="M">男</option>
                    <option value="F" selected>女</option>
                @endif
            </select>
            @error('Sex')
            <p class="error-format">{{ $message }}</p>
            @enderror

        <label class="entry-text" for="relationship">和員工關係:</label>
        <input class="entry-input" type="text" id="relationship" name="Relationship" value="{{$dependent->Relationship}}">
            @error('Name')
            <p class="error-format">{{ $message }}</p>
            @enderror

        <br><br>
        <input type="submit" value="Update">
        </div>
    </form>

@endsection
