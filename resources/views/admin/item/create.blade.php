@extends('layouts.app')


@section('site-title', 'Add New Item')


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
                            <h4 class="card-title ">Add New Item</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-5">
                                    <label for="category">{{ __('Select Category') }}</label>
                                    <select required name="category" class="form-control" id="category">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach    
                                    </select>
                                </div>

                                <div class="form-group mb-5">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" name="name"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name"
                                           placeholder="Enter your item name" required>
                                </div>

                                <div class="form-group mb-5">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea name="description" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Enter Description"></textarea>
                                </div>

                                <div class="mb-5">
                                    <label for="image">{{ __('Image') }}</label>
                                    <input type="file" name="image"
                                           class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" id="image" required>
                                </div>

                                <div class="form-group mb-5">
                                    <label for="price">{{ __('Price') }}</label>
                                    <input type="number" name="price"
                                           class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" id="price"
                                           placeholder="Enter your item price" required>
                                </div>

                                <a class="btn btn-danger" href="{{ route('item.index') }}">{{ __('Back') }}</a>
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
