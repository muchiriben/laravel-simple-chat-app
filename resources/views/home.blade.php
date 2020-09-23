@extends('layouts.app')

@section('content')

            <div class="card">
                <div class="card-header">
                    <div class="profile-image">
                            <img src="{{ asset('storage/profile_pic/' .Auth::user()->id.  '/' .Auth::user()->profile_pic) }}" />
                    </div>
                </div>

                <div class="card-body">

                   <div class="users">
                    <div class="controls">
                        <h2>Let's Chat</h2>
                    </div>
                    <div class="user-messages">

                        @if(count($users) > 0)
                          @foreach($users as $user)
                               @if (Auth::user()->id != $user->id)
                            
                               <div class="card-user">
                                <a class="user-avatar" href="#">
                                <img src="{{ asset('storage/profile_pic/' .$user->id. '/' .$user->profile_pic) }}" />
                                </a>
                                <svg class="half-circle" viewBox="0 0 106 57">
                                  <path d="M102 4c0 27.1-21.9 49-49 49S4 31.1 4 4"></path>
                                </svg>
                      
                                <a href="/chat/{{$user->id}}">
                                <div class="user-name">
                                <div class="user-name-prefix">{{$user->name}}</div>

                                @if ($user->isOnline())
                                   <div class="online-status"> <div class="online"></div> Online</div>
                                @else
                                <div class="online-status"> <div class="offline"></div> Offline</div>
                                @endif

                                </div></a>
                              </div>

                               @endif
                          @endforeach
                        @else
                           <p>No users found</p>
                        @endif

                    </div>

                </div>

                   
             </div>       
@endsection
