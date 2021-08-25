@extends('welcome', ['title'=>'Главная страница'])
@section('content')
<script type="text/javascript">
    window.onload = function() {
        var datas =<?php echo json_encode($datas)?>;
        var active = [],

            dataLength = datas.length,

            i = 0;
        for (i; i < dataLength; i += 1) {
            active.push([
                datas[i][0] * 1000, // the date
                datas[i][1], // power
            ]);
        }
        Highcharts.setOptions({
				lang: {
					loading: 'Загрузка...',
					months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
					weekdays: ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'],
					shortMonths: ['Янв', 'Фев', 'Март', 'Апр', 'Май', 'Июнь', 'Июль', 'Авг', 'Сент', 'Окт', 'Нояб', 'Дек'],
					exportButtonTitle: "Экспорт",
					printButtonTitle: "Печать",
					rangeSelectorFrom: "С",
					rangeSelectorTo: "По",
					rangeSelectorZoom: "Период за",
                    contextButtonTitle: "Меню",
					downloadPNG: 'Загрузить в PNG',
					downloadPDF: 'Загрузить в PDF',
					printChart: 'Печать графика'
				}
		})
        Highcharts.stockChart('chart-container', {
            	exporting: {
                    buttons: {
                        contextButton: {
                            menuItems: ["printChart", "separator", "downloadPNG", "downloadPDF"]
                        }
                    }
                },
            credits: {
                enabled: false
            },
            chart: {
                alignTicks: false
            },
            rangeSelector: {
                enabled: false
            },
            xAxis: {
                categories: ['Текущее']
            },
            yAxis: [{
                labels: {
                    align: 'left',
                    x: 1
                },
                title: {
                    text: 'кВт'
                },
                lineWidth: 1,
                stackLabels: {
                    enabled: false,
                    style: {
                        fontWeight: 'bold',
                        color: ( // theme
                            Highcharts.defaultOptions.title.style &&
                            Highcharts.defaultOptions.title.style.color
                        ) || 'gray'
                    }
                }
            }],

            navigator: {
                enabled: false
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                }
            },
            series: [{
                type: 'column',
                name: 'Текущее',
                data: active
            }]
        });
    };
</script>
<div class="flex-1" id="chart-container"></div>
@endsection