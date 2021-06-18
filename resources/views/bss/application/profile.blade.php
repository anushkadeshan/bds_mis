<x-app-layout>
    @section('title','Profile- ' .$student->name)

    <div class="bg-gray-100">
        <div class="w-full text-white bg-main-color">
            <div class="container mx-auto my-5 p-5">
                <div class="md:flex no-wrap md:-mx-2 ">
                    <!-- Left Side -->
                    <div class="w-full md:w-3/12 md:mx-2">
                        <!-- Profile Card -->
                        <div class="bg-white p-3 border-t-4 border-green-400">
                            <div class="image overflow-hidden shadow-lg group max-w-sm flex justify-center items-center  mx-auto">
                                <img class="hover:opacity-25 h-auto w-full mx-auto"
                                    @if($student->profile_picture)
                                    src="
                                    {{asset('storage/'.$student->profile_picture)}}
                                    "
                                    @else
                                    src="
                                    {{asset('storage/bss/default.jpg')}}
                                    "
                                    @endif
                                    alt="">

                                    <div class="absolute opacity-0 fd-sh group group-hover:opacity-100">
                                        <span class="font-bold text-gray-900 text-lg tracking-wider leading-relaxed font-sans">Change the Photo</span>
                                        <div class="pt-8 text-center">
                                            <button  data-toggle="modal" data-target="#exampleModal" class="border-2 group-hover:opacity-100 border-gray-700 hover:border-gray-500 text-center rounded-lg p-3 bg-white  text-gray-700 font-bold">Upload</button>
                                            </div>
                                    </div>
                            </div>
                            <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$student->name}}
                            </h1>
                            <h3 class="text-gray-600 font-lg text-semibold leading-6 mt-3">{{$student->branch->name}}
                            </h3>
                            <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">{{$student->address}}</p>
                            <ul
                                class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                                <li class="flex items-center py-3">
                                    <span>Payment Status</span>
                                    <span class="ml-auto">
                                        @switch($student->payment->p_status)
                                        @case(1)
                                        <span class="bg-green-500 py-1 px-2 rounded text-white text-sm">Ongoing</span>
                                        @break

                                        @case(2)
                                        <span class="bg-blue-500 py-1 px-2 rounded text-white text-sm">Finished</span>
                                        @break
                                        @case(3)
                                        <span class="bg-yellow-500 py-1 px-2 rounded text-white text-sm">Hold</span>
                                        @break
                                        @case(4)
                                        <span class="bg-red-500 py-1 px-2 rounded text-white text-sm">Dropout</span>
                                        @endswitch

                                    </span>
                                </li>
                                <li class="flex items-center py-3">
                                    <span>Schol Given on</span>
                                    <span class="ml-auto">{{$student->schol_given_on}}</span>
                                </li>
                                <li class="flex items-center py-3">
                                    <a href="{{ route('students.edit', [$student->id]) }}"><button
                                            class="bg-gray-300 hover:bg-green-400 text-green-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span>Edit Student</span>
                                        </button>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End of profile card -->
                        <div class="my-4"></div>
                    </div>
                    <!-- Right Side -->
                    <div class="w-full md:w-9/12 mx-2 h-64">
                        <!-- Profile tab -->
                        <!-- About Section -->
                        <div class="bg-white p-3 shadow-sm rounded-sm">
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">About</span>

                            </div>
                            <div class="text-gray-700">
                                <div class="grid md:grid-cols-2 text-sm">
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Ref No</div>
                                        <div class="px-4 py-2">{{$student->ref_no}}</div>
                                    </div>
                                </div>
                                <div class="grid md:grid-cols-2 text-sm">

                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Name</div>
                                        <div class="px-4 py-2">{{$student->name}}</div>
                                    </div>

                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Schol Type</div>
                                        <div class="px-4 py-2">{{$student->schol_type}}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Contact No</div>
                                        <div class="px-4 py-2">{{$student->contact}}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Current Address</div>
                                        <div class="px-4 py-2">{{$student->address}}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">NIC</div>
                                        <div class="px-4 py-2">{{$student->nic}}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">A/L Year</div>
                                        <div class="px-4 py-2">
                                            <a class="text-blue-800">{{$student->al_year}}</a>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Birthday</div>
                                        <div class="px-4 py-2">{{$student->date_of_birth}}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Branch</div>
                                        <div class="px-4 py-2">{{$student->branch->name}}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">DS Division</div>
                                        <div class="px-4 py-2">{{$student->dsd->name}}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">GN Division</div>
                                        <div class="px-4 py-2">{{$student->gn->name}}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Confirmed A/L Status</div>
                                        <div class="px-4 py-2">
                                            @switch($student->confirmed_al_stream)
                                            @case(1)
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 fill-current text-green-600" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                            </svg>
                                            @break

                                            @case(0)
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 fill-current text-red-600" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            @endswitch
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">BMIC</div>
                                        <div class="px-4 py-2">
                                            @switch($student->direct_by_bmic)
                                            @case(1)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            @break

                                            @case(0)
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 fill-current text-red-600" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            @endswitch
                                        </div>
                                    </div>
                                </div>
                                <div class="text-gray-700" x-data="{open:false}">
                                    <button @click="open = true"
                                        class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Show
                                        Full Information</button>

                                    <div class="grid md:grid-cols-2 text-sm" x-show="open" @click.away="open=false"
                                        x-transition:enter-start="transition ease-in duration-3000">
                                        @switch($student->direct_by_bmic)
                                        @case(1)
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">PCI</div>
                                            <div class="px-4 py-2">{{$student->bmic_pci}}</div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Client Code </div>
                                            <div class="px-4 py-2">{{$student->client_code}}</div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Client Name</div>
                                            <div class="px-4 py-2">{{$student->client_name}}</div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">BMIC Branch</div>
                                            <div class="px-4 py-2">{{$student->bmic_branch}}</div>
                                        </div>
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">BMIC Region</div>
                                            <div class="px-4 py-2">{{$student->bmic_region}}</div>
                                        </div>
                                        @break

                                        @case(0)
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">PCI</div>
                                            <div class="px-4 py-2">{{$student->non_bmic_pci}}</div>
                                        </div>
                                        @endswitch
                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Guardian Name</div>
                                            <div class="px-4 py-2">{{$student->guardian_name}}</div>
                                        </div>

                                        <div class="grid grid-cols-2">
                                            <div class="px-4 py-2 font-semibold">Relationsip to Guardian</div>
                                            <div class="px-4 py-2">{{$student->relationship}}</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- End of about section -->

                            <div class="my-4"></div>

                            <!-- Experience and education -->
                            <div class="bg-white p-3 shadow-sm rounded-sm">

                                <div class="grid grid-cols-2">

                                    @if(!$student->OlResult->isEmpty())
                                    <div>
                                        <div
                                            class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                            <span clas="text-green-500">
                                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </span>
                                            <span class="tracking-wide">O/L Results</span>
                                        </div>
                                        <ul class="list-inside space-y-2">

                                            <li>
                                                <div class="text-teal-600">No of "A"s</div>
                                                <div class="text-gray-500 text-xs">{{$student->OlResult->OL_A}}</div>
                                            </li>
                                            <li>
                                                <div class="text-teal-600">No of "B"s</div>
                                                <div class="text-gray-500 text-xs">{{$student->OlResult->OL_B}}</div>
                                            </li>
                                            <li>
                                                <div class="text-teal-600">No of "C"s</div>
                                                <div class="text-gray-500 text-xs">{{$student->OlResult->OL_C}}</div>
                                            </li>
                                            <li>
                                                <div class="text-teal-600">No of "S"s</div>
                                                <div class="text-gray-500 text-xs">{{$student->OlResult->OL_S}}</div>
                                            </li>
                                            <li>
                                                <div class="text-teal-600">No of "W"s</div>
                                                <div class="text-gray-500 text-xs">{{$student->OlResult->OL_W}}</div>
                                            </li>
                                            <li>
                                                <div class="text-teal-600">Maths Result</div>
                                                <div class="text-gray-500 text-xs">{{$student->OlResult->Maths_Result}}
                                                </div>
                                            </li>
                                            <li>
                                                <div class="text-teal-600">Exam Year</div>
                                                <div class="text-gray-500 text-xs">{{$student->OlResult->Exam_Year}}
                                                </div>
                                            </li>
                                            <li>
                                                <div class="text-teal-600">Medium</div>
                                                <div class="text-gray-500 text-xs">{{$student->OlResult->Medium}}</div>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
                                    @if(!$student->AlResult->isEmpty())
                                    <div>
                                        <div
                                            class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                            <span clas="text-green-500">
                                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                                    <path fill="#fff"
                                                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                                </svg>
                                            </span>
                                            <span class="tracking-wide">A/L Results</span>
                                        </div>
                                        <ul class="">
                                            @foreach($student->AlResult as $al)
                                            <div class="p-1 bg-blue grid grid-cols-1 mb-2">Attempt {{$al->attempt}}
                                            </div>
                                            <li class="grid grid-cols-2 mb-2">
                                                <div class="text-teal-600">Stream :</div>
                                                <div class="text-gray-500 text-xs">{{$al->stream}}</div>
                                            </li>
                                            <li class="grid grid-cols-2 mb-2">
                                                <div class="text-teal-600">School :</div>
                                                <div class="text-gray-500 text-xs">{{$al->school}}</div>
                                            </li>
                                            <li class="grid grid-cols-2 mb-2">
                                                <div class="text-teal-600">Exam Year :</div>
                                                <div class="text-gray-500 text-xs">{{$al->year}}</div>
                                            </li>
                                            <li class="grid grid-cols-2 mb-2">
                                                <div class="text-teal-600">Index No :</div>
                                                <div class="text-gray-500 text-xs">{{$al->index_no}}</div>
                                            </li>
                                            <li class="grid grid-cols-2 mb-2">
                                                <div class="text-teal-600">No of "A"s :</div>
                                                <div class="text-gray-500 text-xs">{{$al->AL_A}}</div>
                                            </li>
                                            <li class="grid grid-cols-2 mb-2">
                                                <div class="text-teal-600">No of "B"s :</div>
                                                <div class="text-gray-500 text-xs">{{$al->AL_B}}</div>
                                            </li>
                                            <li class="grid grid-cols-2 mb-2">
                                                <div class="text-teal-600">No of "C"s :</div>
                                                <div class="text-gray-500 text-xs">{{$al->AL_C}}</div>
                                            </li>
                                            <li class="grid grid-cols-2 mb-2">
                                                <div class="text-teal-600">No of "S"s :</div>
                                                <div class="text-gray-500 text-xs">{{$al->AL_S}}</div>
                                            </li>
                                            <li class="grid grid-cols-2 mb-2">
                                                <div class="text-teal-600">No of "W"s :</div>
                                                <div class="text-gray-500 text-xs">{{$al->AL_W}}</div>
                                            </li>
                                            <li class="grid grid-cols-2 mb-2">
                                                <div class="text-teal-600">Pass or Fail :</div>
                                                <div class="text-gray-500 text-xs">{{$al->pass_fail}}</div>
                                            </li>
                                            <li class="grid grid-cols-2 mb-2">
                                                <div class="text-teal-600">Attempt :</div>
                                                <div class="text-gray-500 text-xs">{{$al->attempt}}</div>
                                            </li>
                                            <li class="grid grid-cols-2 mb-2">
                                                <div class="text-teal-600">Z-Score :</div>
                                                <div class="text-gray-500 text-xs">{{$al->z_score}}</div>
                                            </li>
                                            <li class="grid grid-cols-2 mb-2">
                                                <div class="text-teal-600">Distric Rank :</div>
                                                <div class="text-gray-500 text-xs">{{$al->district_rank}}</div>
                                            </li>
                                            <li class="grid grid-cols-2  mb-5">
                                                <div class="text-teal-600">Island Rank :</div>
                                                <div class="text-gray-500 text-xs">{{$al->island_rank}}</div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                                <!-- End of Experience and education grid -->
                            </div>
                            <!-- End of profile tab -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <livewire:bss.upload-profile-picture :student="$student">
            </div>
</x-app-layout>
