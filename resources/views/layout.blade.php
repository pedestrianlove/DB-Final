<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <title>外交部員工外派資訊系統</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/sass/app.scss'])
</head>
<body>
<fieldset>
    <input type="button" onclick="location.href='/';" value="首頁" /> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="button" onclick="location.href='/employee';" value="人員資料表" /> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="button" onclick="location.href='/nation';" value="國家資料表" /> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="button" onclick="location.href='/expat';" value="派駐資料表" /> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="button" onclick="location.href='/dependent';" value="眷屬資料表" /> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
</fieldset>
    @yield('content')
</body>
</html>
