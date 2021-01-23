<div>
    @livewire('header',['name'=>'Rabin Phaiju'])
  <h1>Upload File</h1>
  <form wire:submit.prevent='upload'>
    @if ($photo)
        <img width="100" src="{{ $photo->temporaryUrl() }}">
        <div x-show="isUploading">
          <progress max="100" x-bind:value="progress"></progress>
      </div>
    @endif
    <input type="file" name="file" wire:model.laxy='photo'>
    @error('photo') <span class="error">{{ $message }}</span> @enderror
    <br>
  <br><button type="submit">Upload</button>
  </form>
</div>
