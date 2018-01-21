@extends('layouts.varello')
@section('css')

@endsection
@section('content')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header-heading"><span class="typcn typcn-chart-line page-header-heading-icon"></span> Daftar Teknisi Baru</h1>
                <p class="page-header-description">The wonderful Chart.js library provides you with great statistical chart views. You can view the full Chart.js documentation <a href="http://www.chartjs.org/docs" target="_blank">here</a>.
                </p>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid">
	<div class="row">
        <div class="panel">
            <div class="panel-heading">
                Formulir Pengisian Data
            </div>
            <div class="panel-body">
                <form class="form" action="{{ url('teknisi/store') }}" method="post">
                    <div class="form-group">
                        <label class="label label-default">Nama Teknisi</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label class="label label-default">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label class="label label-default">Password</label>
                        <input id="password" type="password" name="password" class="form-control">
                    </div>
                    {{-- <div class="form-group">
                        <label class="label label-default">Confirm your Password</label>
                        <input id="password-confirm" type="password" name="password-confirm" class="form-control">
                    </div> --}}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-default btn-block">Submit</button>
                </form>                
            </div>
        </div>
	</div>
</div>
@endsection
@section('script')

@endsection