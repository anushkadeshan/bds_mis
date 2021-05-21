<div class="ui form">
                        <div class="inline field" style="float:left;width:400px">
                            @csrf
                            <input type="hidden" name="permission_id" value="{{$permission->id}}">
                            <select name="roles[]" multiple="" class="label ui selection fluid dropdown">
                            <option value="">All</option>
                            @foreach($roles as $role)
                                <option @if($role->hasPermissionTo($permission->id)) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                            </select>
                            
                        </div>  
                        <div style="float:left; margin-left:5px">
                        <button type="submit" class="btn btn-success">{{__('msg.update')}} </button>
                        </div>
                    </div>