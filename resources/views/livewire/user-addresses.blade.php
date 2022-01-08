<div>
    <div class="container">
        <div class="row mt-4">
          <div class="col form-group">
            @livewire('label-input',[
                'type'=>"text",
                'info'=>$info[0],
                'input_on'=>$emit_to
                ],key('user_id'))
          </div>
              <button class="btn btn-primary mt-4" wire:click.prevent='submitForm'>
                Get Addresses
              </button>
        </div>
        @livewire('table-component', ['table_heads' => $table_heads,'table_on'=>$update_event], key("table"))
      </div>
</div>
