@extends('layouts.app')


@section('site-title', 'Add New Slider')

@section('main-content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @include('layouts.partials.msg')

                    <div class="card">
                        <div class="card-header card-header-info">
                            <h4 class="card-title ">Add New Slider</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.sliders.store') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-5">
                                    <label for="title">{{ __('Title') }}</label>
                                    <input type="text" name="title"
                                           class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                           id="title"
                                           value="{{ old('title') }}" placeholder="Enter your title" required>
                                </div>

                                <div class="form-group mb-5">
                                    <label for="sub_title">{{ __('Sub Title') }}</label>
                                    <input type="text" name="sub_title"
                                           class="form-control{{ $errors->has('sub_title') ? ' is-invalid' : '' }}"
                                           id="sub_title"
                                           value="{{ old('sub_title') }}" placeholder="Enter your sub title" required>
                                </div>

                                <div class="mb-5">
                                    <input type="file" name="image"
                                           class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"
                                           id="image" required>

                                    <img class="img-responsive img-thumbnail mt-2 d-none"
                                         id="image-preview"
                                         style="width: 20rem;"
                                         src=""
                                         alt="slider_preview">
                                </div>

                                <a class="btn btn-danger" href="{{ route('admin.sliders.index') }}">{{ __('Back') }}</a>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function (e) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#image-preview').attr('src', e.target.result);
                    $('#image-preview').removeClass('d-none');
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endpush
