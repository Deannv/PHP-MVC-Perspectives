<header class="absolute inset-x-0 top-0 z-50 mx-auto max-w-7xl">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="/" class="-m-1.5 p-1.5 text-3xl font-bold">
                &#9739;
            </a>
        </div>
        <div class="flex gap-x-4 lg:gap-x-12">
            <a href="/" class="text-sm font-semibold leading-6 text-gray-900">Home</a>
            <a href="/explore" class="text-sm font-semibold leading-6 text-gray-900">Explore</a>
            <?php if (isset($_SESSION['username'])) : ?>
                <a href="/stories" class="text-sm font-semibold leading-6 text-gray-900">My Stories</a>
            <?php endif ?>
        </div>
        <div class="flex lg:flex-1 lg:justify-end">
            <?php if (isset($_SESSION['username'])) : ?>
                <a href="/auth/signout" class="text-sm font-semibold leading-6 text-red-600">Log out <span aria-hidden="true">&rarr;</span></a>
            <?php else : ?>
                <a href="/auth/signin" class="text-sm font-semibold leading-6 text-indigo-600">Log in <span aria-hidden="true">&rarr;</span></a>
            <?php endif ?>
        </div>
    </nav>
    </div>
</header>