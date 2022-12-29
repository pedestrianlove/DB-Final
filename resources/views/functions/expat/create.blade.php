@extends('layout')
@section('title', "派駐資料表")

@section('content')
    <form>
        @csrf
        <label>員工身分證字號:</label>
        <input type="text" name="Ex_EID" maxlength="10">

        <label>派駐國家代碼:</label>
        <input type="text" name="Ex_NCode" pattern="[A-Z]{2}[0-9]{4}" maxlength="6"><br>

        <label>員工姓名:</label>
        <input type="text" name="Ex_EName" maxlength="14"><br>

        <label>到職日期:</label>
        <input type="date" name="Ex_StartDate"><br>

        <label>與大使(代表)之姓名:</label>
        <input type="text" name="Ex_Ambassador" maxlength="14"><br><br>

        <input type="submit" value="Submit">
    </form>
@endsection
