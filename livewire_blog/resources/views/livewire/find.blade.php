<div>
    <div>
        {{-- <input type="text" name="" wire:model='name'> --}}
        
        <input type="text" name="" wire:model.lazy='name'>
        {{-- laxy loading means , it dont sent request till it is on focus. --}}
        <input type="text" name="" wire:model.debounce.1000ms='student.s_name'>
        {{-- debounce.1000ms means it take 1000 ms to sent the request to update the data. --}}
        
        <p>{{$name}}</p>
        <p>{{$student['s_name']}}</p>
    </div>
    <div>
        <form wire:submit.prevent="add">
            <input type="number" name="" wire:model.lazy='num1'>
            <input type="number" name="" wire:model.lazy='num2'>
            <div wire:loading.delay>
                {{-- If you want to avoid flickering because loading is very fast, 
                    you can add the .delay modifier, 
                    and it will only show up if loading takes longer than 200ms --}}
                {{-- while talking with controller --}}
                {{-- You can add or remove classes from an element during loading states, 
                    by adding the .class modifier to the wire:loading directive. --}}
                    {{-- You can also perform the inverse and remove classes by adding the .remove modifier. --}}
                    <progress max="100" x-bind:value="progress"></progress>
                <p>Loading...</p>
            </div>
            <div wire:loading.remove>
                {{-- opposite of loading --}}
            <button type="submit">Submit ()</button>
            </div>
        </form>
            Result : {{$result}}
            <br>
        <button wire:click='add'>Show Result</button>
    </div>
    <div>
        <form wire:submit.prevent="add">
            <input type="number" name="" wire:model.lazy='num1'>
            <input type="number" name="" wire:model.lazy='num2'>
            {{-- method 1 to call event --}}
            <button type="submit" wire:click="$emit('resultcalculated')">Submit</button>
        </form>
            Result : {{$result}}
            <br>
            {{$message}}
    </div>
    <div>
        <form wire:submit.prevent="subtract">
            <input type="number" name="" wire:model.lazy='num1'>
            <input type="number" name="" wire:model.lazy='num2'>
            <button type="submit">Submit</button>
        </form>
            Result : {{$result}}
            <br>
            {{$message}}
    </div>
    <div>
        <p>prefetch</p>
        <input type="number" name="" wire:model.lazy='num1'>
        <input type="number" name="" wire:model.lazy='num2'>
        <div wire:offline>
            You are now offline.
        </div>
        <button type="submit" wire:offline.attr="disabled" wire:click.prefetch="subtract">Submit</button>
        Result : {{$result}}
            <br>
            {{$message}}
    </div>
</div>
