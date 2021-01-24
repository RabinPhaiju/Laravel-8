<div>
    <h1>Alpine Js page</h1>
  
    <div x-data='{open:false}' @click.away="open=false">
            <input type="number" name="" wire:model.lazy='num1'>
            <input type="number" name="" wire:model.lazy='num2'>
            
            <br>
            <span x-show.transition.in.duration.1500ms='open'> Result :  <span x-text='$wire.result'></span></span> 
            <button @click="open=true;$wire.add()">Submit</button>
    </div>
</div>
