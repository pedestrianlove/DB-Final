@extends('layout', ['key' => $expat->expat_id])
@section('title', "派駐資料表")

@section('content')
    <form action="#" method="post">
        @csrf
        <div class="entry-wrapper">

        <label class="entry-text">員工身分證字號:</label>
        <input class="entry-input" type="text" name="Employee_ID" value="{{$expat->Employee_ID}}" disabled="disabled">
            @error('Employee_ID')
            <p class="error-format">{{ $message }}</p>
            @enderror
        <label class="entry-text">員工姓名:</label>
        <input class="entry-input" type="text" name="Employee_Name" value="{{$expat->Employee->Name}}" disabled="disabled"><br>


        <label class="entry-text">派駐國家代碼:</label>
        <input class="entry-input" type="text" name="Nation_Code" value="{{$expat->Nation_Code}}" disabled="disabled"><br>
            @error('Nation_Code')
            <p class="error-format">{{ $message }}</p>
            @enderror
        <label class="entry-text">派駐國家名稱:</label>
        <input class="entry-input" type="text" name="Nation_Code" value="{{$expat->Nation->Name}}" disabled="disabled"><br>


        <label class="entry-text">到職日期:</label>
        <input class="entry-input" type="date" name="StartDate" value="{{$expat->StartDate}}"><br>
            @error('StartDate')
            <p class="error-format">{{ $message }}</p>
            @enderror

        <label class="entry-text">大使(代表)之姓名:</label>
        <input class="entry-input" type="text" name="Ambassador_Name" value="{{$expat->Ambassador_Name}}"><br>
            @error('Ambassador_Name')
            <p class="error-format">{{ $message }}</p>
            @enderror

        <input type="submit" value="Update">
        </div>
    </form>
@endsection
