<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DocumentModal extends Component
{
    public $isOpen = false;
    public $documentType;
    public $modalContent;

    protected $listeners = ['openModal'];

    public function openModal($documentType)
    {
        $this->documentType = $documentType;
        $this->modalContent = $this->getContentForDocument($documentType);
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function getContentForDocument($documentType)
    {
        $content = [
            'Cedula' => 'Details and requirements for Cedula...',
            'Barangay ID' => 'Details and requirements for Barangay ID...',
            'Barangay Clearance' => 'Details and requirements for Barangay Clearance...',
            'Certificate of Indigency' => 'Details and requirements for Certificate of Indigency...',
        ];

        return $content[$documentType] ?? 'Content not available.';
    }

    public function render()
    {
        return view('livewire.document-modal');
    }
}
