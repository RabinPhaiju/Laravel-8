<div>
    @livewire('header',['name'=>'Rabin Phaiju'])
  <h1>Multiple File Upload</h1>
  <form wire:submit.prevent='upload'>
    <input type="file" name="file" wire:model.laxy='photos' multiple>
    @error('photos.*') <span class="error">{{ $message }}</span> @enderror
    <br>
  <br><button type="submit">Upload</button>
  </form>
</div>
