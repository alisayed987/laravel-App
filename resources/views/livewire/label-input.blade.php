<div>
    @csrf

    <label
    for={{$info}}
    >{{$info}}</label>
    <input 
    class="form-control"
    type={{$type}} 
    id={{$info}} 
    placeholder={{$info}}
    wire:model='invalue'
    wire:input='returnInput'
    >
</div>