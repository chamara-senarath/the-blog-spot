<x-layout>
    <div class="my-auto mx-auto">
        <div class="card card-normal w-96 bg-base-100 outline">
            <div class="card-body">
                <div class="card-title text-justify">Login</div>
                <form class="grid gap-x-8 gap-y-8 grid-cols-1 place-items-center" action="users/authenticate" method="POST">
                    @csrf
                    <div class="grid gap-y-4 grid-cols-1">
                        <input type="text" name="email" placeholder="Email" class="input input-bordered w-full max-w-xs" value="{{old('email')}}" />
                        @error('email')
                            <p class="text-red-500 text-xs -mt-2">{{ $message }}</p>
                        @enderror

                        <input type="password" name="password" placeholder="Password" class="input input-bordered w-full max-w-xs" value="{{old('password')}}"/>
                        @error('password')
                            <p class="text-red-500 text-xs -mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="btn btn-wide">Login</button>
                    <p>Don't have an account? <a class="text-primary" href="{{ route('users.create') }}">Register</a></p>
                    <a class="text-primary" href="{{ route('password.request') }}">Forgot password </a>
                </form>
            </div>
        </div>
    </div>
</x-layout>
