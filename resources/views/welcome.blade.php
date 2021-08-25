<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>{{$title ?? ''}}</title>
        <script src="https://code.highcharts.com/stock/highstock.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
    </head>
    <body class="font-medium ">
    <header>
        <h1>
            Аппаратно-программный комплекс контроля нагрузочных профилей по зданию №</h1>
    </header>
    <div class="grid grid-cols-3 gap-4 items-center">
    <img class="px-4" src="{{asset('img/img1.png')}}">
    <div> </div>
    <img class="px-22" src="{{asset('img/img2.png')}}">
    </div>
    <div class="container flex flex-row">
        <div class="px-4 bg-blue-400 rounded-md">
        <ul>
            <li><p>Дата</p></li>
            <li><p>Данные об объекте</p></li>
            <li><p>Функциональное назначение: </p></li>>
            <li><p>Установленная мощность <br> в том числе :</p>
            <ul>
                <li><p>-системы освещения: </p></li>
                <li><p>-силовые потребители: </p></li>
                <li><p>-вентиляция: </p></li>
                <li><p>-СВТ: </p></li>
            </ul>
            </li>
            <li><p>Энергопотребление:</p><ul>
                    <li><p>-расчетное значение-  кВт</p></li>
                    <li><p>-фактическое потребление:</p></li>
                    <li><p>-за месяц текущее-  кВт</p></li>
                    <li><p>-max месяц-  кВт</p></li>
                    <li><p>-min месяц-  кВт</p></li>
                    <li><p>-прогнозируемое значение: кВт</p></li>
                </ul>
            </li>
        </ul>

        </div>
        @yield('content')
    </div>
    </body>
</html>
</html>