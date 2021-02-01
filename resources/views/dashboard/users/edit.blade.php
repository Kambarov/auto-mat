@extends('dashboard.layouts.app')
@section('title', trans('admin.edit').' '.$user->name.' - ')

@push('css')
    <link rel="stylesheet" type="text/css" href="/vendor/dashboard/app-assets/vendors/css/forms/select/select2.min.css">
@endpush


@section('content')
    <section class="input-validation">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('admin.edit')</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form method="post" action="{{ route('dashboard.users.update', $user->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="controls">

                                            <div class="tab-content" id="myTabContent">
                                                <label>@lang('admin.users.name')</label>
                                                <div class="controls">
                                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                                               value="{{ old('name', $user->name) }}" placeholder="@lang('admin.users.name')">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                    </fieldset>
                                                    @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                                <label>@lang('admin.email')</label>
                                                <div class="controls">
                                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                                               value="{{ old('email', $user->email) }}" placeholder="@lang('admin.email')">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-mail"></i>
                                                        </div>
                                                    </fieldset>
                                                    @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                                <label>@lang('admin.users.password')</label>
                                                <div class="controls">
                                                    <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                                               value="{{ old('password') }}" placeholder="@lang('admin.users.password')">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                    </fieldset>
                                                    @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>

                                        <label>@lang('admin.users.role')</label>
                                        <fieldset class="form-group">
                                            <select name="role_id" class="form-control select2" required>
                                                <option disabled selected>@lang('admin.users.choose_role')</option>
                                                <option value="2" {{ $user->role_id === 2 ? 'selected' : '' }}>@lang('admin.users.role2')</option>
                                                <option value="3" {{ $user->role_id === 3 ? 'selected' : '' }}>@lang('admin.users.role3')</option>
                                            </select>
                                        </fieldset>

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
@endpush
