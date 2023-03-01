<x-layout>
    <div class="grid gap-8 grid-cols-1 md:grid-cols-2 xl:grid-cols-3 mx-auto py-10">
        @foreach ($blogs as $blog)
            <a href="/blogs/{{ $blog->id }}"
                class="card w-96 bg-base-100 outline outline-stone-200 shadow-lg ease-out hover:-translate-y-1 transition-all hover:cursor-pointer">
                <figure>
                    <img class="object-cover h-56" src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('images/no-blog-image.png') }}"
                        alt="{{ $blog['title'] }}" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">
                        {{ $blog['title'] }}
                    </h2>
                    <p>{{ strlen($blog['content']) > 50 ? substr($blog['content'], 0, 50) . '...' : $blog['content'] }}
                    </p>
                    <div class="card-actions justify-end">
                        @foreach ($blog['tags'] as $tag)
                            <div class="badge badge-outline">{{ $tag }}</div>
                        @endforeach
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</x-layout>
