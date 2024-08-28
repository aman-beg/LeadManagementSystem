<div id="main-div">
    @if (session()->has('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @elseif (session()->has('error'))
        <div class="alert alert-danger">{{session('error')}}</div>
    @endif
    <div class="d-block text-end">
        <button type="button" wire:click="leadsList()" class="btn btn-dark mx-5">Leads List</button>
    </div>
    
    <form wire:submit.prevent="store()">
        <div class="form-group">
            <label for="name">Name:</label>
            <em>*</em><input type="text" id="name" wire:model.live="name" required pattern="^[a-zA-Z\s]+$" class="form-control mb-2"> {{--binding this input data with $name in component.php--}}
            @error('name') <span class="text-danger">* {{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" wire:model.live="email" class="form-control mb-2">
            @error('email') <span class="text-danger">* {{$message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <em>*</em><input type="number" required id="phone" wire:model.live="phone" class="form-control mb-2">
            @error('phone') <span class="text-danger">* {{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" wire:model="message" class="form-control mb-2" rows="4"></textarea>
            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select wire:model="status" id="status" class="form-control mb-2">
                <option selected value="new">New</option>
                <option value="contacted">Contacted</option>
                <option value="in progress">In Progress</option>
                <option value="converted">Converted</option>
                <option value="closed">Closed</option>
            </select>
            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create Lead</button>
    </form>
</div>
