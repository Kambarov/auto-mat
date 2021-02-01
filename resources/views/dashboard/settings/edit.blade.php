@extends('dashboard.layouts.app')
@section('title', trans('admin.edit'). ' '. trans('admin.settings.title') .' - ')

@section('content')
    <section class="input-validation">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('admin.edit')</h4>
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary">@lang('admin.back')</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form method="post" action="{{ route('dashboard.settings.update', $setting->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-md-6">
                                        <label>@lang('admin.phone')</label>
                                        <div class="controls">
                                            <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                <input type="text" name="phone" required class="form-control @error('phone') is-invalid @enderror"
                                                   value="{{ old('phone', $setting->phone) }}" placeholder="@lang('admin.phone')">
                                                <div class="form-control-position">
                                                    <i class="feather icon-phone"></i>
                                                </div>
                                            </fieldset>
                                            @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label>@lang('admin.settings.email')</label>
                                        <div class="controls">
                                            <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                                       value="{{ old('email', $setting->email) }}"
                                                       placeholder="@lang('admin.settings.email')" required>
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
                                    </div>

                                    <div class="col-md-12">

                                    </div>

                                    <div class="col-md-4">
                                        <label>@lang('admin.settings.link') Telegram</label>
                                        <div class="controls">
                                            <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                <input type="text" name="socials[telegram]" class="form-control @error('socials.telegram') is-invalid @enderror"
                                                       value="{{ old('socials.telegram', $setting->getSocialsTelegram()) }}"
                                                       placeholder="@lang('admin.settings.link') Telegram" required>
                                                <div class="form-control-position">
                                                    <i class="feather icon-send"></i>
                                                </div>
                                            </fieldset>
                                            @error('socials.telegram')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>@lang('admin.settings.link') Instagram</label>
                                        <div class="controls">
                                            <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                <input type="text" name="socials[instagram]" class="form-control @error('socials.instagram') is-invalid @enderror"
                                                       value="{{ old('socials.instagram', $setting->getSocialsInstagram()) }}"
                                                       placeholder="@lang('admin.settings.link') Instagram" required>
                                                <div class="form-control-position">
                                                    <i class="feather icon-instagram"></i>
                                                </div>
                                            </fieldset>
                                            @error('socials.instagram')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label>@lang('admin.settings.link') Facebook</label>
                                        <div class="controls">
                                            <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                <input type="text" name="socials[facebook]" class="form-control @error('socials.facebook') is-invalid @enderror"
                                                       value="{{ old('socials.facebook', $setting->getSocialsFacebook()) }}"
                                                       placeholder="@lang('admin.settings.link') Facebook" required>
                                                <div class="form-control-position">
                                                    <i class="feather icon-facebook"></i>
                                                </div>
                                            </fieldset>
                                            @error('socials.facebook')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label>@lang('admin.address')</label>
                                        <div class="controls">
                                            <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                                                       value="{{ old('address', $setting->address) }}" placeholder="@lang('admin.address')" required>
                                                <div class="form-control-position">
                                                    <i class="feather icon-map"></i>
                                                </div>
                                            </fieldset>
                                            @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
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
