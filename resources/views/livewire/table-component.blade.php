<div>
    <div class="container">
      @if (session()->has('msg'))
            <div class="alert alert-success mt-4">
                {{ session('msg') }}
            </div>
      @endif
        <table class="table table-striped mt-4" style="text-align:center">
          <thead class="thead-dark">
              @foreach ($table_heads as $index=>$head)
              <th wire:key={{$index}} style="border: 2px solid black">
                  {{$head}}
              </th>
              @endforeach
          </thead>
          <tbody>
              @foreach ($state_array as $key=>$item)
              <tr wire:key={{$key}}>
                @foreach ($table_heads as $index=>$head)    
                <td wire:key={{$index}} style="border: 2px solid black">
                  {{ $item[$head] }}
                </td>
                @endforeach
                <td style="border: 2px solid black">
                  <button class="btn btn-danger m-4" wire:click='deleteAddress({{$item["id"]}})'>
                    delete
                  </button>
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
</div>
