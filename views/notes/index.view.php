<!--The  must be arranged sequentially to render a proper page layout-->
<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/header.php') ?>
<main>
<div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
<h1>
Welcome to the notes page!
<?php 
foreach ($notes as $note): ?>
<li>
    <a href="/note?id=<?php echo $note['id']?>" class="text-blue-500 underline">
    <?php  echo htmlspecialchars($note['body']) ?>
    </a>
</li>
<?php  endforeach; ?>
     </h1>  
     <p class="mt-5"> <a href ="notes/create" class="text-blue-500 border-4">
        Create Note
     </a> </p> 
     <?php require base_path('views/partials/footer.php') ?>
