@extends('layout')
@section('title', '國家資料表')

@section('content')
    <form>
        <div class="entry-wrapper">
        <label class="entry-text" for="country_code">國家代碼:</label>
        <input class="entry-input" type="text" id="country_code" name="N_Code" pattern="[A-Z]{2}[0-9]{4}" required>
        <label class="entry-text" for="country_name">國家名稱:</label>
        <input class="entry-input" type="text" id="country_name" name="N_Name" maxlength="14">
        <label class="entry-text" for="continent">所屬洲名:</label>
        <input class="entry-input" type="text" id="continent" name="N_Continent" maxlength="6">
        <label class="entry-text" for="head_of_state">該國元首姓名:</label>
        <input class="entry-input" type="text" id="head_of_state" name="N_Leader" maxlength="14">
        <label class="entry-text" for="foreign_minister">該國外交部長姓名:</label>
        <input class="entry-input" type="text" id="foreign_minister" name="N_FMinister" maxlength="14">
        <label class="entry-text" for="contact_name">該國聯絡人姓名:</label>
        <input class="entry-input" type="text" id="contact_name" name="N_Contacts" maxlength="14">
        <label class="entry-text" for="population">該國人口數:</label>
        <input class="entry-input" type="number" id="population" name="N_Population" min="0" max="99999999999999" required>

        <label class="entry-text" for="territory">該國領土面積:</label>
        <input class="entry-input" type="number" id="territory" name="N_Area" min="0" max="99999999999999" required>
        <label class="entry-text" for="phone">連絡電話:</label>
        <input class="entry-input" type="text" id="phone" name="N_Tel" pattern="[0-9]{14}" required>
        <label class="entry-text" for="diplomatic">是否為邦交國:</label>
        <input class="entry-input" type="checkbox" id="diplomatic" name="N_IsFriend" value="true"><br><br>

        <input type="submit" value="Submit">
        </div>
    </form>
@endsection
