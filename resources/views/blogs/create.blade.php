<x-layout>
    <div class="flex justify-center">
        <div class="card card-normal w-96 bg-base-100 outline">
            <div class="card-body">
                <div class="card-title text-justify">Create a blog</div>
                <form class="grid grid-cols-1 gap-4" action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input name="title" type="text" placeholder="Title" class="input input-bordered w-full" />
                    <textarea name="content" class="textarea textarea-bordered w-full" placeholder="Content"></textarea>
                    <input name="tags" type="text" placeholder="Tags" class="input input-bordered w-full" />
                    <input name="header-image" type="file" class="file-input w-full" />
                    <button class="btn">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
