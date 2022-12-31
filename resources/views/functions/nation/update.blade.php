@extends('layout', ['key' => $nation->Code])
@section('title', '國家資料表')

@section('content')
    <form action="#" method="post">
        @csrf
        <div class="entry-wrapper">
        <label class="entry-text" for="country_code">國家代碼:</label>
        <input class="entry-input" type="text" id="country_code" name="Code" disabled=disabled value="{{$nation->Code}}">
            @error('Code')
            <p class="error-format">{{ $message }}</p>
            @enderror
        <label class="entry-text" for="country_name">國家名稱:</label>
        <input class="entry-input" type="text" id="country_name" name="Name" value="{{$nation->Name}}" >
            @error('Name')
            <p class="error-format">{{ $message }}</p>
            @enderror
        <label class="entry-text" for="continent">所屬洲名:</label>
        <input class="entry-input" type="text" id="continent" name="Continent" value="{{$nation->Continent}}">
            @error('Continent')
            <p class="error-format">{{ $message }}</p>
            @enderror
        <label class="entry-text" for="head_of_state">該國元首姓名:</label>
        <input class="entry-input" type="text" id="head_of_state" name="Leader" value="{{$nation->Leader}}">
            @error('Leader')
            <p class="error-format">{{ $message }}</p>
            @enderror
        <label class="entry-text" for="foreign_minister">該國外交部長姓名:</label>
        <input class="entry-input" type="text" id="foreign_minister" name="FMinister" value="{{$nation->FMinister}}">
            @error('FMinister')
            <p class="error-format">{{ $message }}</p>
            @enderror
        <label class="entry-text" for="contact_name">該國聯絡人姓名:</label>
        <input class="entry-input" type="text" id="contact_name" name="Contacts" value="{{$nation->Contacts}}">
            @error('Contacts')
            <p class="error-format">{{ $message }}</p>
            @enderror
        <label class="entry-text" for="population">該國人口數:</label>
        <input class="entry-input" type="number" id="population" name="Population" value="{{$nation->Population}}">
            @error('Population')
            <p class="error-format">{{ $message }}</p>
            @enderror

        <label class="entry-text" for="territory">該國領土面積:</label>
        <input class="entry-input" type="number" id="territory" name="Area" value="{{$nation->Area}}">
            @error('Area')
            <p class="error-format">{{ $message }}</p>
            @enderror
        <label class="entry-text" for="phone">連絡電話:</label>
        <input class="entry-input" type="text" id="phone" name="Tel" value="{{$nation->Tel}}">
            @error('Tel')
            <p class="error-format">{{ $message }}</p>
            @enderror
        <label class="entry-text" for="diplomatic">是否為邦交國:</label>
        <select class="entry-input" id="diplomatic" name="IsFriend" >
            <option value="yes" @if($nation->IsFriend == 'yes') selected @endif>是</option>
            <option value="no" @if($nation->IsFriend == 'no') selected @endif>否</option>
        </select>
            @error('IsFriend')
            <p class="error-format">{{ $message }}</p>
            @enderror

        <input type="submit" value="Update">
        </div>
    </form>
@endsection
