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
    
        <form class="row mx-auto">
            <div class="form-group col-12">
                <label for="name">Name:</label>
                <input type="text" id="name" wire:model.live="name" class="  form-control mb-2"> {{--binding this input data with
                $name in EditLead.php--}}
                @error('name') <span class="text-danger">* {{ $message }}</span> @enderror
            </div>
            <div class="form-group col-12">
                <label for="email">Email:</label>
                <input type="email" id="email" wire:model.live="email" class=" form-control mb-2">
                @error('email') <span class="text-danger">* {{$message }}</span> @enderror
            </div>
            <div class="form-group col-12">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" wire:model.live="phone" class=" form-control mb-2">
                @error('phone') <span class="text-danger">* {{ $message }}</span> @enderror
            </div>
            <div class="form-group col-12">
                <label for="addLine1">Address Line 1:</label>
                <input type="text" id="addLine1" wire:model.live="addLine1" class="  form-control mb-2">
                @error('addLine1') <span class="text-danger">* {{ $message }}</span> @enderror
            </div>
            <div class="form-group col-12 col-lg-6">
                <label for="state">State:</label>
                <select wire:model="state" id="state" class="  form-control mb-2">
                    @foreach ($states as $st)
                        <option value="{{$st}}">{{$st}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-12 col-lg-6">
                <label for="country">Country:</label>
                <select wire:model="country" id="country" class="  form-control mb-2">
                    @foreach ($countries as $c)
                        <option value="{{$c}}">{{$c}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-12">
                <label for="message">Message:</label>
                <textarea id="message" wire:model="message" class="  form-control mb-2" rows="4"></textarea>
                @error('message') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-12">
                <label for="status">Status:</label>
                <select wire:model="status" id="status" class="  form-control mb-2">
                    <option selected value="new">New</option>
                    <option value="contacted">Contacted</option>
                    <option value="in progress">In Progress</option>
                    <option value="converted">Converted</option>
                    <option value="closed">Closed</option>
                </select>
                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col-12">
                <button type="button" wire:click.prevent="update({{$leadId}})" class="btn btn-success">Update Lead</button>
            </div>
            
        </form>
    </div>

</div>
