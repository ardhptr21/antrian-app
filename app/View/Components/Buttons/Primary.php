<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class Primary extends Component
{

    public string $class;
    public string $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $class, string $type)
    {
        $this->class = $class;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buttons.primary');
    }
}
