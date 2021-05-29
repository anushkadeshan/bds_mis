<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
        <div class="flex flex-col mb-4 md:w-full">
            <label class="mb-2 font-bold text-lg text-grey-darkest" for="email">Give Permissions to {{$role->name}}</label>
            <form wire:submit.prevent="givePermission" class="flex flex-col mb-4 md:w-full">
            <select multiple wire:model="givenPermissions" class="border h-48 py-2 px-3 text-grey-darkest">
                @foreach($permissions as $permission)
                    <option value="{{$permission->name}}">{{$permission->name}}</option>
                @endforeach
            </select>
            @error('givenPermissions') <span class="error">{{ $message }}</span> @enderror
            <button type="submit" class="w-48 mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Give Permissions
            </button>
        </form>
    </div>
</div>
