<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextInput extends Component
{
    public $id;
    public $type;
    public $value;
    public $placeholder;

    public function __construct($id, $type = 'text', $value = '', $placeholder = '')
    {
        $this->id = $id;
        $this->type = $type;
        $this->value = $value;
        $this->placeholder = $placeholder;
    }

    public function render()
    {
        return view('components.text-input');
    }
}
