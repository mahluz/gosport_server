@extends('layouts.varello')
@section('css')

@endsection
@section('dashboard-active','active')
@section('content')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header-heading"><span class="typcn typcn-chart-line page-header-heading-icon"></span> Dashboard</h1>
                <p class="page-header-description">The wonderful Chart.js library provides you with great statistical chart views. You can view the full Chart.js documentation <a href="http://www.chartjs.org/docs" target="_blank">here</a>.
                </p>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Bulan-Tahun</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($report as $index => $ini)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ date("Y F",strtotime($ini->monthyear)) }}</td>
                        <td>
                            <button type="button" class="btn btn-default" onclick="getOrderData('{{ $ini->monthyear }}')">Lihat</button>
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

	<div class="row">
		<div class="panel" id="chart-container">
			<canvas id="myChart" width="400" height="400"></canvas>
		</div>
	</div>
</div>
{{-- end container fluid --}}

@endsection
@section('script')
<script type="text/javascript" src="{{ url('public/js/Chart.js') }}"></script>
<script type="text/javascript">

$(document).ready(function(){

});

function getOrderData(date){

    console.log('yey');
    $.ajax({
        url:"{{ url('main/getData') }}",
        method:"post",
        data:{
            _token:"{{ csrf_token() }}",
            date:date
        }
    }).done(function(callback){
        console.log(callback);
        $("#myChart").remove();
        $("#chart-container").append(
            "<canvas id='myChart' width='400' height='400'></canvas>"
            );
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"],
                datasets: [{
                    label: '# of Votes',
                    data: [callback["orderDate"].senin, callback["orderDate"].selasa, callback["orderDate"].rabu, callback["orderDate"].kamis, callback["orderDate"].jumat, callback["orderDate"].sabtu, callback["orderDate"].minggu],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(195, 179, 94, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(145, 98, 14, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    }).fail(function(error){
        console.log(error);
    });
}

</script>
@endsection