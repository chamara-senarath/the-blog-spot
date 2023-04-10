<div class="flex flex-col space-y-4 mt-12">
    @foreach ($comments as $comment)
        <div class="flex items-start space-x-4 rounded-lg outline outline-gray-100 p-4">
            <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full" src="{{ asset('images/no-profile-photo.png  ') }}"
                    alt="profile picture" />

            </div>
            <div class="flex-grow">
                <div class="text-sm">
                    <span class="font-medium text-gray-900">{{ $comment->user->name }}</span>
                    <span class="text-gray-500">•</span>
                    <span class="text-gray-500">{{ $comment->created_at->toFormattedDateString() }}</span>
                </div>
                <div class="mt-1 text-sm text-gray-700">
                    {{ $comment->content }}
                </div>
            </div>
        </div>
    @endforeach

    <form action="{{ route('comments.store', $blog) }}" method="POST">
        @csrf
        <div class="card p-4 outline outline-gray-100">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/no-profile-photo.png  ') }}" alt="Profile picture"
                    class="w-10 h-10 rounded-full">
                <input name="content" type="text" placeholder="Write a comment"
                    class="w-full bg-gray-100 rounded-md p-2 focus:outline-none">
            </div>
            <div class="flex items-center justify-end mt-2">
                <button class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md">Submit</button>
            </div>
        </div>
    </form>
</div>
