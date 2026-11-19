@extends('layouts.base')

@section('body')
    <body class="error-page-body text-black dark:text-inherit">
        <x-toast />
        <x-error-page
            code="419"
            title="{{ __('This page is definitely old, not like you!') }}"
            description="{{ __('Your session has expired. Please log in again to continue.') }}"
            :show-go-back="false"
            :show-dashboard="false"
            primary-href="/login"
            primary-label="{{ __('Back to login') }}">
            <x-forms.collapsible title="{{ __('Using a reverse proxy or Cloudflare Tunnel?') }}" class="error-proxy-help">
                <ul>
                    <li>{{ __('Set the domain under Settings → FQDN to match the URL you use to access Coolify.') }}</li>
                    <li>{{ __('If you use Cloudflare, turn off Browser Integrity Check and Under Attack Mode for your Coolify domain to avoid interrupting sign-in sessions.') }}</li>
                    <li>{{ __('If Coolify is reachable through localhost, sign in there first to configure your FQDN.') }}</li>
                </ul>
            </x-forms.collapsible>
        </x-error-page>
        @livewireScripts
    </body>
@endsection
