<?php

namespace Bloom\Components\Pagination;

use Roots\Acorn\View\Component;

class Pagination extends Component
{
    public $query;

    public $page;

    public $maxNumPages;

    public function __construct($query = null, $page = 1)
    {
        $this->query = $query;
        $this->page = $page;
        $this->maxNumPages = $query->max_num_pages ?? 1;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        if (! $this->canOutputComponent()) {
            return '';
        }

        return $this->view('Components.Pagination.pagination');
    }

    /**
     * Check if the component has enough data to try and output the buttons.
     *
     * @return bool
     */
    private function canOutputComponent()
    {
        // Check the following data exists
        return $this->query;
    }
}
