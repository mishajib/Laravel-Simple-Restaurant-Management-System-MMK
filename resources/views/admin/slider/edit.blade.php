@extends('layouts.app')


@section('site-title', 'Edit Slider')


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
                            <h4 class="card-title ">Edit Slider</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-5">
                                    <label for="title">{{ __('Title') }}</label>
                                    <input type="text" name="title"
                                           class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title"
                                           value="{{ $slider->title }}" placeholder="Enter your title" required>
                                </div>

                                <div class="form-group mb-5">
                                    <label for="sub_title">{{ __('Sub Title') }}</label>
                                    <input type="text" name="sub_title"
                                           class="form-control{{ $errors->has('sub_title') ? ' is-invalid' : '' }}" id="sub_title"
                                           value="{{ $slider->sub_title }}" placeholder="Enter your sub title" required>
                                </div>

                                <div class="mb-5">
                                    <input type="file" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" id="image" required>
                                </div>

                                <a class="btn btn-danger" href="{{ route('slider.index') }}">{{ __('Back') }}</a>
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
