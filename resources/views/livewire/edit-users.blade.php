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
        <div class="p-4 bg-gray-200 rounded-md">
            <div class="flex flex-col mb-4 md:w-full">
                <label class="mb-2 text-lg font-bold text-grey-darkest" for="email">Is Active</label>
                <select name="" wire:model="isActive" id=""
                    class="@if($user->active == 0)  border-red-500 @else border-green-500 @endif py-2 px-3 text-grey-darkest "
                    wire:change="changeActive">
                    <option value="">Select Option</option>
                    <option @if($user->active == 1) selected @endif value="1">Activate</option>
                    <option @if($user->active == 0) selected @endif value="0">Deactivate</option>
                </select>
            </div>
            <div class="flex flex-col mb-4 md:w-full">
                <label class="mb-2 text-lg font-bold text-grey-darkest" for="email">Branch</label>
                <select name="" id="" wire:model="branch" class="px-3 py-2 border text-grey-darkest"
                    wire:change="changeBranch">
                    <option value="">Branch</option>
                    @foreach($branches as $branch)
                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col mb-4 md:w-full">
                <label class="mb-2 text-lg font-bold text-grey-darkest" for="email">Role</label>
                <select name="" id="" wire:model="role" class="px-3 py-2 border text-grey-darkest"
                    wire:change="changeRole">
                    <option value="">Role</option>
                    @foreach($roles as $role)
                    <option value="{{$role->name}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col mb-4 md:w-full">
                <label class="mb-2 text-lg font-bold text-grey-darkest" for="email">Working DSDs</label>
                <select name="" id="" wire:model="dsds" class="px-3 py-2 border text-grey-darkest" multiple
                    wire:select="UpdatedDsds">
                    @foreach($dsDivisions as $d)
                    <option value="{{$d->id}}">{{$d->name}}</option>
                    @endforeach
                </select>
                <button type="button" wire:click="changeDsds"
                    class="w-48 px-4 py-2 mt-4 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                    Add DSDs
                </button>
            </div>
            <div class="flex flex-col mb-4 md:w-full">
                <label class="mb-2 text-lg font-bold text-grey-darkest" for="email">Working GNDs</label>
                <select name="" id="" wire:model="gnds" class="px-3 py-2 border text-grey-darkest" multiple>
                    @foreach($gnDivisions as $d)
                    <option value="{{$d->id}}">{{$d->name}}</option>
                    @endforeach
                </select>
                <button type="button" wire:click="changeGnds"
                    class="w-48 px-4 py-2 mt-4 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                    Add GNDs
                </button>
            </div>
        </div>
        @endcan
        <div class="p-4 bg-gray-200 rounded-md">
            <div class="flex flex-col mb-4 md:w-full">
                <label class="mb-2 text-lg font-bold text-grey-darkest" for="email">Give Permissions to
                    {{$user->name}}</label>
                <form wire:submit.prevent="givePermission" class="flex flex-col mb-4 md:w-full">
                    <select multiple wire:model="givenPermissions" class="h-48 px-3 py-2 border text-grey-darkest">
                        @foreach($permissions as $permission)
                        <option value="{{$permission->name}}">{{$permission->name}}</option>
                        @endforeach
                    </select> @error('givenPermissions') <span class="error">{{ $message }}</span> @enderror
                    <button type="submit"
                        class="w-48 px-4 py-2 mt-4 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                        Give Permissions
                    </button>
                </form>
            </div>
            @can('Activate User')
            <div class="flex flex-col mb-4 md:w-full">
                <label class="mb-2 text-lg font-bold text-grey-darkest" for="email">Subordinates of
                    {{$user->name}}</label>
                <form wire:submit.prevent="addSubordinates" class="flex flex-col mb-4 md:w-full">
                    <select multiple wire:model="subordinates" class="h-48 px-3 py-2 border text-grey-darkest">
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select> @error('subordinates') <span class="error">{{ $message }}</span> @enderror
                    <button type="submit"
                        class="w-48 px-4 py-2 mt-4 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                        Add Subordinates
                    </button>
                </form>
            </div>

            <div class="flex flex-col mb-4 md:w-full">
                <label class="mb-2 text-lg font-bold text-grey-darkest" for="email">
                    {{$username}} reporting to ?</label>
                <form wire:submit.prevent="addReporting_to" class="flex flex-col mb-4 md:w-full">
                    <select multiple wire:model="reporting_to" class="h-48 px-3 py-2 border text-grey-darkest">
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select> @error('reporting_to') <span class="error">{{ $message }}</span> @enderror
                    <button type="submit"
                        class="w-48 px-4 py-2 mt-4 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                        Add Reporting To
                    </button>
                </form>
            </div>
            @endcan
        </div>
    </div>

</div>
