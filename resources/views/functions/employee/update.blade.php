@extends('layout', ['key' => $employee->ID])

@section('title', '人員資料表')

@section('content')
<div class="left">
    <img src="{{($employee->Picture == "https://picsum.photos/600/400/?random")? "https://picsum.photos/600/400/?random" : \Storage::url ($employee->Picture) }}" alt="Sample photo">
</div>
<div class="right">
    <form action="#" method="post" enctype="multipart/form-data">
        @csrf
        <div class="entry-wrapper">
        <label class="entry-text" for="name">員工姓名:</label>
        <input class="entry-input" type="text" id="name" name="Name" value={{$employee->Name}}>
        @error('Name')
            <p class="error-format">{{ $message }}</p>
        @enderror


        <label class="entry-text" for="id">員工身分證字號:</label>
        <input class="entry-input" type="text" id="id" name="ID" disabled="disabled" value={{$employee->ID}}>
            @error('ID')
            <p class="error-format">{{ $message }}</p>
            @enderror
        <label class="entry-text" for="rank">職等:</label>
        <input class="entry-input" type="text" id="rank" name="Rank" value={{$employee->Rank}}>
            @error('Rank')
            <p class="error-format">{{ $message }}</p>
            @enderror
        <label class="entry-text" for="salary">薪資:</label>
        <input class="entry-input" type="number" id="salary" name="Salary" value={{$employee->Salary}}>
            @error('Salary')
            <p class="error-format">{{ $message }}</p>
            @enderror
        <label class="entry-text" for="phone">電話:</label>
        <input class="entry-input" type="text" id="phone" name="Tel" value={{$employee->Tel}}>
            @error('Tel')
            <p class="error-format">{{ $message }}</p>
            @enderror
        <label class="entry-text" for="gender">性別:</label>
        <select id="gender" name="Sex">
            @if ($employee->Sex == 'M')
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
        <label class="entry-text" for="dob">出生年月日:</label>
        <input class="entry-input" type="date" id="dob" name="BirthDate" value={{$employee->BirthDate}}>
            @error('BirthDate')
            <p class="error-format">{{ $message }}</p>
            @enderror
        <label class="entry-text" for="hire_date">錄用日期:</label>
        <input class="entry-input" type="date" id="hire_date" name="AcceptedDate" value={{$employee->AcceptedDate}}>
            @error('AcceptedDate')
            <p class="error-format">{{ $message }}</p>
            @enderror
        <label class="entry-text" for="address">住址:</label>
        <input class="entry-input" type="text" id="address" name="Address" value={{$employee->Address}}>
            @error('Address')
            <p class="error-format">{{ $message }}</p>
            @enderror
        <label for="photo">照片:</label>
        <input type="file" id="photo" name="Picture"><br><br>
            @error('Picture')
            <p class="error-format">{{ $message }}</p>
            @enderror
        <input type="submit" value="Update">

        </div>
    </form>
</div>



@endsection
