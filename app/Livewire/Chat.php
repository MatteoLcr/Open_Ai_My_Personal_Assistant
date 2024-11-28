<?php

namespace App\Livewire;

use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;

class Chat extends Component
{
    public $prompt = '';
    public $conversationMessages = []; 

    public $products = '[
    {"name": "Assicurazione Auto", "product": "Protezione contro danni e incidenti per veicoli a motore."},
    {"name": "ImmaginaAdesso Casa", "product": "Copertura per danni alla proprietà e responsabilità civile."},
    {"name": "scegli col cuore per chi ami", "product": "polizza sulal vita; Garanzia di protezione finanziaria per i familiari in caso di decesso."},
    {"name": "Assicurazione Viaggi", "product": "Copertura per spese mediche e annullamento viaggi."},
    {"name": "ImmaginaAdesso Salute&Benessere", "product": "Rimborso per spese mediche e trattamenti sanitari."},
    {"name": "immagineAdesso Infortuni", "product": "Copertura per danni fisici derivanti da infortuni."},
    {"name": "immagineAdesso Cucciolo", "product": "Protezione per spese veterinarie e responsabilità per animali domestici."},
    {"name": "Assicurazione Mutuo", "product": "Protezione per l immobile in caso di danni durante il pagamento del mutuo."},
    {"name": "Assicurazione Professionale", "product": "Copertura per responsabilità professionale e legale."},
    {"name": "ImmagineAdesso Armonia", "product": "Responsabilita civiile; Tutela contro danni causati a terzi."}
]';


    public function ask()
    {

        $this->conversationMessages[] = [
            'role' => 'user',
            'content' => $this->prompt,
        ];  

        $result = OpenAI::chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => $this->conversationMessages
        ]);
        
        $this->conversationMessages[] = [
            'role' => 'assistant',
            'content' => $result->choices[0]->message->content,
        ];  

        $this->prompt = '';
    }

    public function mount() {

        $formatRedirect = view('components.chat.button')->render();
        $this->conversationMessages[] = [
            'role' => 'system',
            'content' => "Sei la segretaria del dott. Lucarelli, consulente assicurativo e di investimento. Usa un linguaggio professionale, un tono serio ed informale. rispondi in massimo 20 righe. Quando sembra che la conversazione sia terminata chiedi al cliente di lasciare una mail e il numero di telefono cosicche io possa contattarlo aggiungendo un bottone per farlo. $formatRedirect
            ecco la lista dei prodotti: \n $this->products "
        ];
    }
    public function render()
    {
        return view('livewire.chat');
    }
}
