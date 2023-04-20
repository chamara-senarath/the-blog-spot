<x-layout>
    <div class="my-auto mx-auto">
        <div class="card card-normal w-96 bg-base-100 outline">
            <div class="card-body">
                <div class="card-title text-justify mx-auto">User Profile</div>
                <form class="grid gap-y-8 grid-cols-1 place-items-center" action="{{ route('users.update', ['user' => $user]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-y-4 grid-cols-1">
                        <div class="avatar mx-auto">
                            <div class="w-20 rounded-full">
                                <img
                                    src="{{ $user->image ? asset('storage/' . $user->image) : asset('images/no-profile-photo.png') }}" />
                            </div>
                        </div>
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Name"
                            class="input input-bordered w-full max-w-xs" value="{{ $user->name }}" />
                        @error('name')
                            <p class="text-red-500 text-xs -mt-2">{{ $message }}</p>
                        @enderror

                        <label for="email">Email</label>
                        <input type="text" name="email" placeholder="Email"
                            class="input input-bordered w-full max-w-xs" value="{{ $user->email }}" disabled />

                        <label for="profile-image">Upload profile image</label>
                        <input name="profile-image" type="file" class="file-input w-full" />
                    </div>
                    <button class="btn btn-wide">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
