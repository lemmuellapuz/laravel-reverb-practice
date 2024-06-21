<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="chat-container">
                        <div class="chat-header">
                            Chat with {{$members}}
                        </div>
                        <div class="messages" id="messages-container">
                            <!-- Messages will be dynamically added here -->
                        </div>
                        <div id="status-container" style="color:gray; margin:10px; text-align:right; font-size:13px;"><small id="status" ></small></div>
                        <div class="input-container">
                            <input type="text" id="input-message" placeholder="Type your message...">
                            <button id="button-send">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function () {

                var typingTimeoutRef = null;

                $('#button-send').on('click', function() {
                    if($('#input-message').val())
                    {

                    }
                })

                $('#input-message').on('keydown', function () {

                    // SEND TYPING EVENT
                    Echo.private(`chat.${ {{ $chat_room->id }} }`)
                    .whisper('typing', {
                        sender_id: "{{ $user->id }}",
                        sender_name: "{{ $user->name }}"
                    });
                });
                
                //LISTEN TYPING EVENT
                Echo.private(`chat.${ {{ $chat_room->id }} }`)
                .listenForWhisper('typing', (event) => {
                    if(event.sender_id != "{{ $user->id }}")
                    {
                        $('#status').text(event.sender_name + ' is typing ...');
                        $('#status-container').show();

                        if(typingTimeoutRef)
                            clearTimeout(typingTimeoutRef)

                        typingTimeoutRef = setTimeout(function() { 
                            $('#status-container').hide();
                        }, 2000);
                    }
                });

                //LISTEN MESSAGE SENT
                // Echo.private('chat-room-messages')
                // .listen('MessageSentEvent', (event) => {
                //     console.log(event);
                // })

            });
        </script>
    @endpush
</x-app-layout>
