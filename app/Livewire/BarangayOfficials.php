<?php

namespace App\Livewire;

use App\Models\BarangayOfficial;
use Livewire\Component;

class BarangayOfficials extends Component
{
    public $capt;

    public $officials = [];

    public function render()
    {
        return view('livewire.barangay-officials');
    }

    public function mount()
    {
        $this->capt = BarangayOfficial::where('sort', 1)->first();

        $this->officials = BarangayOfficial::whereNot('sort',1)->orderBy('sort','ASC')->get();
    }
}
