<div>
    <div>
        <input type="seach" wire:model='search'>
    </div>
    <ul>
        <div wire:loading wire:target='search'>
            {{-- target to only search command --}}
            {{-- while talking with controller --}}
                <progress max="100" x-bind:value="progress"></progress>
        </div>
        @if (count($users)>0)
            
        @foreach ($users as $user)
        <li><p>{{$user->name}}</p></li>
        @endforeach
        @else
        <p>No user found</p>
        @endif
        {{ $users->links() }}
        {{-- pagination needs bootstrap or css --}}
    </ul>
  </div>
