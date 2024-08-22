@extends('layouts.app')


@section('site-title', 'Contact Details')


@section('main-content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">{{ $contact->subject }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <strong>Name: {{ $contact->name }}</strong><br>
                                    <b>Email: {{$contact->email}}</b><br>
                                    <strong>Message: </strong>
                                    <hr>
                                    <p>{{ $contact->message }}</p>
                                </div>
                            </div>
                            <a href="{{ route('admin.contact.index') }}" class="btn btn-danger">Back</a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
