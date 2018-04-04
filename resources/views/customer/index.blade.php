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
		<div class="table-responsive">
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
						<td>Waktu Mulai</td>
						<td>Teknisi yang Menangani</td>
						<td>Status</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
					@foreach ($customers as $index => $ini)
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
						<td>{{ $ini->start_date }}</td>
						<td>{{ $ini->start_time }}</td>
						<td>
							@if($ini->technician != 1)
								<button class="btn btn-default" type="button" onclick="event.preventDefault();document.getElementById('detail{{ $ini->id }}').submit();">Lihat Teknisi</button>
								<form method="post" action="{{ url('pelanggan/technicianDetail') }}" id="detail{{ $ini->id }}">
									<input type="hidden" name="technician_id" value="{{ $ini->technician }}">
									{{ csrf_field() }}
								</form>
							@else
								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal{{ $ini->id }}">Layani</button>
							@endif
						</td>
						<td>{{ $ini->description }}</td>
						<td>
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
</div>

@foreach ($customers as $index => $customer)
{{-- every modal placed here --}}
<div id="myModal{{ $customer->id }}" class="modal fade" role="dialog" style="position: relative;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <form class="form" method="post" action="{{ url('pelanggan/setTechnician') }}">
      	<div class="form-group">
      		<label class="label label-default">Teknisi</label>
      		<select name="technician_id" class="form-control">
      			@foreach ($technicians as $index => $technician)
	      			<option value="{{ $technician->id }}">{{ $technician->name }}</option>
	      		@endforeach
      		</select>
      	</div>
      	<input type="hidden" name="id" value="{{ $customer->id }}">
      	{{ csrf_field() }}
      	<button type="submit" class="btn btn-default btn-block">Submit</button>
      </form>
    </div>

  </div>
</div>
@endforeach

@endsection
@section('script')

@endsection