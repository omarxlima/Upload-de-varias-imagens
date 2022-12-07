<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="save">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (is_array($images) || is_object($images))
                    Visualização da imagem:
                    <div class="row">
                        @foreach ($images as $key => $image)
                            <div class="col-1 card me-1 mb-1">
                                <img src="{{ $image->temporaryUrl() }}">
                            </div>

                        @endforeach
                    </div>
                @endif

                    {{-- envio de imgens --}}
                <div class="mb-3">
                    <label class="form-label">Envio de Foto</label>
                    <input type="file" class="form-control" wire:model="images"   accept="image/png, image/jpeg"  multiple>

                    <div wire:loading wire:target="images">Uploading...</div>
                    @error('images.*')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                {{-- envio de audio --}}
                <div class="mb-3">
                    <label class="form-label">Envio de Áudio</label>
                    <input type="file" class="form-control" wire:model="audios"   accept="image/png, image/jpeg"  multiple>

                    <div wire:loading wire:target="images">Uploading...</div>
                    @error('images.*')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- envio de vídeo --}}

                <div class="mb-3">
                    <label class="form-label">Envio de Vídeo</label>
                    <input type="file" class="form-control" wire:model="images"   accept="image/png, image/jpeg"  multiple>

                    <div wire:loading wire:target="images">Uploading...</div>
                    @error('images.*')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- envio de documento --}}
                <div class="mb-3">
                    <label class="form-label">Envio de Documento</label>
                    <input type="file" class="form-control" wire:model="images"   accept="image/png, image/jpeg"  multiple>

                    <div wire:loading wire:target="images">Uploading...</div>
                    @error('images.*')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Salvar Imagem</button>
                <div wire:loading wire:target="save">process...</div>
            </form>
        </div>
    </div>
</div>
