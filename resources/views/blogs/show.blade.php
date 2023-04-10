<x-layout>
    <div class="flex flex-col px-12 md:px-24 lg:px-64 py-8">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl md:text-7xl font-semibold">{{ $blog->title }}</h1>
            @if ($blog->user_id === auth()->user()->id)
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                    </label>
                    <ul tabindex="0"
                        class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a>Edit blog</a></li>
                        <li><a><label for="delete-blog-modal">Delete blog</label></a></li>
                    </ul>
                </div>
            @endif

        </div>
        <p>{{ $blog->user->name }}</p>
        <p>{{ $blog->created_at->toFormattedDateString() }}</p>
        @if ($blog->image)
            <img class=" mt-4" src="{{ asset('storage/' . $blog->image) }}" @endif
            <p class="mt-8">{{ $blog['content'] }}</p>

            <!-- delete blog modal -->
            <input type="checkbox" id="delete-blog-modal" class="modal-toggle" />
            <div class="modal modal-bottom sm:modal-middle">
                <div class="modal-box">
                    <h3 class="font-bold text-lg">Do you really want to delete this blog?</h3>
                    <div class="modal-action">
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline btn-error">
                                <label for="delete-blog-modal">Yes</label>
                            </button>
                        </form>
                        <label for="delete-blog-modal" class="btn">No</label>
                    </div>
                </div>
            </div>
    </div>

</x-layout>
