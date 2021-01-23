<div>
    Home page of {{$name}}
    <button wire:click="downloadfile">Download Image</button>
    @livewire('counter')
    <div>
        <form wire:submit.prevent="add">
            <input type="number" name="" wire:model.laxy='num1'>
            
            @error('num1')<span>{{$message}}</span>
            @enderror
            <br>
            <input type="number" name="" wire:model.laxy='num2'>
            
            @error('num2')<span>{{$message}}</span>
            @enderror
            <br>
            <button type="submit">Submit</button>
        </form>
            Result : {{$result}}
            <br>
            {{$message}}
    </div>
</div>
