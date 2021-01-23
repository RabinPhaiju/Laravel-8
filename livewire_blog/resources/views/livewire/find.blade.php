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
            <input type="number" name="" wire:model.laxy='num1'>
            <input type="number" name="" wire:model.laxy='num2'>
            <button type="submit">Submit</button>
        </form>
            Result : {{$result}}
            <br>
        <button wire:click='add'>Show Result</button>
    </div>
    <div>
        <form wire:submit.prevent="add">
            <input type="number" name="" wire:model.laxy='num1'>
            <input type="number" name="" wire:model.laxy='num2'>
            {{-- method 1 to call event --}}
            <button type="submit" wire:click="$emit('resultcalculated')">Submit</button>
        </form>
            Result : {{$result}}
            <br>
            {{$message}}
    </div>
    <div>
        <form wire:submit.prevent="subtract">
            <input type="number" name="" wire:model.laxy='num1'>
            <input type="number" name="" wire:model.laxy='num2'>
            <button type="submit">Submit</button>
        </form>
            Result : {{$result}}
            <br>
            {{$message}}
    </div>
</div>
