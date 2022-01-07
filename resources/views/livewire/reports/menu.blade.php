<div>
    <nav class="sidebar-main">
        <div class="row">
            <div class="col-xl-3 box-col-4">
                <div class="card testimonial">
                    <div class="p-0 card-body">
                        <div id="sidebar-menu m-0">
                            <ul class="text-center sidebar-links" id="simple-bar">
                                <li class="p-3 px-2 text-white bg-purple-600 rounded sidebar-list">
                                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/mobile-app' ? 'active' : '' }}"
                                        href="{{route('log-frame')}}"><i class="text-white icon-mobile"></i><span
                                            class="text-white"> Log Frame</span>
                                        <div class="according-menu"><i
                                                class="fa fa-angle-{{request()->route()->getPrefix() == '/mobile-app' ? 'down' : 'right' }}"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 box-col-4">
                <div class="card testimonial">
                    <div class="p-0 card-body">
                        <div id="sidebar-menu m-0">
                            <ul class="text-center sidebar-links" id="simple-bar">
                                <li class="p-3 px-2 text-white bg-purple-600 rounded sidebar-list">
                                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/mobile-app' ? 'active' : '' }}"
                                        href="#"><i class="icon-mobile"></i><span class="text-white"> Mobile App</span>
                                        <div class="according-menu"><i
                                                class="fa fa-angle-{{request()->route()->getPrefix() == '/mobile-app' ? 'down' : 'right' }}"></i>
                                        </div>
                                    </a>
                                    <ul class="sidebar-submenu"
                                        style="display: {{request()->route()->getPrefix() == '/mobile-app' ? 'block' : 'none;' }};">
                                        <li class="p-1 px-2 mt-1 text-white bg-purple-400 rounded sidebar-list"><a
                                                class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'sessions.index'  ? 'active' : ''}}"
                                                href="{{route('runningChart')}}"><i class="icon-target"></i><span
                                                    class="text-white"> Running
                                                    Charts</span></a>
                                        </li>
                                        <li class="p-1 px-2 mt-1 text-white bg-purple-400 rounded sidebar-list"><a
                                                class="sidebar-link sidebar-title link-nav {{ Route::currentRouteName() == 'trips.index'  ? 'active' : ''}}"
                                                href="{{ route('summary') }}"><i class="icon-car"></i><span
                                                    class="text-white"> Summary of Field Visits</span></a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 box-col-4">
                <div class="card testimonial">
                    <div class="p-0 card-body">
                        <div id="sidebar-menu m-0">
                            <ul class="text-center sidebar-links" id="simple-bar">
                                <li class="p-3 px-2 text-white bg-purple-600 rounded sidebar-list">
                                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/mobile-app' ? 'active' : '' }}"
                                        href="{{route('budget')}}"><i class="text-white icon-mobile"></i><span
                                            class="text-white"> Budget</span>
                                        <div class="according-menu"><i
                                                class="fa fa-angle-{{request()->route()->getPrefix() == '/mobile-app' ? 'down' : 'right' }}"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 box-col-4">
                <div class="card testimonial">
                    <div class="p-0 card-body">
                        <div id="sidebar-menu m-0">
                            <ul class="text-center sidebar-links" id="simple-bar">
                                <li class="p-3 px-2 text-white bg-purple-600 rounded sidebar-list">
                                    <a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/mobile-app' ? 'active' : '' }}"
                                        href="{{route('progress')}}"><i class="text-white icon-mobile"></i><span
                                            class="text-white"> Progress</span>
                                        <div class="according-menu"><i
                                                class="fa fa-angle-{{request()->route()->getPrefix() == '/mobile-app' ? 'down' : 'right' }}"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="loading-overlay" wire:loading.class="is-active">
        <span class="fa fa-spinner fa-3x fa-spin"></span>
    </div>
</div>
