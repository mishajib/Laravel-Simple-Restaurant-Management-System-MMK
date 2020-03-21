@extends('layouts.app')


@section('site-title', 'Add New Category')


@push('css')

@endpush

@section('main-content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                @include('layouts.partials.msg')

                    <div class="card">
                        <div class="card-header card-header-info">
                            <h4 class="card-title ">Add New Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('category.store') }}" method="POST">
                                @csrf

                                <div class="form-group mb-5">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" name="name"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name"
                                           value="{{ old('name') }}" placeholder="Enter your category name" required>
                                </div>

                                <a class="btn btn-danger" href="{{ route('category.index') }}">{{ __('Back') }}</a>
                                    <button type="submit" class="btn btn-info">{{ __('Submit') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@push('js')

@endpush
