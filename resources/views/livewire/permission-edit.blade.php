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
            <label class="mb-2 text-lg font-bold text-grey-darkest" for="email">Assign Role</label>
            <select name="" id="" multiple wire:model="assignedRoles" class="h-48 px-3 py-2 border text-grey-darkest">
                <option value="">User Roles</option>
                @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
