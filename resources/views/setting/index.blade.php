@extends('layouts.varello')
@section('jasa-active','open')
@section('css')

@endsection
@section('content')
<header class="page-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header-heading"><span class="typcn typcn-chart-line page-header-heading-icon"></span> Setting</h1>
                <p class="page-header-description">The wonderful Chart.js library provides you with great statistical chart views. You can view the full Chart.js documentation <a href="http://www.chartjs.org/docs" target="_blank">here</a>.
                </p>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <a href="{{ url('setting/create') }}"><button type="button" class="btn btn-default">Create new Admin</button></a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Role</td>
                        <td>Email</td>
                        <td>Name</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $index => $ini)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $ini->role }}</td>
                        <td>{{ $ini->email }}</td>
                        <td>{{ $ini->name }}</td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('delete{{$ini->id}}').submit();">Delete</button>
                            <form class="form" method="post" id="delete{{$ini->id}}" action="{{url('setting/delete')}}">
                                <input type="hidden" name="id" value="{{$ini->id}}">
                                {{csrf_field()}}
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