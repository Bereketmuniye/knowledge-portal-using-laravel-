@extends('layouts.app')
@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">
                <h5 class="font-weight-bold mb-3 text-center text-lg-start">Members</h5>
                <div class="card">
                    <div class="card-body">
                        <ul class="list-unstyled mb-0" id="members-list">
                            <!-- Members will be dynamically added here -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-7 col-xl-8">
                <ul class="list-unstyled" id="chat-messages">
                </ul>
                <div class="bg-white mb-3">
                    <div data-mdb-input-init class="form-outline">
                        <textarea class="form-control" id="message-input" rows="4"></textarea>
                        <label class="form-label" for="message-input">Message</label>
                    </div>
                </div>
                <button type="button" id="send-button" class="btn btn-info btn-rounded float-end">Send</button>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        // Enable real-time messaging with Pusher
        Echo.channel('chat')
            .listen('.message-sent', (event) => {
                // Handle new message event
                let message = event.message;
                let chatMessages = document.getElementById('chat-messages');
                let newMessage = document.createElement('li');
                newMessage.textContent = message;
                chatMessages.appendChild(newMessage);
            });

        // Send message on button click
        document.getElementById('send-button').addEventListener('click', () => {
            let messageInput = document.getElementById('message-input');
            let message = messageInput.value;

            if (message.trim() !== '') {
                axios.post('/chat/send-message', { message: message })
                    .then(() => {
                        messageInput.value = '';
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        });
    </script>

@endsection
