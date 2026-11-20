<?php

use Illuminate\Support\Facades\Blade;

it('renders the standard table toolbar controls', function () {
    $html = Blade::render(<<<'BLADE'
        <x-table.toolbar>
            <x-slot:search>
                <x-table.search placeholder="Search deployments" wire:model.live="search" />
            </x-slot:search>
            <x-table.filter :active-count="2" reset-action="clearFilters">
                <button class="listbox-option">Success</button>
            </x-table.filter>
            <x-table.sort>
                <button class="listbox-option">Newest first</button>
            </x-table.sort>
        </x-table.toolbar>
    BLADE);

    expect($html)
        ->toContain('table-toolbar')
        ->toContain('table-search')
        ->toContain('wire:model.live="search"')
        ->not->toContain('x-teleport="body"')
        ->not->toContain('floatingDropdown(')
        ->toContain("panelStyle: 'position: fixed; min-width: 0; visibility: hidden;'")
        ->toContain("this.panelStyle = 'position: fixed; min-width: 0; visibility: hidden;'")
        ->toContain('position: fixed')
        ->toContain('min-width: 0')
        ->toContain('getBoundingClientRect()')
        ->toContain('x-show="open"')
        ->toContain('aria-multiselectable="true"')
        ->toContain('Reset filters')
        ->toContain('wire:click="clearFilters"')
        ->toContain('Sort');
});


it('localizes the filter trigger and canvas add label in Simplified Chinese', function () {
    app()->setLocale('zh-cn');

    expect(Blade::render('<x-table.filter reset-action="clearFilters" />'))
        ->toContain('>筛选</span>')
        ->toContain('>重置筛选条件</span>');
    expect(__('Add'))->toBe('添加');
});
