@extends('dashboard.layouts.app')
@section('title', trans('admin.edit').' '.$product->name.' - ')

@push('css')
    <link rel="stylesheet" type="text/css" href="/vendor/dashboard/app-assets/vendors/css/forms/select/select2.min.css">
@endpush

@section('content')
    <section class="input-validation">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-name">@lang('admin.add')</h4>
                        <a href="{{ route('dashboard.products.index') }}" class="btn btn-outline-primary">@lang('admin.back')</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form method="post" action="{{ route('dashboard.products.update', $product->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="controls">
                                            <label>@lang('admin.products.name')</label>
                                            <div class="controls">
                                                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                                           value="{{ old('name', $product->name) }}" required placeholder="@lang('admin.products.name')">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-help-circle"></i>
                                                    </div>
                                                </fieldset>
                                                @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>

                                            <label>@lang('admin.products.description')</label>
                                            <div class="controls">
                                                <fieldset class="form-group position-relative">
                                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                                              placeholder="@lang('admin.products.description')" required>{{ old('description', $product->description) }}</textarea>
                                                </fieldset>
                                                @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <label>@lang('admin.products.type.title')</label>
                                        <fieldset class="form-group">
                                            <select class="select2 form-control" required name="type">
                                                <option disabled selected>@lang('admin.products.choose_type')</option>
                                                <option value="{{ config('constants.product_type.for_car') }}"
                                                    {{ $product->type === config('constants.product_type.for_car') ? 'selected' : '' }}>@lang("admin.products.type.for_car")</option>
                                                <option value="{{ config('constants.product_type.for_home') }}"
                                                    {{ $product->type === config('constants.product_type.for_home') ? 'selected' : '' }}>@lang("admin.products.type.for_home")</option>
                                                <option value="{{ config('constants.product_type.other') }}"
                                                    {{ $product->type === config('constants.product_type.other') ? 'selected' : '' }}>@lang("admin.products.type.other")</option>
                                            </select>
                                        </fieldset>

                                        <label>@lang('admin.image')</label>
                                        <div class="custom-file">
                                            <input id="uploadImage" class="custom-file-input" type="file" name="image_url" onchange="PreviewImage();" />
                                            <label class="custom-file-label">@lang('admin.only_types')</label>
                                        </div>
                                        <br><br>
                                        <div class="text-center">
                                            <img id="uploadPreview" style="width: 200px; height: auto" src="{{ $product->image_url }}" />
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="/vendor/dashboard/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/vendor/dashboard/app-assets/js/scripts/forms/select/form-select2.js"></script>

    <script>
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        }
    </script>
@endpush
