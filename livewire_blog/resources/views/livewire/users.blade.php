<div>
    <div>
        <input type="seach" wire:model='search'>
    </div>
     {{-- run the command every 2 sec. default --}}
    {{-- <div wire:poll>
        Current time: {{ now() }}
    </div> --}}

    {{-- If you'd like to keep polling at the normal rate even 
    while the tab is in the background, you can use the keep-alive modifier: --}}
    {{-- <div wire:poll.keep-alive>
        Current time: {{ now() }}
    </div> --}}
    <div wire:poll.1000ms>
        Current time: {{ now() }}
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
