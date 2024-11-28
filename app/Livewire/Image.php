<?php

namespace App\Livewire;

use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;

class Image extends Component
{
    public $prompt;
    public $images = [];

    public function askImage(){
        $response = OpenAI::images()->create([
            'model' => 'dall-e-3',
            'prompt' => $this->prompt,
            'n' => 1,
            'size' => '1024x1024',
            'response_format' => 'url',
        ]);
        $this->images[] = $response->data[0]->url;
    }

    public function render()
    {
        return view('livewire.image');
    }
}
