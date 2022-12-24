<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <title>外交部員工外派資訊系統</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<fieldset>
    <legend class="text-sm">功能選單</legend>
    <button class="button-17" role="button" onclick="location.href='/'">首頁 </button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <button class="button-17" role="button" onclick="location.href='/employee'">人員資料表 </button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <button class="button-17" role="button" onclick="location.href='/nation'">國家資料表 </button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <button class="button-17" role="button" onclick="location.href='/expat'">派駐資料表 </button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <button class="button-17" role="button" onclick="location.href='/dependent'">眷屬資料表 </button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <button class="button-17" role="button" onclick="window.print()">列印 </button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

</fieldset>
<h1>
    @yield('title')
</h1>
<div>
    @yield('content')
</div>>
</body>
</html>
