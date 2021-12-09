<div>
    <div class="card">
        <div class="card-header">
            <div class="header-top">
                <h5>Filter by Activity</h5>
                <div class="card-header-right-icon">
                    <select wire:model="activity_id" name="dsd_id" class="button btn btn-primary"
                    class="rounded-sm px-3 py-2 mt-2 focus:outline-none bg-gray-100 w-full">
                    <option value="">All Activities</option>
                    @foreach($activities as $activity)
                    <option value="{{$activity->activity_id}}">{{$activity->code}} | {{$activity->name}}
                    </option>
                    @endforeach
                </select>
              </div>
            </div>

        </div>
        <div class="card-block row">
            <div class="col-sm-12 col-lg-12 col-xl-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Output Name</th>
                                <th>Activity Name</th>
                                <th>Added By</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach($budgets as $b)
                            <tr>
                                <td>
                                    {{$no++}}
                                </td>
                                <td>
                                    {{$b->pre_condition_id}}.{{$b->outcome_id}}.{{$b->output_id}}.{{$b->activity_id}}
                                </td>
                                <td>
                                    {{$b->output}}
                                </td>
                                <td>
                                    {{$b->name}}
                                </td>
                                <td>
                                    {{$b->username}}
                                </td>
                                <td>
                                    <div>
                                        <div class="flex space-x-1 justify-around">
                                         @can('View Budget Type')
                                         <a href="" target="_blank" class="p-1 bg-yellow-600 text-blue-600 hover:bg-yellow-200 hover:text-white rounded">
                                             <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                                         </a>
                                         @endcan
                                         @can('Update Budget Type')
                                         <a href="{{route('budget.edit',[$b->id])}}"  class="p-1 bg-green-600 text-blue-600 hover:bg-green-200 hover:text-white rounded">
                                             <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
                                         </a>
                                         @endcan
                                         @can('Delete Budget Type')
                                         <button class="p-1 bg-red-600 text-red-600 hover:bg-red-200 hover:text-white rounded">
                                             <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                         </button>
                                         @endcan
                                     </div>
                                     </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mx-2 my-2">
                        {{ $budgets->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
