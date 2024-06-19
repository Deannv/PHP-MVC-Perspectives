<div>
    <div class="px-4 sm:px-0">
        <button onclick="window.history.go(-1);" class="text-center text-2xl font-bold text-indigo-500 rounded px-4 border border-indigo-500 hover:bg-indigo-500 hover:text-white duration-150">&larr;</button>
        <h3 class="text-base font-semibold leading-7 text-gray-900 mt-4">Story Detail</h3>
        <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Perspective from <?= $story->username ?>.</p>
    </div>
    <div class="mt-6 border-t border-gray-100">
        <dl class="divide-y divide-gray-100">
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Author</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 flex items-center gap-4">
                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white" src="https://api.dicebear.com/9.x/avataaars-neutral/svg?seed=<?= $story->username ?>" alt="">
                    <strong><?= $story->username ?></strong>
                </dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Title</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><?= $story->title ?></dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Story</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><?= $story->content ?></dd>
            </div>
            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-gray-900">Information</dt>
                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 flex items-center gap-5">
                    <span class="inline-flex items-center justify-center rounded-full bg-emerald-100 px-2.5 py-0.5 text-emerald-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-ms-1 me-1.5 h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9.75h4.875a2.625 2.625 0 010 5.25H12M8.25 9.75L10.5 7.5M8.25 9.75L10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0c1.1.128 1.907 1.077 1.907 2.185z" />
                        </svg>

                        <p class="whitespace-nowrap text-sm"><?= $total_comments ?> Comments</p>
                    </span>
                </dd>
            </div>
        </dl>
    </div>
    <span class="flex items-center mt-6">
        <span class="pr-6">What people think about this story?</span>
        <span class="h-px flex-1 bg-black"></span>
    </span>
    <div class="p-10">
        <form action="/comment/post" method="POST">
            <label for="OrderNotes" class="sr-only">Comment</label>

            <div class="overflow-hidden rounded-lg border border-gray-200 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                <input type="hidden" name="story_id" value="<?= $story->story_id ?>">
                <textarea id="OrderNotes" name="message" class="w-full resize-none border-none align-top focus:ring-0 sm:text-sm" rows="4" placeholder="Share your thoughts about this story..."></textarea>

                <div class="flex items-center justify-end gap-2 bg-white p-3">
                    <button type="reset" class="rounded bg-gray-200 px-3 py-1.5 text-sm font-medium text-gray-700 hover:text-gray-600">
                        Clear
                    </button>

                    <button type="submit" class="rounded bg-indigo-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-indigo-700">
                        Add
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="flex flex-col gap-5 p-4">
        <?php foreach ($comments as $comment) : ?>
            <div class="flex items-start gap-2.5 border-b border-gray-100">
                <img class="w-8 h-8 rounded-full" src="https://api.dicebear.com/9.x/notionists/svg?seed=<?= $comment->name ?>" alt="Profile Picture">
                <div class="flex flex-col w-full max-w-[320px] leading-1.5">
                    <div class="flex items-center space-x-2 rtl:space-x-reverse">
                        <span class="text-sm font-semibold text-gray-900"><?= $comment->name ?></span>
                        <span class="text-sm font-normal text-gray-500"><?= date('H:i', strtotime($comment->created_at)) ?></span>
                    </div>
                    <p class="text-sm font-normal py-2 text-gray-900"><?= $comment->message ?></p>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>