@extends('layout')

@section('title', '人員資料表')

@section('content')
    <form>
        <div class="entry-wrapper">
        <label class="entry-text" for="name">員工姓名:</label>
        <input class="entry-input" type="text" id="name" name="Name" maxlength="14" value={{$employee->Name}}>



        <label class="entry-text" for="id">員工身分證字號:</label>
        <input class="entry-input" type="text" id="id" name="ID" value={{$employee->ID}}>
        <label class="entry-text" for="rank">職等:</label>
        <input class="entry-input" type="text" id="rank" name="Rank" value={{$employee->Rank}}>
        <label class="entry-text" for="salary">薪資:</label>
        <input class="entry-input" type="number" id="salary" name="Salary" value={{$employee->Salary}}>
        <label class="entry-text" for="phone">電話:</label>
        <input class="entry-input" type="text" id="phone" name="Tel" value={{$employee->Tel}}>
        <label class="entry-text" for="gender">性別:</label>
        <select id="gender" name="Sex">
            @if ($employee->Sex == 'M')
                <option value="M" selected>男</option>
                <option value="F">女</option>
            @else
                <option value="M">Male</option>
                <option value="F" selected>Woman</option>
            @endif
        </select>
        <label class="entry-text" for="dob">出生年月日:</label>
        <input class="entry-input" type="date" id="dob" name="BirthDate" value={{$employee->BirthDate}}>
        <label class="entry-text" for="hire_date">錄用日期:</label>
        <input class="entry-input" type="date" id="hire_date" name="AcceptedDate" value={{$employee->AcceptedDate}}>
        <label class="entry-text" for="address">住址:</label>
        <input class="entry-input" type="text" id="address" name="Address" value={{$employee->Address}}>
        <label for="photo">照片:</label>
        <input type="file" id="photo" name="Picture"><br><br>
        <input type="submit" value="Submit">
        </div>
    </form>




@endsection
