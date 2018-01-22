@extends('layouts.varello')
@section('jasa-active','open')
@section('css')

@endsection
@section('content')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header-heading"><span class="typcn typcn-chart-line page-header-heading-icon"></span> Paket</h1>
                <p class="page-header-description">The wonderful Chart.js library provides you with great statistical chart views. You can view the full Chart.js documentation <a href="http://www.chartjs.org/docs" target="_blank">here</a>.
                </p>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <a href="{{ url('paket/create') }}"><button type="button" class="btn btn-default">Create new Packet</button></a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Jasa</td>
                        <td>Paket</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packet as $index => $ini)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $ini->service }}</td>
                        <td>{{ $ini->packet }}</td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('delete{{ $ini->id }}').submit();">Hapus</button>
                            <form class="form" method="post" action="{{ url('paket/delete') }}" id="delete{{ $ini->id }}">
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
@endsection
@section('script')

@endsection