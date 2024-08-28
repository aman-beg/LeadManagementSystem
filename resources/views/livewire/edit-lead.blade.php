<div>
    <div id="main-div">
        @if (session()->has('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @elseif (session()->has('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        <div class="d-block text-end">
            <button type="button" wire:click="leadsList()" class="btn btn-dark mx-5">Leads List</button>
        </div>
    
        <form>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" wire:model.live="name" class="form-control"> {{--binding this input data with
                $name in component.php--}}
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
            <button type="button" wire:click.prevent="update({{$leadId}})" class="btn btn-success">Update Lead</button>
        </form>
    </div>

</div>
