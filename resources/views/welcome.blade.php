<x-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center my-3">
                <h1>My Open AI</h1>
                <h5>YOU ask, I answer!</h5>
            </div>
        </div>
<div>
    <p>prova a generare un immagine</p>
    <a href="{{route('imageGen')}}" class="btn btn-primary">clicca qui</a>
</div>
        <div class="row justify-content-center align-items-center">
            <div class="col-7 my-5">
                <livewire:chat />
            </div>
        </div>
    </div>
</x-layout>