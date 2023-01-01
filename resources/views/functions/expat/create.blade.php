@extends('layout', ['create' => 1])
@section('title', "派駐資料表")

@section('content')
    <form action="#" method="post">
        @csrf
        <div class="entry-wrapper">

            <label class="entry-text">員工身分證字號:</label>
            <select class="entry-input" name="Employee_ID">
                @foreach ($employees as $employee)
                    <option
                        @if (old('Employee_ID') == $employee->ID)
                            selected
                        @endif
                        value="{{ $employee->ID }}"
                    >
                        {{ $employee->ID.': '.$employee->Name}}
                    </option>
                @endforeach
            </select>
            @error('Employee_ID')
            <p class="error-format">{{ $message }}</p>
            @enderror


            <label class="entry-text">派駐國家代碼:</label>
            <select class="entry-input" name="Nation_Code"><br>
                @foreach ($nations as $nation)
                    <option
                        @if (old('Nation_Code') == $nation->Code)
                            selected
                        @endif
                        value="{{ $nation->Code }}"
                    >
                        {{ $nation->Code.': '.$nation->Name}}
                    </option>
                @endforeach
            </select>
            @error('Nation_Code')
            <p class="error-format">{{ $message }}</p>
            @enderror


            <label class="entry-text">到職日期:</label>
            <input class="entry-input" type="date" name="StartDate" value="{{old ('StartDate')}}"><br>
            @error('StartDate')
            <p class="error-format">{{ $message }}</p>
            @enderror

            <label class="entry-text">大使(代表)之姓名:</label>
            <input class="entry-input" type="text" name="Ambassador_Name" value="{{old ('Ambassador_Name')}}"><br>
            @error('Ambassador_Name')
            <p class="error-format">{{ $message }}</p>
            @enderror

            <input type="submit" value="Create">
        </div>
    </form>
@endsection
