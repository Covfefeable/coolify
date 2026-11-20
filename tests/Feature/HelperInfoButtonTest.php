<?php

use Illuminate\Support\Facades\Blade;

test('helper popup renders when the component is used next to a listbox label', function () {
    $html = Blade::render(<<<'BLADE'
        <x-forms.listbox id="serverTimezone" label="Server timezone"
            helper="Used for backup schedules." :options="[
                ['value' => 'UTC', 'label' => 'UTC'],
            ]" :wire="false" value="UTC" />
    BLADE);

    expect($html)
        ->toContain('Server timezone')
        ->toContain('Used for backup schedules.')
        ->toContain('type="button"')
        ->toContain('aria-label="More information"')
        ->toContain('serverTimezone-trigger')
        // Helper button must not be nested inside the label[for=trigger] element.
        ->not->toMatch('/<label[^>]*for="serverTimezone-trigger"[^>]*>[\s\S]*aria-label="More information"[\s\S]*<\/label>/');
});

test('application setting help localizes the accessible label and keeps its documentation link', function () {
    app()->setLocale('zh-cn');

    $html = Blade::render(<<<'BLADE'
        <x-application.settings-section title="GPU"
            :helper="__('Comma separated list of device ids. More info <a href=\'https://docs.docker.com/compose/gpu-support/#access-specific-devices\' class=\'underline dark:text-white\' target=\'_blank\'>here</a>.')" />
    BLADE);

    expect($html)
        ->toContain('aria-label="查看 GPU 的说明"')
        ->toContain('设备 ID 以逗号分隔。')
        ->toContain("href='https://docs.docker.com/compose/gpu-support/#access-specific-devices'")
        ->toContain('>文档</a>');
});
