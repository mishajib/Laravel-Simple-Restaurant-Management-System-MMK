@extends('layouts.app')


@section('site-title', 'Edit Item')

@section('main-content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    @include('layouts.partials.msg')

                    <div class="card">
                        <div class="card-header card-header-info">
                            <h4 class="card-title ">Edit Item</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.items.update', $item->id) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-5">
                                    <label for="category">{{ __('Select Category') }}</label>
                                    <select required name="category" class="form-control" id="category">
                                        @foreach($categories as $category)
                                            <option
                                                {{ $category->id == $item->category->id ? 'selected':'' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-5">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" name="name"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name"
                                           placeholder="Enter your item name" value="{{ $item->name }}" required>
                                </div>

                                <div class="form-group mb-5">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea name="description" id="description"
                                              class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                              placeholder="Enter Description">{{ $item->description }}"</textarea>
                                </div>

                                <div class="form-group mb-5">
                                    <label for="price">{{ __('Price') }}</label>
                                    <input type="number" name="price"
                                           class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                                           id="price"
                                           placeholder="Enter your item price" value="{{ $item->price }}" required>
                                </div>

                                <div class="mb-5">
                                    <label for="image">{{ __('Image') }}</label>
                                    <input type="file" name="image"
                                           class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"
                                           id="image">

                                    @if(Storage::disk(config('filesystems.default'))->exists($item->image))
                                        <img class="img-responsive img-thumbnail mt-2"
                                             id="image-preview"
                                             style="width: 15rem;"
                                             src="{{ storageLink($item->image) }}"
                                             alt="{{ $item->name }}">
                                    @else
                                        <img class="img-responsive img-thumbnail mt-2 d-none"
                                             id="image-preview"
                                             style="width: 15rem;"
                                             src=""
                                             alt="item_preview">
                                    @endif
                                </div>

                                <a class="btn btn-danger" href="{{ route('admin.items.index') }}">{{ __('Back') }}</a>
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