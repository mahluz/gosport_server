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
            </table>
        </div>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Tanggal</td>
                        <td>Banyaknya Permintaan</td>
                    </tr>
                </thead>
            </table>
        </div>
        <input type="text" class="form-control" name="total" placeholder="total">
    </div>

	<div class="row">
		<div class="panel">
			<canvas id="myChart" width="400" height="400"></canvas>
		</div>
	</div>
</div>
{{-- end container fluid --}}

@endsection
@section('script')
<script type="text/javascript" src="{{ url('public/js/Chart.js') }}"></script>
<script type="text/javascript">
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
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
</script>
@endsection