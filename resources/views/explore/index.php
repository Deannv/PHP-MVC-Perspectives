<div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">What people experienced today?</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">Read and learn from people's perspective.</p>
        </div>
        <span class="relative flex justify-center mt-10">
            <div class="absolute inset-x-0 top-1/2 h-px -translate-y-1/2 bg-transparent bg-gradient-to-r from-transparent via-gray-500 to-transparent opacity-75"></div>
            <span class="relative z-10 bg-white px-6">Latest Stories</span>
        </span>
        <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-4 gap-y-4 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            <?php foreach ($stories as $story) : ?>
                <article class="flex max-w-xl flex-col items-start justify-between rounded-xl border border-gray-100 p-4 shadow-md hover:shadow-none hover:scale-95 duration-150">
                    <div class="flex items-center gap-x-4 text-xs">
                        <time datetime="2020-03-16" class="text-gray-500"><?= date('jS, M H:i', strtotime($story->created_at)) ?></time>
                        <a class="relative z-10 rounded-full px-3 py-1.5 font-medium text-white <?= ($story->status == 'Open') ? 'bg-yellow-600' : 'bg-green-600' ?>">
                            <?= $story->status ?>
                        </a>
                    </div>
                    <div class="group relative">
                        <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                            <a href="/explore/show?id=<?= $story->story_id ?>">
                                <span class="absolute inset-0"></span>
                                <?= $story->title ?>
                            </a>
                        </h3>
                        <p class="mt-5 text-sm leading-6 text-gray-600 truncate .." style="width: 250px;">
                            <?= $story->content ?>
                        </p>
                    </div>
                    <div class="relative mt-8 flex items-center gap-x-4">
                        <img src="https://api.dicebear.com/9.x/avataaars-neutral/svg?seed=<?= $story->title ?>" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-md text-gray-900">
                                <a href="#">
                                    <span class="absolute inset-0"></span>
                                    <?= $story->username ?>
                                </a>
                            </p>
                            <small class="text-gray-600">Author</small>
                        </div>
                    </div>
                </article>
            <?php endforeach ?>

            <!-- More posts... -->
        </div>
    </div>
</div>