<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Blog Spot</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.1/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div id="notifications-container" class="fixed top-4 right-4 z-50">
        @if (session('success'))
            <div class="alert alert-success shadow-lg">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span> {{ session('success') }}
                </div>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-error shadow-lg">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span> {{ session('error') }}
                    </span>
                </div>
            </div>
        @endif
    </div>
    <div class="flex flex-col min-h-screen">
        <div class="navbar bg-base-100">
            <div class="flex-1">
                <a class="normal-case text-xl" href="/"><img src="{{ asset('/images/logo.png') }}"
                        width="80px"></a>
            </div>
            <div class="flex-none">
                <a href="{{ route('users.login') }}" class="btn btn-ghost gap-2  mr-2"> Login </a>
                <a href="{{ route('blogs.create') }}" class="btn btn-ghost gap-2  mr-2">
                    Write a blog
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                </a>
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img src="{{ asset('images/no-profile-photo.png  ') }}" />
                        </div>
                    </label>
                    <ul tabindex="0"
                        class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                        <li>
                            <a class="justify-between">
                                Profile
                                <span class="badge">New</span>
                            </a>
                        </li>
                        <li><a>Settings</a></li>
                        <li><a>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        {{ $slot }}

        <footer class="footer items-center p-4 bg-neutral text-neutral-content sticky top-[100vh]">
            <div class="items-center grid-flow-col">
                <p>Copyright © R.B.C.J.B.Senarath</p>
            </div>
        </footer>
    </div>

    <script>
        // Get the notifications container element
        const notificationsContainer = document.getElementById('notifications-container');

        // Get all alert elements inside the notifications container
        const alerts = notificationsContainer.querySelectorAll('.alert');

        // Hide alerts after 2500ms
        alerts.forEach(alert => {
            setTimeout(() => {
                alert.remove();
            }, 2500);
        });
    </script>
</body>

</html>
