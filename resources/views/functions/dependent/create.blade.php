@extends('layout', ['create' => 1])

@section('title', '眷屬資料表')

@section('content')

    <form action="#" method="POST">
        @csrf
        <div class="entry-wrapper">
            <label class="entry-text" for="employee_id">員工身分證字號:</label>
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


            <label class="entry-text" for="family_id">眷屬身份證字號:</label>
            <input class="entry-input" type="text" id="family_id" name="ID" value="{{ old('ID')}}">

            @error('ID')
            <p class="error-format">{{ $message }}</p>
            @enderror

            <label class="entry-text" for="family_name">眷屬姓名:</label>
            <input class="entry-input" type="text" id="family_name" name="Name" value="{{ old ('Name') }}">
            @error('Name')
            <p class="error-format">{{ $message }}</p>
            @enderror

            <label class="entry-text" for="family_gender">眷屬性別:</label>
            <select class="entry-input" id="gender" name="Sex">
                @if ( old ('Sex') == 'M')
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
            <input class="entry-input" type="text" id="relationship" name="Relationship" value="{{ old ('Relationship') }}">
            @error('Name')
            <p class="error-format">{{ $message }}</p>
            @enderror

            <br><br>
            <input type="submit" value="Create">
        </div>
    </form>

<script>
    document.getElementById('employee_id').addEventListener('onBlur', function() {
        var employeeId = this.value;

        // Send an AJAX request to the server to fetch the Employee_Name value
        fetch('/employees/Name?id=' + employeeId)
            .then(response => response.text())
            .then(name => {
                // Update the Employee_Name field with the fetched value
                document.getElementById('employee_name').value = name;
            });
    });
</script>
@endsection
