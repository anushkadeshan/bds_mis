

<li class="onhover-dropdown">
    <div class="notification-box"><i data-feather="bell"> </i>
        @if(count($notifications)>0)
        <span class="badge rounded-pill badge-secondary">{{count($notifications)}}</span>
        @endif
    </div>
    <ul class="chat-dropdown onhover-show-div">
        <li>
            <i data-feather="message-square"></i>
            <h6 class="f-18 mb-0">Notifications</h6>
        </li>
        @if(count($notifications)==0)
            <p class="text-gray-800 text-center md:text-center pt-4">No notifications</p>
        @endif
        @foreach($notifications as $notification)
        <li wire:key="{{ $loop->index }}"  href="" wire:click.prevent="markAsRead({{$notification->my_id}})">
            <div class="media">
                <img class="img-fluid rounded-circle me-3" src="{{$notification->data['photo']}}" alt="">
                @if(Cache::has('user-is-online-' . $notification->data['user_id']))
                <div class="status-circle online"></div>
                @else
                <div class="status-circle offline"></div>
                @endif

                <div class="media-body">
                    <span>{{$notification->data['causer']}}</span>
                    <p>{{$notification->data['message']}}</p>
                </div>
                <p class="f-12 font-success">{{$notification->created_at->diffForHumans(null,true,true)}}</p>
                </div>
        </li>
        @endforeach
        <li class="text-center"> <a class="btn btn-primary" href="#">View All</a></li>
    </ul>
</li>
