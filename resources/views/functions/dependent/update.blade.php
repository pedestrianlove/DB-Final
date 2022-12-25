@extends('layout')

@section('title', '眷屬資料表')

@section('content')
    <form>
        <label for="employee_id">員工身分證字號:</label>
        <input type="text" id="employee_id" name="employee_id" pattern="[0-9]{10}" required>

        <label for="family_id">眷屬身份證字號:</label>
        <input type="text" id="family_id" name="family_id" pattern="[0-9]{10}" required>

        <label for="family_name">眷屬姓名:</label>
        <input type="text" id="family_name" name="family_name" maxlength="14" required>

        <label for="family_gender">眷屬性別:</label>
        <input type="text" id="family_gender" name="family_gender" maxlength="1" required>

        <label for="relationship">和員工關係:</label>
        <input type="text" id="relationship" name="relationship" maxlength="6" required>

        <br><br>
        <input type="submit" value="Submit">
    </form>

@endsection
