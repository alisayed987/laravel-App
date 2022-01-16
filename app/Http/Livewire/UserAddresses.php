<?php

namespace App\Http\Livewire;

use App\Models\Address;
use Livewire\Component;

class UserAddresses extends Component
{
    // shared -----------
    public $table_heads;
    public $update_event;
    public $emit_to;
    public $info;
    public $inputs;
    //-------------------
    public $state_array;

    // Events Functions -----------------------------------
    protected function getListeners()
    {
        $listeners_arr=[];
        foreach($this->info as $item){
            $listeners_arr[$item] = 'returnIn';
        }
        $listeners_arr['DeleteAddress']='deleteAddress';
        return $listeners_arr;
    }

    public function returnIn($data)
    {
        $this->inputs[array_keys($data)[0]]=array_values($data)[0];
    }
    public function submitForm()
    {
        $this->tableFilling($this->inputs);
    }

    public function deleteAddress($id)
    {
        
        if($id){
            $user_id = Address::where('id',$id)->value('user_id');
            $deleted = Address::where('id',$id)->delete();
            $this->state_array = Address::where('user_id',$user_id)->get();
            $this->emit($this->update_event,$this->state_array,$deleted);
        }{ $this->emit($this->update_event,[]);}
    }

    public function tableFilling($payload)
    {
        if($payload){
            $this->state_array = Address::where('user_id',$payload['user_id'])->get();
            $this->emit($this->update_event,$this->state_array);
        }else { 
            $this->emit($this->update_event,[]);
        }
        
    }
    
    
    // lifeHooks ------------------------------------------
    public function mount()
    {
        $this->table_heads=["street", "building_num", "floor", "apartment_num"];
        $this->update_event = 'table_on';
        $this->emit_to= 'submit';
        $this->info=['user_id'];
        $this->state_array=[];
        
    }
    public function render()
    {
        return view('livewire.user-addresses');
    }
}
