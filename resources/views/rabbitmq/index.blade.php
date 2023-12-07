@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>RabbitMQ Test page</h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="row">
        <!-- Left Column with Form -->
        <div class="col-md-6">
            {!! Form::open(['route' => ['rabbitmq.create'], 'method' => 'post']) !!}
                <div class="mb-3">
                    <label for="channel" class="form-label">Channel:</label>
                    <input type="text" class="form-control" id="channel" name="channel" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message:</label>
                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                </div>
                @csrf
                {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>

        <!-- Right Column (Empty for illustration purposes) -->
        <div class="col-md-6">
            <!-- Add content to the right column if needed -->
        </div>
    </div>
    </div>

@endsection
