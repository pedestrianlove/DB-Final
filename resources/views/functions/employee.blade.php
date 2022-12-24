@extends('layout')

@section('content')
    <form>
        <label for="name">員工姓名:</label><br>
        <input type="text" id="name" name="E_Name" maxlength="14" required><br>
        <label for="id">員工身分證字號:</label><br>
        <input type="text" id="id" name="E_ID" maxlength="10" required><br>
        <label for="rank">職等:</label><br>
        <input type="text" id="rank" name="E_Rank" maxlength="10" required><br>
        <label for="salary">薪資:</label><br>
        <input type="number" id="salary" name="E_Salary" maxlength="8" required><br>
        <label for="phone">電話:</label><br>
        <input type="text" id="phone" name="E_Tel" maxlength="14" pattern="[0-9]*"><br>
        <label for="gender">性別:</label><br>
        <select id="gender" name="E_Sex">
            <option value="M">Male</option>
            <option value="F">Woman</option>
        </select><br>
        <!-- Spare input
          <input type="text" id="gender" name="E_Sex" maxlength="1"><br>
        -->
        <label for="dob">出生年月日:</label><br>
        <input type="date" id="dob" name="E_BirthDate" pattern="[0-9]{4}/[0-9]{2}/[0-9]{2}"><br>
        <label for="hire_date">錄用日期:</label><br>
        <input type="date" id="hire_date" name="E_AcceptedDate" pattern="[0-9]{4}/[0-9]{2}/[0-9]{2}" required><br>
        <label for="address">住址:</label><br>
        <input type="text" id="address" name="E_Address" maxlength="30"><br>
        <label for="photo">照片:</label><br>
        <input type="file" id="photo" name="E_Picture"><br><br>
        <input type="submit" value="Submit">
    </form>
@endsection
