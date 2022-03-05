@extends('layouts.user-layout')

@section('content')
    <div id="page-contents">
        <div class="container">
            <div class="row">

                <!-- Newsfeed Common Side Bar Left
          ================================================= -->
                <x-sidebar></x-sidebar>

                <div class="col-md-7">

                    <!-- Post Create Box
                    ================================================= -->
                    <div class="create-post">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <div class="form-group">
                                    <img src="http://placehold.it/300x300" alt="" class="profile-photo-md" />
                                    <textarea name="texts" id="exampleTextarea" cols="30" rows="1" class="form-control" placeholder="Write what you wish"></textarea>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <div class="tools">
                                    <ul class="publishing-tools list-inline">
                                        <li><a href="#"><i class="ion-compose"></i></a></li>
                                        <li><a href="#"><i class="ion-images"></i></a></li>
                                        <li><a href="#"><i class="ion-ios-videocam"></i></a></li>
                                        <li><a href="#"><i class="ion-map"></i></a></li>
                                    </ul>
                                    <button class="btn btn-primary pull-right">Publish</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- Post Create Box End -->

                    <!-- Nearby People List
                    ================================================= -->
                    <div class="people-nearby">
                        <div class="google-maps">
                            <div id="map" class="map"></div>
                        </div>
                        @foreach($users as $user)
                        <div class="nearby-user">
                            <div class="row">
                                <div class="col-md-2 col-sm-2">
                                    <img src="http://placehold.it/300x300" alt="user" class="profile-photo-lg" />
                                </div>
                                <div class="col-md-7 col-sm-7">
                                    <h5><a href="#" class="profile-link">{{ "@".$user->username }}</a></h5>
                                    <p>Software Engineer</p>
                                 </div>
                                <!-- @if (!auth()->user()->isFollowing($user))
                                    <form style="display: inline" method="POST" action="{{ route('follow', $user) }}">
                                        @csrf
                                        <div class="col-md-3 col-sm-3">
                                            <button class="btn btn-primary pull-right">Add Friend</button>
                                        </div>
                                    </form>
                                @endif -->

                                @if (!auth()->user()->isFollowing($user))
                                <form style="display: inline" method="POST" action="{{ route('follow', $user) }}">
                                        @csrf
                                        <div class="col-md-3 col-sm-3">
                                            <button class="btn btn-primary pull-right">Add Friend</button>
                                        </div>
                                    </form>
                                @else
                                <form style="display: inline" method="POST" action="{{ route('unfollow', $user) }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="col-md-3 col-sm-3">
                                            <button class="btn btn-danger pull-right">UnFollow</button>
                                        </div>
                                    </form> 
                                @endif
                             
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="container mt-3 mb-3">
                    {{ $users->links() }}
                </div>
                <!-- Newsfeed Common Side Bar Right
                 ================================================= -->
                <div class="col-md-2 static">
                    <div class="suggestions" id="sticky-sidebar">
                        <h4 class="grey">Who to Follow</h4>
                        <div class="follow-user">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                            <div>
                                <h5><a href="timeline.html">Diana Amber</a></h5>
                                <a href="#" class="text-green">Add friend</a>
                            </div>
                        </div>
                        <div class="follow-user">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                            <div>
                                <h5><a href="timeline.html">Cris Haris</a></h5>
                                <a href="#" class="text-green">Add friend</a>
                            </div>
                        </div>
                        <div class="follow-user">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                            <div>
                                <h5><a href="timeline.html">Brian Walton</a></h5>
                                <a href="#" class="text-green">Add friend</a>
                            </div>
                        </div>
                        <div class="follow-user">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                            <div>
                                <h5><a href="timeline.html">Olivia Steward</a></h5>
                                <a href="#" class="text-green">Add friend</a>
                            </div>
                        </div>
                        <div class="follow-user">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm pull-left" />
                            <div>
                                <h5><a href="timeline.html">Sophia Page</a></h5>
                                <a href="#" class="text-green">Add friend</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
   
@endsection
