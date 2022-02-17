<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{

    public string $type;
    public string $name;
    public string $value;
    public string $placeholder;
    public string $class;
    public string $label;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $type, string $name, string $label, string $value = '', string $placeholder = '', string $class = '')
    {
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->class = $class;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input');
    }
}
