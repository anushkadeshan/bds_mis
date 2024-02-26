<div>
    <style>
        .loader {
            border-top-color: #3498db;
            -webkit-animation: spinner 1.5s linear infinite;
            animation: spinner 1.5s linear infinite;
        }

        @-webkit-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spinner {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

    </style>
    <form wire:submit.prevent="save">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-gray-800" id="exampleModalLabel">Upload a Profile Picture</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (session()->has('message'))
                    <div id="alert" class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3"
                        role="alert">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                        </svg>
                        <p>{{ session('message') }}</p>
                    </div>
                    @endif
                    <div class="flex w-full items-center justify-center bg-grey-lighter border-dotted border-gray-500">
                        <label class="w-64 flex flex-col items-center m-3  px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                            </svg>
                            <span class="mt-2 text-base leading-normal">Select a file</span>
                            <input type='file' wire:model="photo" class="hidden" />
                        </label>
                        <br>
                        <div class="text-black" wire:loading wire:target="photo">Uploading...</div>
                    </div>

                    <h1 class="pt-8 pb-3 font-semibold sm:text-lg text-gray-900">
                        To Upload
                      </h1>
                    <span class="text-red ">
                        @error('photo') <span class="error">{{ $message }}</span> @enderror
                    </span>
                    @if($photo)
                    <div class="w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                        <img class="rounded-sm" src="{{ $photo->temporaryUrl() }}">
                    </div>
                    @else

                    <ul id="gallery" class="flex flex-1 flex-wrap -m-1">
                        <li id="empty" class="h-full w-full text-center flex flex-col justify-center items-center">
                          <img class="mx-auto w-32" src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png" alt="no data" />
                          <span class="text-small text-gray-500">No files selected</span>
                        </li>
                      </ul>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button"
                        class="text-white bg-gray-700 hover:bg-gray-600 py-2 px-4 rounded inline-flex items-center"
                        data-dismiss="modal">Close</button>
                    <button type="submit"
                        class="text-white bg-green-700 hover:bg-green-600 py-2 px-4 rounded inline-flex items-center">
                        <svg wire:loading wire:target="save" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        <span wire:loading wire:target="save">Saving</span>
                        <span wire:loading.remove wire:target="save"><i class="fa fa-save"></i> Save</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
    @push('page_scripts')
    <script>
        $("document").ready(function () {
            setTimeout(function () {
                document.getElementById('alert').style.display = 'none';
            }, 5000)
        });
    </script>
    @endpush
</div>
