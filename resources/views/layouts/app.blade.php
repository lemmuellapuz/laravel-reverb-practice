<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .chat-container {
                max-width: auto;
                background-color: #fff;
                border: 1px solid #ccc;
                border-radius: 8px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }
    
            .chat-header {
                background-color: #007bff;
                color: #fff;
                padding: 10px;
                font-size: 1rem;
            }
    
            .messages {
                height: 300px;
                overflow-y: scroll;
                padding: 10px;
            }
    
            .message {
                background-color: #f2f2f2;
                padding: 8px;
                margin-bottom: 8px;
                border-radius: 4px;
            }
    
            .message.from-me {
                background-color: #DCF8C6;
                align-self: flex-end;
            }
    
            .message.from-other {
                background-color: #E5E4E2;
            }
    
            .message-content {
                word-wrap: break-word;
            }
    
            .input-container {
                display: flex;
                align-items: center;
                padding: 10px;
                border-top: 1px solid #ccc;
            }
    
            .input-container input[type=text] {
                flex: 1;
                padding: 8px;
                font-size: 1rem;
                border: 1px solid #ccc;
                border-radius: 4px;
                margin-right: 10px;
            }
    
            .input-container button {
                padding: 8px 16px;
                font-size: 1rem;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
    
            .input-container button:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

        <script type="module" src="{{ asset('js/broadcasting.js') }}"></script>

        @stack('scripts')
    </body>
</html>
