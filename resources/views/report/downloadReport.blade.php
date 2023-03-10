@extends('layouts.fordashboard')

@section('content')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <div id="chart_div"></div>
    <script>
        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawBasic);
        var download = <?php echo $json ?>

        function drawBasic() {

            var data = google.visualization.arrayToDataTable(download);

            var options = {
                title: 'Population of Largest U.S. Cities',
                chartArea: {
                    width: '50%'
                },
                hAxis: {
                    title: 'Total Population',
                    minValue: 0
                },
                vAxis: {
                    title: 'City'
                }
            };

            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

            chart.draw(data, options);
        }
    </script>
@endsection
