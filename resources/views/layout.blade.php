<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <title>外交部員工外派資訊系統</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@if ('/' == request()->path() || isset($create))
    <fieldset style="max-width: 48rem">
@else
    <fieldset>
@endif
    <legend class="text-sm">功能選單</legend>
    <button class="button-17" role="button" onclick="location.href='/'">首頁 </button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <button class="button-17" role="button" onclick="location.href='/employee'">人員資料表 </button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <button class="button-17" role="button" onclick="location.href='/nation'">國家資料表 </button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <button class="button-17" role="button" onclick="location.href='/expat'">派駐資料表 </button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <button class="button-17" role="button" onclick="location.href='/dependent'">眷屬資料表 </button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <button class="button-17" role="button" onclick="window.print()">列印 </button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    @if ('/' != request()->path() && !isset ($key) && !isset ($create))
        <button class="button-17" role="button" onclick="location.href=window.location.href + '/create'">新增 </button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    @elseif ('/' != request()->path() && isset ($key) && !isset ($create))
        <button class="button-17" role="button" onclick="location.href=window.location.href + '/delete'">刪除 </button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    @endif

</fieldset>
<h1>
    @yield('title')
</h1>
@if ('/' != request()->path()  && !isset($key) && !isset($create))
    <div class="row">
        <div class="column">@yield('extra_left')</div>
        <div class="column">
            <form method="GET" action="#">
                <label for="search" class="search-label">Search</label>
                <div class="search-wrapper">
                    <div class="search-svg-wrapper">
                        <svg aria-hidden="true" class="search-svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="search" name="search" class="search-bar" placeholder="Search">
                    <input type="submit" hidden />
                </div>
            </form>
        </div>
        <br>
        <div class="column">@yield('extra_right')</div>
    </div>
@endif



<div>
    @yield('content')

</div>
    @if (session ()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session ('success') }}
        </div>
    @endif
</body>
</html>
