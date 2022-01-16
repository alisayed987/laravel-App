<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\Area;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class CreateAddress extends Component
{   
    
    // Shared ------
    public $parent;
    public $info;
    public $emit_to;
    // -------------
    public $msg_state;
    public $inputs;
   

    // Event Functions -------------------------
    public function submit()
    {
            
            $req = new Request($this->inputs);
            try {
                $validate = Validator::make($req->all(),[
                    'email' => 'required|email',
                    'area' => 'required',
                    'street' => 'required',
                    'building_num' => 'nullable',
                    'floor' => 'nullable',
                    'apartment_num' => 'nullable',
                ]);
                // Validation flash message -----------------------------
                // --------------failed Validation ----------------------
                if ($validate->fails()) {
                    $vf = $validate->failed();
                    if(array_key_exists('email',$vf)){
                        if(array_key_exists('Required',$vf['email'])){
                            $this->msg_state = 'danger';
                            session()->flash('msg','Email Required');
                        }elseif(array_key_exists('Email',$vf['email'])){
                            $this->msg_state = 'danger';
                            session()->flash('msg','Wrong Email');
                        }
                    }elseif (array_key_exists('area',$vf)){
                        if(array_key_exists('Required',$vf['area'])){
                            $this->msg_state = 'danger';
                            session()->flash('msg','Area Required');
                        }
                    }elseif (array_key_exists('street',$vf)){
                        if(array_key_exists('Required',$vf['street'])){
                            $this->msg_state = 'danger';
                            session()->flash('msg','Street Required');
                        }
                    }
                } else {
                    // --------------Success Validation ----------------------
                    // ----Check if existance of user && area -----------------
                    $user_email = $req['email'];
                    $user_exists = User::where('email', $user_email)->first();
                    $area = $req['area'];
                    $area_exists = Area::where('name', $area)->first();
                    if (!isset($user_exists)) {
                        $this->msg_state = 'danger';
                        session()->flash('msg','User does not exist');
                        return;
                    }
                    if (!isset($area_exists)) {
                        $this->msg_state = 'danger';
                        session()->flash('msg','Area does not exist');
                        return;
                    }
                    
                    $address = new Address;
                    $address->street = $req->input('street');
                    $address->building_num = $req->input('building');
                    $address->floor = $req->input('floor');
                    $address->apartment_num = $req->input('apt');
                    $address->user_id = $user_exists['id']; 
                    $address->area_id = $area_exists['id']; 
                    $created = $address->save();
                    if($created){
                        $this->msg_state = 'success';
                        session()->flash('msg','User Created');
                    }else{
                        $this->msg_state = 'danger';
                        session()->flash('msg','Something went wrong');
                    }
                }
            } catch (Exception $err) {
                $this->msg_state = 'danger';
                session()->flash('msg','Exception '.$err->getMessage());
            }
              
        
    }

    protected function getListeners()
    {
        $listeners_arr=[];
        foreach($this->info as $item){
            $listeners_arr[$item] = 'returnIn';
        }
        return $listeners_arr;
    }
    

    public function returnIn($data)
    {
        $this->inputs[array_keys($data)[0]]=array_values($data)[0];
    }

    // lifeHooks --------------------------------
    public function mount()
    {
        $this->info=["email","area","street","building_num","floor","apartment_num"];
        $this->emit_to = 'submit';
        $this->inputs=[
            'email' => null,
            'area' => null,
            'street' => null,
            'building_num' => null,
            'floor' => null,
            'apartment_num' => null,
        ];
        $this->msg_state='';
        
    }

    public function render()
    {
        return view('livewire.create-address');
    }
}
