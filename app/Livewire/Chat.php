<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Chat extends Component
{
    public $message;
    public $content;
    public $error;

    public function send(){
        $res = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPEN_ROUTER_KEY'),
            'Content-Type' => 'application/json'
        ])->post('https://openrouter.ai/api/v1/completions', [
            'model' => env('OPEN_ROUTER_MODEL'),
            'prompt' => $this->message . ' (support the response with <code></code> highlight.js snippets)',
            'max_tokens' => 400
        ]);

        $json = $res->json();

        if (isset($json['error'])) {
            $this->error = $json['error'];
            return;
        }

        $this->content = $json['choices'][0]['text'];
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
