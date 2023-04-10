<x-layout>

    <head>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
        </script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    </head>


    <div class="flex flex-col px-12 py-8">
        @if (!$is_edit)
            <h1 class="text-4xl">Create your blog</h1>
            <form class="grid grid-cols-1 gap-4 mt-8" action="{{ route('blogs.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <input name="title" type="text" placeholder="Title" class="input input-bordered w-full" />
                <textarea name="content" class="summernote" name="description"></textarea>
                <input name="tags" type="text" placeholder="Tags" class="input input-bordered w-full" />
                <label for="header-image">Upload header image of the blog</label>
                <input name="header-image" type="file" class="file-input w-full" />
                <button class="btn">Submit</button>
            </form>
        @else
            <h1 class="text-4xl">Edit your blog</h1>
            <form class="grid grid-cols-1 gap-4 mt-8" action="{{ route('blogs.update', ['blog' => $blog->id]) }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input name="title" type="text" placeholder="Title" value="{{ $blog->title }}"
                    class="input input-bordered w-full" />
                <textarea name="content" class="summernote" name="description">{{ $blog->content }}</textarea>
                <input name="tags" type="text" placeholder="Tags" value="{{ implode(",", $blog->tags) }}"
                    class="input input-bordered w-full" />
                <label for="header-image">Upload header image of the blog</label>
                <input name="header-image" type="file" class="file-input w-full" />
                <button class="btn">Submit</button>
            </form>
        @endif
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ]
            });
        });
    </script>
</x-layout>
