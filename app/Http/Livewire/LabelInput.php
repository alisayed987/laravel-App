<?php

namespace App\Http\Livewire;

use Livewire\Component;


class LabelInput extends Component
{
    // Recieved -----
    public $info;
    public $input_on;
    public $type;
    //----------------
    public $invalue;


    // Event Functions---------------------
    protected function getListeners()
    {
        return [$this->input_on => 'emitVal'];
    }

    public function emitVal() 
    {
        $data=[];
        $data[$this->info]=$this->invalue;
        $this->emit($this->info,$data);
    }

    public function returnInput()
    {
        $data=[];
        $data[$this->info]=$this->invalue;
        $this->emit($this->info,$data);
    
    }

    // lifeHooks ---------------------------
    public function mount()
    {
        
        $this->invalue=null;
    }

    public function resetFilters()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.label-input');
    }
}
