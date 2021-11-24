<div>
    <div class="flex justify-center h-screen">
        <div x-data="{ dropdownOpen: false }" class="relative">
            <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block rounded-md bg-white p-2 focus:outline-none">
                <i class="fa fa-bell fa-lg"></i>
                @if(count($notifications)>0)
                <span class="absolute right-0 top-0 rounded-full bg-red-600 w-3 h-3 top right p-0 m-0 text-white font-mono text-sm  leading-tight text-center">
                </span>
                @endif
            </button>

            <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

            <div x-show="dropdownOpen" class="absolute right-0 mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20" style="width:20rem;">
                <div class="py-2">
                    @if(count($notifications)==0)
                        <p class="text-gray-800 text-center md:text-center">No notifications</p>
                    @endif
                    @foreach($notifications as $notification)

                    <a wire:key="{{ $loop->index }}"  href="" wire:click.prevent="markAsRead({{$notification->my_id}})" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                        <img class="h-8 w-8 rounded-full object-cover mx-1" src="{{$notification->data['photo']}}" alt="avatar">
                        <p class="text-gray-600 text-sm mx-2">
                             {{$notification->data['message']}} by <span class="font-bold" href="#">{{$notification->data['causer']}}</span> . {{$notification->created_at->diffForHumans()}}
                        </p>
                    </a>
                    @endforeach
                </div>
                <a href="#" class="block bg-gray-800  text-center font-bold py-2"><span class="text-gray-100">See all notifications</span> </a>
            </div>
        </div>
    </div>
</div>
