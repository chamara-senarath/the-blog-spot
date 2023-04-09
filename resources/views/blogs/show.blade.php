<x-layout>
    <div class="flex flex-col px-12 md:px-24 lg:px-64 py-8">
        <h1 class="text-7xl font-semibold">{{ $blog->title }}</h1>
        <p>{{ $blog->user->name }}</p>
        <p>{{ $blog->created_at->toFormattedDateString() }}</p>
        @if ($blog->image)
            <img class=" mt-4" src="{{ asset('storage/' . $blog->image) }}"
        @endif
        <p class="mt-8">{{ $blog['content'] }}</p>
    </div>

</x-layout>
