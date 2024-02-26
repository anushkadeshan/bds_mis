<div>
    <div class="flex flex-col md:flex-row justify-center">
        <div class="md:w-12/12">
            <div class="flex md:flex-row space-x-8">
                <div class="shadow-md p-4 bg-white">
                    <div class="">
                        <div class="flex flex-col">
                            <div class="flex space-x-8 w-56">
                                <div class="">
                                    <div class="uppercase text-sm text-gray-400">
                                        Students
                                    </div>
                                <div class="mt-1">
                                        <div class="flex space-x-2 items-center">
                                            <div class="text-2xl">
                                                {{number_format($total)}}
                                            </div>

                                            <div class="text-xs text-green-800 bg-green-200 rounded-md p-1">

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="pl-5">
                                    <img src="{{asset('icons/student.svg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shadow-md p-4 bg-white">
                    <div class="">
                        <div class="flex flex-col">
                            <div class="flex space-x-8 w-56">
                                <div class="">
                                    <div class="uppercase text-sm text-gray-400">
                                        Students {{ now()->year }}
                                    </div>
                                <div class="mt-1">
                                        <div class="flex space-x-2 items-center">
                                            <div class="text-2xl">
                                                {{number_format($total_2021)}}
                                            </div>
                                            <div class="text-xs text-green-800 bg-green-200 rounded-md p-1">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pl-5">
                                    <img src="{{asset('icons/2021.svg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shadow-md p-4 bg-white">
                    <div class="">
                        <div class="flex flex-col">
                            <div class="flex space-x-8 w-56">
                                <div class="">
                                    <div class="uppercase text-sm text-gray-400">
                                        BMIC
                                    </div>
                                <div class="mt-1">
                                        <div class="flex space-x-2 items-center">
                                            <div class="text-2xl">
                                                {{number_format($bmic)}}
                                            </div>
                                            <div class="text-xs text-green-800 bg-green-200 rounded-md p-1">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pl-5">
                                    <img src="{{asset('icons/b.svg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shadow-md p-4 bg-white">
                    <div class="">
                        <div class="flex flex-col">
                            <div class="flex space-x-8 w-56">
                                <div class="">
                                    <div class="uppercase text-sm text-gray-400">
                                        BMIC {{ now()->year }}
                                    </div>
                                    <div class="mt-1">
                                        <div class="flex space-x-2 items-center">
                                            <div class="text-2xl">
                                                {{number_format($bmic_2021)}}
                                            </div>

                                            <div class="text-xs text-green-800 bg-green-200 rounded-md p-1">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pl-5">
                                    <img src="{{asset('icons/non.svg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
