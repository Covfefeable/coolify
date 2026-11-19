<?php

use App\Models\InstanceSettings;
use App\Models\Team;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Blade;

uses(RefreshDatabase::class);

beforeEach(function () {
    InstanceSettings::forceCreate(['id' => 0]);
});

it('localizes confirmation instructions and preserves the text to enter', function () {
    app()->setLocale('zh-cn');

    $html = Blade::render('<x-modal-confirmation />');

    expect($html)
        ->toContain('确定继续吗？')
        ->toContain('请在下方输入名称以确认操作')
        ->toContain('此操作无法撤销')
        ->toContain('Confirm Deletion');

    expect(Blade::render('<x-modal-confirmation confirmationLabel="Type cleanup deleted backups to confirm." confirmationText="cleanup deleted backups" />'))
        ->toContain('输入 cleanup deleted backups 以确认。')
        ->toContain("textarea.innerHTML = 'cleanup deleted backups'");
});

it('does not render canGate and canResource as HTML attributes', function () {
    $team = Team::factory()->create(['name' => 'leaky-team-name-7f3a', 'description' => 'leaky-team-description-7f3a']);

    $html = Blade::render(<<<'BLADE'
        <x-modal-confirmation title="Delete team?" buttonTitle="Delete" submitAction="delete"
            canGate="delete" :canResource="$team"
            class="caller-class" @confirm-old-key-deletion.window="modalOpen = true" />
    BLADE, ['team' => $team]);

    expect($html)
        ->not->toContain('leaky-team-name-7f3a')
        ->not->toContain('leaky-team-description-7f3a')
        ->not->toContain('cangate')
        ->not->toContain('canGate')
        ->not->toContain('canresource')
        ->not->toContain('canResource')
        ->toContain('class="caller-class"')
        ->toContain('@confirm-old-key-deletion.window="modalOpen = true"')
        ->toContain('Delete team?');
});
