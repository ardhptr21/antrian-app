<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Select extends Component
{

    public string $name;
    public string $label;
    public string $class;
    public string $placeholder;
    public string $error;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name, string $placeholder, string $error = '', string $label = '', string $class = '')
    {
        $this->name = $name;
        $this->label = $label;
        $this->class = $class;
        $this->placeholder = $placeholder;
        $this->error = $error;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.select');
    }
}
