<div class="col-md-3 static">
    <div class="profile-card">
        <img src="{{ auth()->user()->image }}" alt="user" class="profile-photo" />
        <h5><a href="timeline.html" class="text-white">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</a></h5>
        <a href="#" class="text-white"><i class="ion ion-android-person-add"></i> 1,299 followers</a>
        <a style="padding-left:20px;" href="#" class="text-white"><i class="ion ion-android-person-add"></i> {{ auth()->user()->following->count() }} following</a>
    </div><!--profile card ends-->
    <ul class="nav-news-feed">
        <li><i class="icon ion-ios-paper"></i><div><a href="newsfeed.html">My Newsfeed</a></div></li>
        <li><i class="icon ion-ios-people"></i><div><a href="{{ route('people') }}">People Nearby</a></div></li>
        <li><i class="icon ion-ios-people-outline"></i><div><a href="newsfeed-friends.html">Friends</a></div></li>
        <li><i class="icon ion-chatboxes"></i><div><a href="newsfeed-messages.html">Messages</a></div></li>
        <li><i class="icon ion-images"></i><div><a href="newsfeed-images.html">Images</a></div></li>
        <li><i class="icon ion-ios-videocam"></i><div><a href="newsfeed-videos.html">Videos</a></div></li>
    </ul><!--news-feed links ends-->
    <div id="chat-block">
        <div class="title">Chat online</div>
        <ul class="online-users list-inline">
            <li><a href="newsfeed-messages.html" title="Linda Lohan"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
            <li><a href="newsfeed-messages.html" title="Sophia Lee"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
            <li><a href="newsfeed-messages.html" title="John Doe"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
            <li><a href="newsfeed-messages.html" title="Alexis Clark"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
            <li><a href="newsfeed-messages.html" title="James Carter"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
            <li><a href="newsfeed-messages.html" title="Robert Cook"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
            <li><a href="newsfeed-messages.html" title="Richard Bell"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
            <li><a href="newsfeed-messages.html" title="Anna Young"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
            <li><a href="newsfeed-messages.html" title="Julia Cox"><img src="http://placehold.it/300x300" alt="user" class="img-responsive profile-photo" /><span class="online-dot"></span></a></li>
        </ul>
    </div><!--chat block ends-->
</div>
