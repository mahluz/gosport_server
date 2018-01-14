@extends('layouts.varello')
@section('css')

@endsection
@section('content')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header-heading"><span class="typcn typcn-chart-line page-header-heading-icon"></span> Pelanggan</h1>
                <p class="page-header-description">The wonderful Chart.js library provides you with great statistical chart views. You can view the full Chart.js documentation <a href="http://www.chartjs.org/docs" target="_blank">here</a>.
                </p>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid">
	<div class="row">
		{{-- <button class="btn btn-default">Registrasi Teknisi Baru</button> --}}
		<table class="table table-striped">
			<thead>
				<tr>
					<td>No</td>
					<td>Nama Pelanggan</td>
					<td>Status</td>
					<td>Keterangan</td>
					<td>Action</td>
				</tr>
			</thead>
		</table>
	</div>
</div>
@endsection
@section('script')

@endsection