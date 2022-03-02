<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ZeroDaHero\LaravelWorkflow\Traits\WorkflowTrait;

class PullRequest extends Model
{
    use HasFactory, WorkflowTrait;

    public const EXCEPTIONAL_MARKING = 'reset';

    protected $fillable = [
        'title',
        'body',
        'marking',
    ];

    protected $appends = [
        'initialPlace',
        'transitions',
    ];

    public function getTransitionsAttribute(): array
    {
        $transitions = $this->definition()->getTransitions() ?? [];
        $filterTransitions = array_map(static fn($transition) => $transition->getName(), $transitions);

        return array_unique($filterTransitions);
    }

    public function getInitialPlaceAttribute(): string
    {
        $initialPlaces = $this->definition()->getInitialPlaces();

        return $initialPlaces[0] ?? 'start';
    }

    private function definition()
    {
        return $this->workflow_get()->getDefinition();
    }
}
