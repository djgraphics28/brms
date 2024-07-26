<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputError extends Component
{
    public $for;

    public function __construct($for)
    {
        $this->for = $for;
    }

    public function render()
    {
        return view('components.input-error');
    }
}
