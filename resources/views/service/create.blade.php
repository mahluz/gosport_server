@extends('layouts.varello')
@section('css')

@endsection
@section('content')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header-heading"><span class="typcn typcn-chart-line page-header-heading-icon"></span> Buat Jasa Baru</h1>
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
                <form class="form" action="{{ url('jasa/create') }}" method="post">
                    <div class="form-group">
                        <label class="label label-default">Nama Jasa</label>
                        <input type="text" class="form-control" name="jasa">
                    </div>
                    <div class="form-group">
                        <label class="label label-default">Description</label>
                        <input type="text" class="form-control" name="description">
                    </div>
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