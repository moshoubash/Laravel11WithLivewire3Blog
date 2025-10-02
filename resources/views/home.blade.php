@component('components.layouts.app', ['title' => 'Home Page'])
    <div class="text-center">
        <div class="max-w-full px-6 py-20 text-center">
            <h1 class="text-5xl font-bold">Start writing and reading</h1>
            <p class="py-6">This is the home page of our application. Explore the features and enjoy your stay!</p>
            <a href="/" class="btn btn-primary">Write Now</a>
        </div>
    </div>

    <div class="container mx-auto my-0">
        <h1 class="text-center mb-xl-5" style="font-weight: bold; font-size: 3rem;">Articles</h1>

        <livewire:article />
        <br />

        <livewire:article />
        <br />

        <livewire:article />
        <br />
    </div>
@endcomponent