<x-emails.layout>
{{ __('Database backup for :name with frequency of :frequency was FAILED.', ['name' => $database_name ? $name.' (db:'.$database_name.')' : $name, 'frequency' => $frequency]) }}

### {{ __('Reason') }}

{{ $output }}

@isset($reminder)
{{ $reminder }}
@endisset
</x-emails.layout>
