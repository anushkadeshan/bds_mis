<div>
    <div>
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
    </div>
    <div class="grid grid-cols-2 gap-4">
        @can('Activate User')
        <div class="bg-gray-200	p-4 rounded-md">
            <div class="flex flex-col mb-4 md:w-full">
                <label class="mb-2  font-bold text-lg text-grey-darkest" for="email">Is Active</label>
                <select name="" wire:model="isActive" id="" class="@if($user->active == 0)  border-red-500 @else border-green-500 @endif py-2 px-3 text-grey-darkest " wire:change="changeActive">
                    <option value="">Select Option</option>
                    <option @if($user->active == 1) selected @endif value="1">Activate</option>
                    <option @if($user->active == 0) selected @endif value="0">Deactivate</option>
                </select>
            </div>
            <div class="flex flex-col mb-4 md:w-full">
                <label class="mb-2  font-bold text-lg text-grey-darkest" for="email">Branch</label>
                <select name="" id="" wire:model="branch" class="border py-2 px-3 text-grey-darkest" wire:change="changeBranch">
                    <option value="">Branch</option>
                    @foreach($branches as $branch)
                        <option  value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col mb-4 md:w-full">
                <label class="mb-2  font-bold text-lg text-grey-darkest" for="email">Role</label>
                <select name="" id="" wire:model="role" class="border py-2 px-3 text-grey-darkest" wire:change="changeRole">
                    <option value="">Role</option>
                    @foreach($roles as $role)
                        <option value="{{$role->name}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endcan
        <div class="bg-gray-200	p-4 rounded-md">
            <div class="flex flex-col mb-4 md:w-full">
                <label class="mb-2 font-bold text-lg text-grey-darkest" for="email">Give Permissions to {{$user->name}}</label>
                <form wire:submit.prevent="givePermission" class="flex flex-col mb-4 md:w-full">
                    <select multiple wire:model="givenPermissions" class="border h-48 py-2 px-3 text-grey-darkest">
                @foreach($permissions as $permission)
                    <option value="{{$permission->name}}">{{$permission->name}}</option>
                @endforeach
            </select> @error('givenPermissions') <span class="error">{{ $message }}</span> @enderror
                    <button type="submit" class="w-48 mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Give Permissions
            </button>
                </form>
            </div>
            @can('Activate User')
            <div class="flex flex-col mb-4 md:w-full">
                <label class="mb-2  font-bold text-lg text-grey-darkest" for="email">Add Branches to Regional Managers</label>
                <select name="" id="" wire:model="regional_branches" multiple class="border py-2 px-3 text-grey-darkest">
                    <option value="">Branch</option>
                    @foreach($branches as $branch)
                        <option  value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
                </select>
                <button type="button" wire:click="changeBranches" class="w-48 mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Add Branches
                    </button>
            </div>
            @endcan
        </div>
    </div>

</div>
