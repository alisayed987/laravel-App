<div>

    <div class="container">
        @if (session()->has('msg'))
            <div class="alert alert-{{$msg_state}} mt-4">
                {{ session('msg') }}
            </div>
        @endif
        <div class="row">
            @livewire('label-input',[
            'type'=>"email",
            'info'=>$info[0],
            'input_on'=>$emit_to
            ],key('email'))
        </div>
        <div class="row">
            <div class="col-6">
                @livewire('label-input',[
                'type'=>"text",
                'info'=>$info[1],
                'input_on'=>$emit_to
                ],key('area'))
            </div>
            <div class="col-6">
                @livewire('label-input',[
                'type'=>"text",
                'info'=>$info[2],
                'input_on'=>$emit_to
                ],key('street'))
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                @livewire('label-input',[
                'type'=>"text",
                'info'=>$info[3],
                'input_on'=>$emit_to
                ],key('building'))
            </div>
            <div class="col-4">
                @livewire('label-input',[
                'type'=>"text",
                'info'=>$info[4],
                'input_on'=>$emit_to
                ],key('floor'))
            </div>
            <div class="col-4">
                @livewire('label-input',[
                'type'=>"text",
                'info'=>$info[5],
                'input_on'=>$emit_to
                ],key('apartment'))
            </div>
        </div>
        <button class="btn btn-primary mt-3" wire:click="submit">show</button>

    </div>

</div>