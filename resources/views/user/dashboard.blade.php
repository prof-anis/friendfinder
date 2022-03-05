@extends('layouts.user-layout')

@section("content")

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
        </div><!-- Post Create Box End-->

        <!-- Post Content
        ================================================= -->
        @foreach ($relevantPosts as $post)
            <div class="post-content">
              <!--  <img src="http://placehold.it/1920x1280" alt="post-image" class="img-responsive post-image" /> -->
                <div class="post-container">
                    <img src="{{ $post->user->image }}" alt="user" class="profile-photo-md pull-left" />
                    <div class="post-detail">
                        <div class="user-info">
                            <h5><a href="timeline.html" class="profile-link">{{ $post->user->full_name }}</a> <span class="following">following</span></h5>
                            <p class="text-muted">Published  {{ $post->created_at->diffForHumans() }} </p>
                        </div>
                        <div class="reaction">
                            <a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>
                            <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
                        </div>
                        <div class="line-divider"></div>
                        <div class="post-text">
                            <p>
                                {{ $post->body }}
                            </p>
                        </div>
                        <div class="line-divider"></div>
                      <!--  <div class="post-comment">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                            <p><a href="timeline.html" class="profile-link">Diana </a><i class="em em-laughing"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                        </div>
                        <div class="post-comment">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                            <p><a href="timeline.html" class="profile-link">John</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                        </div>
                        <div class="post-comment">
                            <img src="http://placehold.it/300x300" alt="" class="profile-photo-sm" />
                            <input type="text" class="form-control" placeholder="Post a comment">
                        </div> -->
                    </div>
                </div>
            </div>
        @endforeach



    </div>

    <!-- Newsfeed Common Side Bar Right
    ================================================= -->
    <div class="col-md-2 static">
        <div class="suggestions" id="sticky-sidebar">
            <h4 class="grey">Who to Follow</h4>
            @foreach ($whoToFollower as $user)
                <div class="follow-user">
                    <img src="{{ $user->image }}" alt="" class="profile-photo-sm pull-left" />
                    <div>
                        <h5><a href="timeline.html">{{ $user->full_name }}</a></h5>
                        <a href="#" class="text-green">Add friend</a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
