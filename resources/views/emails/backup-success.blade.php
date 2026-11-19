<x-emails.layout>
{{ __('Database backup for :name with frequency of :frequency was successful.', ['name' => $database_name ? $name.' (db:'.$database_name.')' : $name, 'frequency' => $frequency]) }}
</x-emails.layout>
