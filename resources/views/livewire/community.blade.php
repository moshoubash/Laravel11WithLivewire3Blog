<div class="mx-auto px-10 py-5 min-h-screen bg-gray-100">
    @if(session('success'))
        <div class="alert alert-success mb-0">
            {{ session('success') }}
        </div>
    @endif

    <form action="/chat/send" method="POST">
        @csrf
        @method('POST')

        <h2 class="text-3xl mb-4">Add new message</h2>
        <input type="text" id="email" name="email" placeholder="Your email" class="border p-2 w-full mb-2 form-control" required>
        <input type="text" id="message" name="message" placeholder="Message" class="border p-2 w-full mb-2 form-control" required />
        <button type="submit" class="btn bg-blue-500 hover:bg-blue-700 text-white p-2">Submit</button>
    </form>

    <h2 class="text-3xl my-4">Messages</h2>

    <div id="messages"></div>
</div>