<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laravel project')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="">
    <nav class="bg-white border-b border-gray-200">
        <div class="flex justify-between items-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="#" class="text-xl font-bold text-blue-500">BrandLogo</a>
                    </div>
                    <div class="relative" data-twe-dropdown-ref>
                        <button
                            class="bg-gray-800 text-white font-medium py-2 px-4 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2 me-5 flex items-center ms-5"
                            type="button" id="dropdownMenuButton1" data-twe-dropdown-toggle-ref aria-expanded="false"
                            data-twe-ripple-init data-twe-ripple-color="light">
                            Catalog
                            <span class="ms-2 w-2 [&>svg]:h-5 [&>svg]:w-5">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-base shadow-lg data-[twe-dropdown-show]:block dark:bg-surface-dark"
                            aria-labelledby="dropdownMenuButton1" data-twe-dropdown-menu-ref>
                            @foreach ($categories_share as $category_share)
                                <li class="nav-item">
                                    <a class="block w-full whitespace-nowrap bg-white px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline dark:bg-surface-dark dark:text-white dark:hover:bg-neutral-800/25 dark:focus:bg-neutral-800/25 dark:active:bg-neutral-800/25"
                                        href="{{ route('shop.category', $category_share->slug) }}">{{ $category_share->name }}</a>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                    <!-- Desktop Menu -->
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-4">
                        <a href="{{ route('home') }}"
                            class="text-gray-700 hover:text-blue-500 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="{{ route('contacts') }}"
                            class="text-gray-700 hover:text-blue-500 px-3 py-2 rounded-md text-sm font-medium">Contact</a>


                    </div>
                </div>
                <!-- Mobile Menu Button -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button id="menu-btn"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-blue-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>

            @if (Route::has('login'))
                <div class="text-right flex items-center">
                    <button
                        class="bg-gray-800 text-white font-medium py-2 px-4 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2 me-5"
                        id="openModal"> Cart </button>
                    @auth
                        <div class="hidden sm:flex sm:items-center sm:ms-6">

                            @if (Auth::user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}"
                                    class="text-sm  text-light dark:text-gray-500 underline me-4">Admin Dashboard</a>
                            @endif

                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->name }}</div>

                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-blue-500 dark:text-gray-400  dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 font-semibold text-gray-600 hover:text-blue-500  dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="sm:hidden hidden">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <a href="#"
                    class="text-gray-700 hover:text-blue-500 block px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="#"
                    class="text-gray-700 hover:text-blue-500 block px-3 py-2 rounded-md text-base font-medium">About</a>
                <a href="#"
                    class="text-gray-700 hover:text-blue-500 block px-3 py-2 rounded-md text-base font-medium">Services</a>
                <a href="#"
                    class="text-gray-700 hover:text-blue-500 block px-3 py-2 rounded-md text-base font-medium">Contact</a>
            </div>
        </div>
    </nav>



    <div class="container">
        @yield('content')
    </div>


    <div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <!-- Modal Content -->
        <div class="bg-white rounded-lg shadow-lg max-w-xl w-full p-6">
            <h2 class="text-lg font-bold mb-4 text-gray-800">Cart</h2>

            <div class="text-gray-600 mb-6 cart-body">
                @include('shop._cart_mini')
            </div>

            <div class="flex justify-end space-x-2">
                <button id="closeModal" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    Close
                </button>
                <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Confirm
                </button>
                <button class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 clear-cart">
                    Clear Cart
                </button>
            </div>
        </div>
    </div>
</body>

</html>
