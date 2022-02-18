<?php

namespace App\View\Components\SideBar;

use Illuminate\View\Component;

class SideBarList extends Component
{
    public string $to;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $to = "#")
    {
        $this->to = $to;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.side-bar.side-bar-list');
    }
}
