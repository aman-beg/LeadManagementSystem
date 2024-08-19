<div id="main-div">
    @if (session()->has('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <form>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" wire:model.live="name" class="form-control"> {{--binding this input data with $name in component.php--}}
            @error('name') <span class="text-danger">* {{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" wire:model.live="email" class="form-control">
            @error('email') <span class="text-danger">* {{$message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" wire:model.live="phone" class="form-control">
            @error('phone') <span class="text-danger">* {{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" wire:model="message" class="form-control" rows="4"></textarea>
            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select wire:model="status" id="status" class="form-control">
                <option selected value="new">New</option>
                <option value="contacted">Contacted</option>
                <option value="in progress">In Progress</option>
                <option value="converted">Converted</option>
                <option value="closed">Closed</option>
            </select>
            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <!-- update btn but when edit is clicked on a lead -->
        @if ($updateMode)
            <button type="button" wire:click.prevent="update()" class="btn btn-success">Update Lead</button>
        <!-- otherwise, create btn -->
        @else
            <button type="button" wire:click.prevent="store()" class="btn btn-primary">Create Lead</button>
        @endif
    </form>
    <hr>
    <livewire:filterleads/>
    <livewire:searchleads/>
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
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
                    <td>{{$lead->message}}</td>
                    <td>{{$lead->status}}</td>
                    <td>
                        <button wire:click="edit({{$lead->id}})" class="btn btn-primary">Edit</button>
                        <button wire:click="delete({{$lead->id}})" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
