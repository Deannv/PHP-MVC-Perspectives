<div class="mx-auto max-w-2xl mt-10 sm:text-center mb-20">
    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Your own stories</h2>
    <p class="mt-6 text-lg leading-8 text-gray-600">Track your journey and keep the memories.</p>
</div>
<a href="/stories/new" class="inline-flex items-center gap-2 rounded border border-indigo-600 bg-indigo-600 px-8 py-3 text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
    <span class="text-sm font-medium"> Post a Story </span>

    <svg class="size-5 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
    </svg>
</a>
<div class="overflow-x-auto rounded-lg border border-gray-200 mt-10 p-6">
    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm display p-6" id="Mytable">
        <thead class="ltr:text-left rtl:text-right">
            <tr>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">No</th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Title</th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Content</th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Action</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
            <?php foreach ($stories as $index => $story) : ?>
                <tr>
                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"><?= $index + 1 ?></td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700"><a href="/explore/show?id=<?= $story->story_id ?>"><?= $story->title ?></a></td>
                    <td class="px-4 py-2 text-gray-700 truncate" style="width: 300px;"><?= (strlen($story->content) > 80) ? substr($story->content, 0, 80) . '...' : $story->content; ?></td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                        <span class="inline-flex overflow-hidden rounded-md border bg-white shadow-sm">
                            <a href="/stories/edit?id=<?= $story->story_id ?>" class="inline-block border-e p-3 text-blue-700 hover:bg-gray-50 focus:relative" title="Edit Product">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </a>
                            <form action="/stories/delete" method="POST" onsubmit="return confirm('Are you sure want to delete this story?')">
                                <input type="text" value="<?= $story->story_id ?>" hidden name="story_id">
                                <button type="submit" class="inline-block p-3 text-red-700 hover:bg-gray-50 focus:relative" title="Delete Product">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </span>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>