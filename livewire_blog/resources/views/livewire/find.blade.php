<div>
    {{-- <input type="text" name="" wire:model.lazy='name'> --}}

    <input type="text" name="" wire:model.lazy='name'>
    {{-- laxy loading means , it dont sent request till it is on focus. --}}
    <input type="text" name="" wire:model.debounce.1000ms='student.s_name'>
    {{-- debounce.1000ms means it take 1000 ms to sent the request to update the data. --}}

    <p>{{$name}}</p>
    <p>{{$student['s_name']}}</p>
</div>
