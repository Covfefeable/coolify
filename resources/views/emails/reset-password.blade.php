<x-emails.layout>
{{ __('A password reset has been requested for this email address.') }}

{{ __('Click') }} [{{ __('here') }}]({{ $url }}) {{ __('to reset your password.') }}

{{ __('This link will expire in :count minutes.', ['count' => $count]) }}
</x-emails.layout>
