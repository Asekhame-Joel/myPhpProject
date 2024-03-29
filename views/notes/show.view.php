<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/header.php') ?>
<main>
<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
<p class="mb-6">  
<a href="/notes" class="text-blue-500 underline">Go Back</a>
</p>
<p>
<?php  echo htmlspecialchars($note['body']) ?>
</p>
<footer class="py-2">
    <div style="display: flex;">
        <a href="/note/edit?id=<?= $note['id']?>" class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Edit</a>

        <form style="margin-left: 10px;" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id']?>">
            <button class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">DELETE</button>
        </form>
    </div>
</footer>


</div>

<?php require base_path('views/partials/footer.php') ?>
