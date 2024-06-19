<div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12 mt-10">
    <div class="flex justify-between items-center">
        <h1 class="text-lg font-bold my-5">
            Share your perspective.
        </h1>
        <?php if (isset($story)) : ?>
            <div class="flex items-center gap-4">
                Is solved
                <label for="AcceptConditions" class="relative inline-block h-8 w-14 cursor-pointer rounded-full bg-gray-300 transition [-webkit-tap-highlight-color:_transparent] has-[:checked]:bg-green-500">
                    <input type="checkbox" <?php if ($story->status == 'Solved') echo 'checked' ?> onchange="toggleStatus('<?= $story->story_id ?>')" id="AcceptConditions" class="peer sr-only" />

                    <span class="absolute inset-y-0 start-0 m-1 size-6 rounded-full bg-white transition-all peer-checked:start-6"></span>
                </label>
            </div>
        <?php endif ?>
    </div>
    <form action="/stories/store" method="POST" class="space-y-4">
        <input type="text" hidden value="<?= (isset($story)) ? $story->story_id : '' ?>" name="story_id">
        <div>
            <label class="sr-only" for="name">Title</label>
            <input class="w-full rounded-lg border-gray-200 p-3 text-sm" placeholder="Title" type="text" name="title" required id="title" value="<?= (isset($story)) ? $story->title : '' ?>" />
        </div>
        <div>
            <label class="sr-only" for="message">Content</label>

            <textarea class="w-full rounded-lg border-gray-200 p-3 text-sm" placeholder="Content" rows="8" name="content" required id="content"><?= (isset($story)) ? $story->content : '' ?></textarea>
        </div>

        <div class="mt-4 flex items-center gap-4">
            <button type="reset" class="inline-block w-full rounded-md bg-red-500 py-1 px-6 font-base text-white sm:w-auto">
                Clear
            </button>
            <button type="submit" class="inline-block w-full rounded-md bg-indigo-500 py-1 px-6 font-base text-white sm:w-auto">
                Post
            </button>
        </div>
    </form>
</div>
<script>
    function toggleStatus(id) {
        var xhr = new XMLHttpRequest();
        var url = "/stories/status";
        xhr.open("POST", url, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Sudah success
            }
        };
        var data = "id=" + encodeURIComponent(id);
        xhr.send(data);
    }
</script>