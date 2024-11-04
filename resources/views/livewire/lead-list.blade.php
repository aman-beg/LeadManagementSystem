<div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif

    <div class="d-flex flex-column gap-3 flex-lg-row align-items-center justify-content-between w-100 my-5">
        <button type="button" wire:click="createLead()" class="btn btn-dark mx-5">Create Lead</button>
        <livewire:filterleads />
        <livewire:searchleads />
    </div>
    <div class="table-responsive">
        <table class="table table-sm table-bordered mt-5">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leads as $lead)
                    <tr>
                        <td>{{$lead->name}}</td>
                        <td>{{$lead->email}}</td>
                        <td>{{$lead->phone}}</td>
                        <td>{{$lead->address}}</td>
                        <td>{{$lead->message}}</td>
                        <td>{{$lead->status}}</td>
                        <td>
                            <button wire:click="edit({{$lead->id}})" class="btn btn-primary">Edit</button>
                            <button wire:click="delete({{$lead->id}})" wire:confirm="Are you sure you want to delete this lead?" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    
    {{$leads->links(data: ['scrollTo' => false])}}

</div>
