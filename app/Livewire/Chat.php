<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Chat extends Component
{
    public $message;
    public $content;
    public $error;

    public $messages;

    public function mount(){
        $messages = [];
    }

    public function send(){
        $this->messages[] = [
            'role' => 'user',
            'content' => $this->message
        ];

        $res = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPEN_ROUTER_KEY'),
            'Content-Type' => 'application/json'
        ])->post('https://openrouter.ai/api/v1/chat/completions', [
            'model' => env('OPEN_ROUTER_MODEL'),
            'messages' => $this->messages,
            'max_tokens' => env('OPEN_ROUTER_MAX_TOKENS', 700)
        ]);

        $json = $res->json();

        $this->messages[] = [
            'role' => 'assistant',
            'content' => $json['choices'][0]['message']['content']
        ];

        if (isset($json['error'])) {
            $this->error = $json['error'];
            return;
        }
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
