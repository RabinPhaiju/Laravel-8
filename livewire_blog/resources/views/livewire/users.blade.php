<div>
    <div>
        <input type="seach" wire:model='search'>
    </div>
    <ul>

        @foreach ($users as $user)
        <li><p>{{$user->name}}</p></li>
        @endforeach
        {{ $users->links() }}
    </ul>
  </div>
