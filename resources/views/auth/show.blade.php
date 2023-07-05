@extends('auth.layouts.auth')

@section('body_class', 'show')

@section('content')
<div>
    <div class="login_wrapper">
        <div class="animate form">
            <section class="login_content">
                <h1>{{ __('views.auth.show.header') }}</h1>
                <div>
                    <label>{{ __('views.auth.show.label_0') }}:</label>
                    <p>{{ $user->name }}</p>
                </div>
                <div>
                    <label>{{ __('views.auth.show.label_1') }}:</label>
                    <p>{{ $user->email }}</p>
                </div>

                <div class="separator">
                    <p class="change_link">
                        <a href="{{ route('profile.edit', $user->id) }}" class="to_register"> {{ __('views.auth.show.action_1') }}
                        </a>
                    </p>

                    <div class="clearfix"></div>
                    <br />

                    <div>
                        <div class="h1">{{ config('app.name') }}</div>
                        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. {{ __('views.auth.show.copyright_0') }}
                        </p>
                        <p>{{ __('views.auth.show.copyright_1') }}</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

@section('styles')
@parent

{{ Html::style(mix('assets/auth/css/show.css')) }}
@endsection
