<div>
    <div>
        <input type="seach" wire:model='search'>
    </div>
    <ul>

        @foreach ($users as $user)
        <li><h2>{{$user->name}}</h2></li>
        @endforeach
    </ul>
  </div>
