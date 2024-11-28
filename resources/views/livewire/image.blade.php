<div>
    <div class="text-start">
        <h5>Genera un'immagine</h5>
    </div>


    <div class="p-3 boxChat rounded">
        <form wire:submit="askImage">
            <div class="input-group mb-3">

                <input type="text"
                    wire:model="prompt"
                    class="form-control"
                    placeholder="prompt..."
                    aria-label="prompt..."
                    aria-describedby="button-addon2">

                <button class="btn btn-outline-dark" type="submit" id="button-addon2"><i class="bi bi-send-fill"></i></button>
            </div>
        </form>

        @foreach($images as $image)
        <img src="{{ $image }}" class="img-fluid">
        @endforeach
        
    </div>
</div>