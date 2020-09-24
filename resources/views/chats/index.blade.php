@extends('layouts.app')

@section('content')
<div class="container">

    <script>
        window.onload = function() {
            document.getElementById('scroll-here').scrollIntoView();
};

        setTimeout(function(){
            location.reload();
        },30000); // 5000 milliseconds means 5 seconds.
    </script>

            <div class="card">
                <div class="card-header">
                    <a href="/home" class="btn-back">Back</a>
                    <div class="profile-image">
                            <img src="{{ asset('storage/profile_pic/' .Auth::user()->id.  '/' .Auth::user()->profile_pic) }}" />
                    </div>
                </div>

                <div class="card-body">

                    <div class="canvas">
                        <div class="details">
                            <div class="profile-image">      
                           <img width="40px" height="40px" src="{{ asset('storage/profile_pic/' .$receiver->id.  '/' .$receiver->profile_pic) }}" />
                        </div>
                        <div class="receiver">{{$receiver->name}}</div>
                        </div>

                        <div class="chat-area">
                @if(count($messages) > 0)
                     @foreach($messages as $message)
                        @if ($message->sender_id == Auth::user()->id || $message->receiver_id == Auth::user()->id)
                              @if ($message->sender_id == Auth::user()->id && $message->receiver_id == $receiver->id)
                              <div class="message message-right">
                                <h4>{{$message->message}}</h4>
                                <h7 class="time-sent">{{$message->created_at->format('H:i')}}</h7>
                              </div>
                              @endif
                              @if ($message->receiver_id == Auth::user()->id && $message->sender_id == $receiver->id)
                              <div class="message message-left">
                                <h4>{{$message->message}}</h4>
                                <h7 class="time-sent">{{$message->created_at->format('H:i')}}</h7>
                              </div>
                              @endif
                        
                          @endif
                              
                    @endforeach
                        @endif
                        <div id="scroll-here"></div>
                        </div>
    
                        <div class="write-message">
                        <form method="POST" action="{{ route('send_chat')}}">
                                @csrf
                                <input type="hidden" id="sender_id" name="sender_id" value="{{Auth::user()->id}}">
                                <input type="hidden" id="receiver_id" name="receiver_id" value="{{$receiver->id}}">
                                <input type="text" name="message" id="message" placeholder="Type a message">
                                <input type="submit" name="send" id="send" value="Send">
                            </form>
                        </div>
                       </div>
                    </div>
                </div>

                </div>

                   
</div>       
@endsection
