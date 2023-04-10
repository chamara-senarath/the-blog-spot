<div class="flex items-start space-x-4 rounded-lg outline outline-gray-100 p-4">
    <div class="flex-shrink-0">
        <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/150" alt="">
    </div>
    <div class="flex-grow">
        <div class="text-sm">
            <span class="font-medium text-gray-900">{{ $username }}</span>
            <span class="text-gray-500">•</span>
            <span class="text-gray-500">{{ $date }}</span>
        </div>
        <div class="mt-1 text-sm text-gray-700">
            {{ $comment }}
        </div>
    </div>
</div>
