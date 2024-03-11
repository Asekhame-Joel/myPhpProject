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
<form method="POST" action="/notes">
  <div class="space-y-6 bg-white px-4 py-5 sm:p-6 block w-3/4">
    <div class="border-b border-gray-900/10 pb-12">
      
  <div class="col-span-full">
          <label for="body" class="block text-sm font-medium leading-6 text-gray-700">Body</label>
          <div class="mt-1">
            <textarea id="body" name="body" rows="5" class="block w-2/3 rounded-md border-5 py-1.5 placeholder:text-gray-400">
              <?php if(isset($_POST['body'])){
                echo $_POST['body'];
              }else{
                echo "hiii";
              } ?>
            </textarea>
            <?php
            if(isset($errors['body'])){ ?>
              <p class="text-red-500 text-md"> <?php echo $errors['body'] ?></p>
           <?php } ?>
        <div class="mt-6 flex items-center justify-start gap-x-6">
    <button type="button" class="text-sm py-2 pt-2 font-semibold leading-6 text-gray-900">Cancel</button>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
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
    