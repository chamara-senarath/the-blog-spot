<x-layout>
    <div class="my-auto mx-auto">
        <div class="card card-normal w-96 bg-base-100 outline">
            <div class="card-body">
                <div class="card-title text-justify">Reset Password</div>
                <form class="grid gap-x-8 gap-y-8 grid-cols-1 " action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="grid gap-y-4 grid-cols-1">
                        <label for="email">Enter your email</label>
                        <input type="text" name="email" placeholder="Email"
                            class="input input-bordered w-full max-w-xs" value="{{ old('email') }}" />
                        @error('email')
                            <p class="text-red-500 text-xs -mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    @if (session('status'))
                        {{ session('status') }}
                    @else
                        <button class="btn btn-wide mx-auto">Reset</button>
                    @endif

                </form>
            </div>
        </div>
    </div>
</x-layout>
