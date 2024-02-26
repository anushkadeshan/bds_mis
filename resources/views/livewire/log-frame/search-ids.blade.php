<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="card">
            <div class="p-4 card-header">
                Search IDs
            </div>
            <div class="card-body">
                <h5 class="px-2">1. Search Family ID</h5>
                <div class="flex items-center justify-between mb-5">
                    <div class="flex flex-col w-full px-2 m-0">
                        <div class="relative z-50">
                            <div class="">
                                <div class="w-full felx-1">
                                    <input wire:model.debounce.500ms="query" placeholder="Search house hold by name"
                                        class="w-full px-3 py-2  bg-gray-100 rounded-sm focus:outline-none" />
                                </div>
                                <span wire:loading wire:target="query" class="pl-2 mt-1 felx-1 fa-2x">
                                    <i class="fas fa-circle-notch fa-spin"></i>
                                </span>
                            </div>

                            <div wire:loading wire:target="query"
                                class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
                                <div class="list-item">Searching...</div>
                            </div>
                            @error('family_id') <span class="text-danger">*{{ $message }}</span> @enderror
                            @if(!empty($families))
                            <ul class="w-full mt-2 bg-white border border-gray-100 "
                                style="position: absolute;">
                                <li wire:click.prevent="clear"
                                    class="relative py-1 pl-8 pr-2 border-b-2 border-gray-100 cursor-pointer hover:bg-yellow-50 hover:text-gray-900">
                                    <b>Clear List</b>
                                </li>
                                @foreach($families as $i => $family)
                                <li wire:click.prevent="selectFamily({{$family['id']}})"
                                    class="relative py-1 pl-8 pr-2 border-b-2 border-gray-100 cursor-pointer hover:bg-yellow-50 hover:text-gray-900">
                                    <b>{{$family['serial_number']}} | {{$family['hh_name']}}</b>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>

                    </div>
                    <div class="flex flex-col w-2/12 px-2 mt-0">
                        <input wire:model="family_id" id="family_id" placeholder="Family ID"
                                        class="w-full px-3 py-2  bg-gray-100 rounded-sm focus:outline-none" />
                    </div>
                    <div class="flex flex-col w-1/12 px-2 mt-0">
                        <div onclick="copyTo()"
                            class="button btn btn-primary">
                            <div>
                                <i class="fa fa-copy"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <h5 class="px-2">2. Search CSO ID</h5>
                <div class="flex items-center justify-between mb-5">
                    <div class="flex flex-col w-full px-2 m-0">
                        <div class="relative z-50">
                            <div class="">
                                <div class="w-full felx-1">
                                    <input wire:model.debounce.500ms="query2" placeholder="Search CSO by name"
                                        class="w-full px-3 py-2  bg-gray-100 rounded-sm focus:outline-none" />
                                </div>
                                <span wire:loading wire:target="query2" class="pl-2 mt-1 felx-1 fa-2x">
                                    <i class="fas fa-circle-notch fa-spin"></i>
                                </span>
                            </div>

                            <div wire:loading wire:target="query2"
                                class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
                                <div class="list-item">Searching...</div>
                            </div>
                            @if(!empty($csos))
                            <ul class="w-full mt-2 bg-white border border-gray-100 "
                                style="position: absolute;">
                                <li wire:click.prevent="clear2"
                                    class="relative py-1 pl-8 pr-2 border-b-2 border-gray-100 cursor-pointer hover:bg-yellow-50 hover:text-gray-900">
                                    <b>Clear List</b>
                                </li>
                                @foreach($csos as $i => $cso)
                                <li wire:click.prevent="selectCSO({{$cso['id']}})"
                                    class="relative py-1 pl-8 pr-2 border-b-2 border-gray-100 cursor-pointer hover:bg-yellow-50 hover:text-gray-900">
                                    <b>{{$cso['name']}} | {{$cso['reg_no']}}</b>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>

                    </div>
                    <div class="flex flex-col w-2/12 px-2 mt-0">
                        <input wire:model="cso_id" id="cso_id" placeholder="CSO ID"
                                        class="w-full px-3 py-2  bg-gray-100 rounded-sm focus:outline-none" />
                    </div>
                    <div class="flex flex-col w-1/12 px-2 mt-0">
                        <div onclick="copyToCSO()"
                            class="button btn btn-primary">
                            <div>
                                <i class="fa fa-copy"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function copyTo() {
            let inputEl = document.getElementById("family_id");
            inputEl.select();                                    // Select element
            inputEl.setSelectionRange(0, inputEl.value.length); // select from 0 to element length

            const successful = document.execCommand('copy');   // copy input value, and store success if needed

            if(successful) {
                alert("Copied the text: " + inputEl.value);
            } else {
                // ...
            }
          }
    </script>

    <script>
        function copyToCSO() {
            let inputEl = document.getElementById("cso_id");
            inputEl.select();                                    // Select element
            inputEl.setSelectionRange(0, inputEl.value.length); // select from 0 to element length

            const successful = document.execCommand('copy');   // copy input value, and store success if needed

            if(successful) {
                alert("Copied the text: " + inputEl.value);
            } else {
                // ...
            }
          }
    </script>
</div>
