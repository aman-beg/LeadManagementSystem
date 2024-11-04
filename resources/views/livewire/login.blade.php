<div class="login-box mt-5 mx-auto">
    <form method="post" action="">
        @csrf
        @if ($registedForm)
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input wire:model="name" type="text" class="form-control" id="name">
            </div>
        @endif
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input wire:model="email" type="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input wire:model="password" type="password" class="form-control" id="password">
        </div>
        @if ($registedForm)
            <div>
                <a wire:click="register" class="btn btn-primary">Register</a>
            </div>
        @else
            <div class="mb-3">
                <a wire:click="authentication" class="btn btn-primary">Login</a>
            </div>
        @endif
        
    </form>
</div>
