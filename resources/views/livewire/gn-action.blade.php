<div class="mt-5">
    <div class="grid grid-cols-1 justify-between">
        <div class="flex">
            <div class="flex-initial ml-2">
                <button wire:click.prevent="approved" class="bg-white text-green-600 font-semibold hover:text-green-900 py-2 px-4 border border-green hover:border-transparent rounded">
                    <i class="fas fa-plus-circle"></i>
                    Add to Working
                </button>
            </div>
            <div class="flex-initial ml-2">
                <button wire:click.prevent="delete" class="bg-white text-red-600 font-semibold hover:text-red-900 py-2 px-4 border border-red hover:border-transparent rounded">
                    <i class="fas fa-times-circle"></i>
                    Remove from Working
                </button>
            </div>
        </div>

    </div>
</div>
