<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white p-3 mb-3 d-flex justify-content-between"
    style="margin-bottom: 0 !important;">
    <div class="flex items-center gap-2">
        <a wire:navigate class="navbar-brand fw-bold flex items-center gap-2" href="{{ route('home') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none">
                <path
                    d="M21.1938 2.80624C22.2687 3.88124 22.2687 5.62415 21.1938 6.69914L20.6982 7.19469C20.5539 7.16345 20.3722 7.11589 20.1651 7.04404C19.6108 6.85172 18.8823 6.48827 18.197 5.803C17.5117 5.11774 17.1483 4.38923 16.956 3.8349C16.8841 3.62781 16.8366 3.44609 16.8053 3.30179L17.3009 2.80624C18.3759 1.73125 20.1188 1.73125 21.1938 2.80624Z"
                    fill="#fff" />
                <path
                    d="M14.5801 13.3128C14.1761 13.7168 13.9741 13.9188 13.7513 14.0926C13.4886 14.2975 13.2043 14.4732 12.9035 14.6166C12.6485 14.7381 12.3775 14.8284 11.8354 15.0091L8.97709 15.9619C8.71035 16.0508 8.41626 15.9814 8.21744 15.7826C8.01862 15.5837 7.9492 15.2897 8.03811 15.0229L8.99089 12.1646C9.17157 11.6225 9.26191 11.3515 9.38344 11.0965C9.52679 10.7957 9.70249 10.5114 9.90743 10.2487C10.0812 10.0259 10.2832 9.82394 10.6872 9.41993L15.6033 4.50385C15.867 5.19804 16.3293 6.05663 17.1363 6.86366C17.9434 7.67069 18.802 8.13296 19.4962 8.39674L14.5801 13.3128Z"
                    fill="#fff" />
                <path
                    d="M20.5355 20.5355C22 19.0711 22 16.714 22 12C22 10.4517 22 9.15774 21.9481 8.0661L15.586 14.4283C15.2347 14.7797 14.9708 15.0437 14.6738 15.2753C14.3252 15.5473 13.948 15.7804 13.5488 15.9706C13.2088 16.1327 12.8546 16.2506 12.3833 16.4076L9.45143 17.3849C8.64568 17.6535 7.75734 17.4438 7.15678 16.8432C6.55621 16.2427 6.34651 15.3543 6.61509 14.5486L7.59235 11.6167C7.74936 11.1454 7.86732 10.7912 8.02935 10.4512C8.21958 10.052 8.45272 9.6748 8.72466 9.32615C8.9563 9.02918 9.22032 8.76528 9.57173 8.41404L15.9339 2.05188C14.8423 2 13.5483 2 12 2C7.28595 2 4.92893 2 3.46447 3.46447C2 4.92893 2 7.28595 2 12C2 16.714 2 19.0711 3.46447 20.5355C4.92893 22 7.28595 22 12 22C16.714 22 19.0711 22 20.5355 20.5355Z"
                    fill="#fff" />
            </svg>
            <span style="font-family: Arial; font-weight: bold; letter-spacing: 1px; font-size: 1.7rem;">Blog</span>
        </a>
        <div class="hidden md:block">
            <a wire:navigate wire:current="font-bold" href="/home" class="text-gray-200">Home</a>
            <a wire:navigate wire:current="font-bold" href="/chat" class="text-gray-200">Chat</a>
        </div>
    </div>

    {{-- Search-Bar --}}
    <livewire:search-bar />

    {{-- Notifications --}}
    <div class="flex items-center gap-4">
        @auth
            <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification"
                class="relative inline-flex items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none dark:hover:text-white dark:text-gray-400"
                type="button">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 14 20">
                    <path
                        d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z" />
                </svg>

                @if ($unreadNotifications > 0)
                    <span
                        class="absolute inline-flex items-center justify-center w-4 h-4 text-xs font-semibold text-white bg-red-500 rounded-full -top-2.5 -right-2 dark:bg-red-600">
                        {{ $unreadNotifications }}
                    </span>
                @endif
            </button>

            <!-- Dropdown menu -->
            <div id="dropdownNotification"
                class="z-20 hidden w-full max-w-sm bg-white divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-gray-800 dark:divide-gray-700"
                aria-labelledby="dropdownNotificationButton">
                <div
                    class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white">
                    Notifications
                </div>
                <div class="divide-y divide-gray-100 dark:divide-gray-700">
                    @if ($notifications->count() == 0)
                        <h2 class="px-4 py-3 text-sm font-medium text-center text-gray-900 dark:text-white bg-gray-700">No
                            notifications yet.</h2>
                    @else
                        @foreach ($notifications as $notification)
                            <a href="/notifications"
                                class="flex px-4 py-3 {{ $notification->read_at ? 'bg-gray-800' : 'bg-gray-700' }} hover:bg-gray-600">
                                <div class="shrink-0">
                                    <img class="rounded-full w-11 h-11 border-2 border-white"
                                        src="{{ asset('images/avatar.jpg') }}" alt="Bonnie image">
                                    <div
                                        class="absolute flex items-center justify-center w-7 h-7 ms-6 -mt-5 bg-blue-600 border border-white rounded-full dark:border-gray-800">
                                        <i class="fa fa-bell"></i>
                                    </div>
                                </div>
                                <div class="w-full ps-3">
                                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span
                                            class="font-semibold text-gray-900 dark:text-white">{{ $notification->data['message'] }}
                                    </div>
                                    <div class="font-semibold text-xs text-blue-600 dark:text-blue-500">
                                        {{ $notification->created_at->diffForHumans() }}</div>
                                </div>
                            </a>
                        @endforeach
                    @endif
                </div>
                <a href="/notifications"
                    class="block py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
                    <div class="inline-flex items-center ">
                        <svg class="w-4 h-4 me-2 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                            <path
                                d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                        </svg>
                        View all
                    </div>
                </a>
            </div>
        @endauth

        {{-- Authentication --}}
        @auth
            {{-- Auth-Links --}}
            <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName"
                class="flex items-center text-sm pe-1 font-medium text-gray-900 rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:me-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white"
                type="button">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 me-2 rounded-full" src="{{ asset('images/avatar.jpg') }}" alt="user photo">
                {{ auth()->user()->name }}
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdownAvatarName"
                class="z-10 hidden bg-gray-800 divide-y divide-gray-100 rounded-lg shadow-sm w-44 border-2 border-gray-700">
                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                    <div class="font-medium ">{{ auth()->user()->name }}</div>
                    <div class="truncate">{{ auth()->user()->email }}</div>
                </div>
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                    aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                    <li>
                        <a href="/profile"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Statistics</a>
                    </li>
                    @if (auth()->user()->is_admin)
                        <li>
                            <a href="/telescope"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Telescope</a>
                        </li>
                    @endif
                    <li>
                        <a href="/post/create"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Write</a>
                    </li>
                </ul>
                <div class="py-2">
                    <form action="/logout" method="POST" class="d-inline">
                        @csrf
                        <button type="submit"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white w-full text-left">Logout</button>
                    </form>
                </div>
            </div>
        @else
            <div class="d-flex align-items-center">
                <a href="{{ route('login') }}" class="px-3 py-2 hover:bg-slate-100 hover:text-slate-600 border border-slate-200 me-2">Login</a>
                <a href="{{ route('register') }}" class="px-3 py-2 bg-blue-600 hover:bg-blue-700 border border-blue-200 text-white btn-sm">Register</a>
            </div>
        @endauth
    </div>
</nav>
