<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Symfony\Component\Console\Output\ConsoleOutput;

class TableComponent extends Component
{
    // Recieved --------
    public $table_heads;
    public $table_on;
    //------------------
    public $saved_heads;
    public $state_array=[];

    // Events Functions --------------------------------
    
    protected function getListeners()
    {
        return [$this->table_on => 'updateTable'];
    }
    
    public function updateTable($payload,$deleted=3)
    {
        if($payload){
            $this->state_array=$payload;
            if($deleted==1){
                session()->flash('msg','Address deleted');
            }elseif($deleted==0){
                session()->flash('msg','Address is not deleted');
            }
        }else{$this->reset('state_array');}
    }

    public function deleteAddress($id)
    {
        $this->emit('DeleteAddress',$id);
    }
    // LifeHooks ---------------------------------------
    public function mount()
    {
        $this->state_array = [];
        $this->saved_heads = $this->table_heads;
        $this->data=0;
    }

    public function render()
    {
        return view('livewire.table-component');
    }
}
