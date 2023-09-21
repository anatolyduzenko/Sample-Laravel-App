@extends('layouts.app')
@section( 'title', 'File Manager')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
        <div id="fm" style="height: 600px;"></div>
        </div>
    </div>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">   
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

@endsection
