@props(['commit' => null])
@if ($commit)
@php
    $commitLine = null;
    if ($commit['short_sha']) {
        $shortSha = e($commit['short_sha']);
        $commitLine = '**'.__('Commit:').'** '.($commit['url'] ? "[{$shortSha}](".e($commit['url']).')' : $shortSha);
        if ($commit['branch']) {
            $commitLine .= ' '.e(__('on :branch', ['branch' => $commit['branch']]));
        }
    }
    $messageBlock = $commit['message'] ? '**'.__('Commit message:')."**\n\n".e($commit['message']) : null;
@endphp
{!! collect([$commitLine, $messageBlock])->filter()->implode("\n\n") !!}

@endif
