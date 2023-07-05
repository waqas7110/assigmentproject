@extends('auth.layouts.auth')

@section('body_class', 'edit')

@section('content')
<div>
    <div class="login_wrapper">
        <div class="animate form">
            <section class="login_content">
                {{ Form::model($user, ['route' => ['profile.update', $user->id], 'method' => 'PUT']) }}
                
                <h1>{{ __('views.auth.edit.header') }}</h1>
                <div>
                    <input type="text" name="name" class="form-control" placeholder="{{ __('views.auth.edit.input_0') }}"
                        value="{{ $user->name }}" required autofocus />
                </div>
                <div>
                    <input type="email" name="email" class="form-control" placeholder="{{ __('views.auth.edit.input_1') }}"
                        value="{{ $user->email }}" required />
                </div>
                <div>
                    <input type="password" name="password" class="form-control" placeholder="{{ __('views.auth.edit.input_2') }}"
                        required="" />
                </div>
                <div>
                    <input type="password" name="password_confirmation" class="form-control"
                        placeholder="{{ __('views.auth.edit.input_3') }}" required />
                </div>

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (!$errors->isEmpty())
                <div class="alert alert-danger" role="alert">
                    {!! $errors->first() !!}
                </div>
                @endif

                <div>
                    <button type="submit" class="btn btn-default submit">{{ __('views.auth.edit.action_1') }}</button>
                </div>

                <div class="clearfix"></div>

                <div class="separator">
                    <p class="change_link">{{ __('views.auth.edit.message') }}
                        <a href="{{ route('profile.show') }}" class="to_register"> {{ __('views.auth.edit.action_2') }}
                        </a>
                    </p>

                    <div class="clearfix"></div>
                    <br />

                    <div>
                        <div class="h1">{{ config('app.name') }}</div>
                        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. {{ __('views.auth.edit.copyright_0') }}
                        </p>
                        <p>{{ __('views.auth.edit.copyright_1') }}</p>
                    </div>
                </div>
                {{ Form::close() }}
            </section>
        </div>
    </div>
</div>
@endsection

@section('styles')
@parent

{{ Html::style(mix('assets/auth/css/edit.css')) }}
@endsection
