<div>
    @livewire('header',['name'=>'Rabin Phaiju'])
  <h1>Upload File</h1>
  <form wire:submit.prevent='upload'>
    @if ($photo)
        Photo Preview:
        <img src="{{ $photo->temporaryUrl() }}">
    @endif
    <input type="file" name="file" wire:model.laxy='photo'>
    @error('photo') <span class="error">{{ $message }}</span> @enderror
    <br>
  <br><button type="submit">Upload</button>
  </form>
</div>
