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
                allButtonsEnabled: true,
                        selected: 1,
                        buttons: [ {
                            type: 'hour',
                            count: 1,
                            text: '1 час'
                        }, {
                            type: 'day',
                            count: 1,
                            text: 'День',
                            dataGrouping: {
                    forced: true,
                    units: [['hour', [1]]]
                }
                        }, {
                            type: 'week',
                            count: 1,
                            text: 'Нед.',
                            dataGrouping: {
                    forced: true,
                    units: [['week', [1]]]
                }
                        }, {
                            type: 'month',
                            count: 1,
                            text: 'Мес.',
                            dataGrouping: {
                    forced: true,
                    units: [['day', [1]]]
                }
                        }, {
                            type: 'year',
                            count: 1,
                            text: 'Год',
                            dataGrouping: {
                    forced: true,
                    units: [['month', [1]]]
                }
                        }]
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
                enabled: true
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