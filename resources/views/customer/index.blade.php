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
					<td>Email</td>
					<td>Umur</td>
					<td>jenis Kelamin</td>
					<td>Alamat</td>
					<td>Contact Person</td>
					<td>Jasa</td>
					<td>Paket</td>
					<td>Tempat</td>
					<td>Tanggal Mulai</td>
					<td>Teknisi yang Menangani</td>
					<td>Status</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				@foreach ($customer as $index => $ini)
				<tr>
					<td>{{ $index+1 }}</td>
					<td>{{ $ini->name }}</td>
					<td>{{ $ini->email }}</td>
					<td>{{ $ini->age }}</td>
					<td>{{ $ini->gender }}</td>
					<td>{{ $ini->address }}</td>
					<td>{{ $ini->cp }}</td>
					<td>{{ $ini->service }}</td>
					<td>{{ $ini->packet }}</td>
					<td>{{ $ini->place }}</td>
					<td>{{ $ini->start_at }}</td>
					<td>{{ $ini->technician }}</td>
					<td>{{ $ini->description }}</td>
					<td>
						<button type="button" class="btn btn-success">Layani</button>
						<button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('delete{{ $ini->id }}').submit();">Tolak</button>
						<form method="post" action="{{ url('pelanggan/delete') }}" id="delete{{ $ini->id }}">
							<input type="hidden" name="id" value="{{ $ini->id }}">
							{{ csrf_field() }}
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection
@section('script')

@endsection