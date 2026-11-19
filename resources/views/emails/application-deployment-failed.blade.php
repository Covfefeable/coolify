<x-emails.layout>
@if (! empty($blocked))
{{ $blocked }}.

{{ __('The image scan blocked the deployment of :name. See the Vulnerabilities page of the application for the results.', ['name' => $name]) }}
@elseif ($pull_request_id === 0)
{{ __('Failed to deploy a new version of :name at', ['name' => $name]) }} [{{ $fqdn }}]({{ $fqdn }}) .
@else
{{ __('Failed to deploy a pull request #:id of :name at', ['id' => $pull_request_id, 'name' => $name]) }}
[{{ $fqdn }}]({{ $fqdn }}).
@endif

<x-emails.deployment-commit :commit="$commit ?? null" />
[{{ __('View Deployment Logs') }}]({{ $deployment_url }})
</x-emails.layout>
