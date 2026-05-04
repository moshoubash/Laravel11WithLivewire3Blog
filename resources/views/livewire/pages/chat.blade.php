@section('styles')
<style>
    .markdown-content p { margin-bottom: 1rem; line-height: 1.6; }
    .markdown-content p:last-child { margin-bottom: 0; }
    .markdown-content pre {
        background-color: #111827; /* gray-900 */
        color: #e5e7eb; /* gray-200 */
        padding: 1rem;
        border-radius: 0.5rem;
        overflow-x: auto;
        margin-top: 0.5rem;
        margin-bottom: 1rem;
        border: 1px solid #374151; /* gray-700 */
    }
    .markdown-content code {
        background-color: #374151; /* gray-700 */
        padding: 0.2rem 0.4rem;
        border-radius: 0.25rem;
        font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        font-size: 0.875em;
    }
    .markdown-content pre code {
        background-color: transparent;
        padding: 0;
        border-radius: 0;
        font-size: 0.875em;
    }
    .markdown-content ul {
        list-style-type: disc;
        margin-left: 1.5rem;
        margin-bottom: 1rem;
    }
    .markdown-content ol {
        list-style-type: decimal;
        margin-left: 1.5rem;
        margin-bottom: 1rem;
    }
    .markdown-content li { margin-bottom: 0.25rem; }
    .markdown-content h1, .markdown-content h2, .markdown-content h3, .markdown-content h4 {
        font-weight: 700;
        margin-top: 1.5rem;
        margin-bottom: 0.75rem;
        line-height: 1.3;
    }
    .markdown-content h1 { font-size: 1.5rem; }
    .markdown-content h2 { font-size: 1.25rem; }
    .markdown-content h3 { font-size: 1.125rem; }
    .markdown-content a {
        color: #60a5fa; /* blue-400 */
        text-decoration: underline;
    }
    .markdown-content blockquote {
        border-left: 4px solid #4b5563; /* gray-600 */
        padding-left: 1rem;
        color: #9ca3af; /* gray-400 */
        font-style: italic;
        margin-bottom: 1rem;
        background-color: rgba(75, 85, 99, 0.1); /* light gray background */
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        border-radius: 0 0.25rem 0.25rem 0;
    }
    .markdown-content table {
        width: 100%;
        margin-bottom: 1rem;
        border-collapse: collapse;
    }
    .markdown-content th, .markdown-content td {
        border: 1px solid #4b5563; /* gray-600 */
        padding: 0.5rem;
    }
</style>
@endsection

<div class="p-4 min-h-screen bg-gray-800" style="
    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.5)), url({{ asset('images/background2.jpg') }});
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
">
    @if($messages !== null)
        <div class="my-3 bg-dark text-white py-2 px-4 rounded-xl mx-auto" style="max-width: 1000px;">
            @foreach ($messages as $message)
                @php
                    $isArabic = preg_match('/\p{Arabic}/u', $message['content']);
                @endphp
                @if ($message['role'] === 'user')
                    <p class="{{ $isArabic ? 'text-right' : 'text-left' }} my-3 bg-gray-400 text-gray-800 p-4 rounded-xl" {!! $isArabic ? 'dir="rtl"' : '' !!}>{{ $message['content'] }}</p>
                @else
                    <div class="mb-1 px-4 pt-2 pb-4 text-gray-100 rounded-xl markdown-content {{ $isArabic ? 'text-right' : 'text-left' }}"
                        {!! $isArabic ? 'dir="rtl"' : '' !!}>{!! Str::markdown((string) $message['content']) !!}</div>
                @endif
            @endforeach
        </div>
    @endif

    <div class="h-full flex items-center flex-col justify-center min-h-[80vh]" wire:show="!messages">
        <img src="{{ asset('images/open-ai.png') }}" width="200" class="mx-auto opacity-50" alt="Open ai">
    </div>

    <div class="fixed bottom-4 w-full mx-auto flex justify-center">
        <form wire:submit.prevent="send" class="flex items-center justify-center">
            <input type="text" class="min-w-[700px] px-4 py-3 border-2 border-white h-full"
                placeholder="Write a message" wire:model="message" />
            <button
                class="min-w-[100px] h-full flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white border-2 border-white-400"><i
                    class="fa fa-send"></i></button>
        </form>
    </div>

    <div class="fixed top-0 left-0 h-full w-full flex items-center justify-center bg-gray-900 bg-opacity-90"
        wire:loading>
        <div class="spinner flex justify-center h-full" style="align-items: center !important;">
            <img src="{{ asset('images/open-ai-logo.png') }}" width="50" class="mx-auto opacity-70 animate-spin"
                alt="Open ai">
        </div>
    </div>
</div>