<div>
    Home page of {{$name}}
    @livewire('counter')
    @livewire('counter')
    <div>
        <form wire:submit.prevent="add">
            <input type="number" name="" wire:model.laxy='num1'>
            <input type="number" name="" wire:model.laxy='num2'>
            <button type="submit">Submit</button>
        </form>
            Result : {{$result}}
            <br>
            {{$message}}
    </div>
</div>
