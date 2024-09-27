<?php

namespace Bloom\Components\StatsRow;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatsRow extends Component
{
    // class properties
    public array $statsRow;

    /**
     * Create a new component instance.
     *
     * @param  array{prefix: string, stat: string, suffix: string, description: string}  $statsRow
     */
    public function __construct(array $statsRow)
    {
        $this->statsRow = $statsRow;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if (! $this->canOutputComponent()) {
            return '';
        }

        return $this->view('Components.StatsRow.stats-row');
    }

    /**
     * Check if the component has enough data to try and output the buttons.
     *
     * @return bool
     */
    private function canOutputComponent(): array|string
    {
        // Check the required data exists
        return $this->statsRow;
    }
}
