<x-layout>
    <div class="my-auto mx-auto">
        <div class="card card-normal w-96 bg-base-100 outline">
            <div class="card-body">
                <div class="card-title text-justify">Reset password</div>
                <form class="grid gap-y-8 grid-cols-1 place-items-center" action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <div class="grid gap-y-4 grid-cols-1">
                        <input type="hidden" name="token" value="{{ $token }}">

                        <input type="text" name="email" placeholder="Email"
                            class="input input-bordered w-full max-w-xs" value="{{old('email')}}"/>
                        @error('email')
                            <p class="text-red-500 text-xs -mt-2">{{ $message }}</p>
                        @enderror

                        <input type="password" name="password" placeholder="Password"
                            class="input input-bordered w-full max-w-xs" value="{{old('password')}}"/>
                        @error('password')
                            <p class="text-red-500 text-xs -mt-2">{{ $message }}</p>
                        @enderror

                        <input type="password" name="password_confirmation" placeholder="Confirm Password"
                            class="input input-bordered w-full max-w-xs" value="{{old('password_confirmation')}}"/>
                        @error('password_confirmation')
                            <p class="text-red-500 text-xs -mt-2">{{ $message }}</p>
                        @enderror


                    </div>
                    <button class="btn btn-wide">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
