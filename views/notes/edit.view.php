    <!--The  must be arranged sequentially to render a proper page layout-->
    <?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/header.php') ?>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <!--
  This example s some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      ('@tailwindcss/forms'),
    ],
  }
  ```
-->
<form method="POST" action="/note">
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="id" value="<?= $note['id'] ?>">

  <div class="space-y-6 bg-white px-4 py-5 sm:p-6 block w-3/4">
    <div class="border-b border-gray-900/10 pb-12">
      
  <div class="col-span-full">
          <label for="body" class="block text-sm font-medium leading-6 text-gray-700">Body</label>
          <div class="mt-1">
            <textarea 
            id="body" name="body" rows="5" class="block w-2/3 rounded-md border-5 py-1.5 placeholder:text-gray-400">
            <?php
             echo $note['body'];  ?></textarea>
          
          <?php  if(isset($errors['body'])){ ?>
              <p class="text-red-500 text-md"> <?php echo $errors['body'] ?></p>
           <?php } ?>
           
           
        <div class="mt-6 flex items-center flex gap-x-3">
    <a href="/notes"
     type="button" class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
     
     Cancel
            </a>

     <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
  </div>  
    </div>
    </div>
      </div>
    </div>
  </div>
</form>
 </div>     
   </main>
        
   <?php require base_path('views/partials/footer.php') ?>
    