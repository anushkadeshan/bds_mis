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
            <label class="mb-2  font-bold text-lg text-grey-darkest" for="email">Assign Role</label>
            <select name="" id="" multiple wire:model="assignedRoles" class="border h-48 py-2 px-3 text-grey-darkest">
                <option value="">User Roles</option>
                @foreach($roles as $role)
                    <option  value="{{$role->name}}">{{$role->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
