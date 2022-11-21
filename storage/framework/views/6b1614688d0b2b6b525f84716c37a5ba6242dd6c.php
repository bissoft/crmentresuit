

<?php $__env->startSection('content'); ?>

<div class="main_content_iner overly_
inner ">
    <div class="container p-0 ">
    <h4 class="mb-5">Upload Document</h4>
        <div class="row">
            
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php if(session()->has('message')): ?>
              <div class="alert alert-success"><?php echo e(session('message')); ?></div>
            <?php endif; ?>
            
            <div class="col-md-6">
            
              <h6>Name: </h6>
              <p><?php echo e($user->name()); ?></p>
            </div>
            <div class="col-md-6">
              <h6>Email: </h6>
              <p><?php echo e($user->email); ?></p>
            </div>
            <div class="col-12 col-md-12 mx-auto mt-5">

                <form action="<?php echo e(route('document.store')); ?>" method="post"
                      enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php if(isset($message)): ?>
                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                    <?php endif; ?>
                    <input type="hidden" name="folder_id" value="3">
                    <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                    <?php if($user->hasRole('Admin')): ?>
                      <div class="form-group mb-4">
                        <label class="form-label">Category</label>
                        <select class="form-select" name="category">
                          <!-- <option>Certificate</option> -->
                          <option>Document</option>
                        </select>
                      </div>
                    <?php endif; ?>
                    <div class="form-group mb-4">
                        <label class="form-label">Expiry Date</label>
                        <input type="date" name="expiry" class="form-control">
                      </div>
                    <div class="drop-zone">
                        <span class="drop-zone__prompt">Drop file here or click to upload</span>
                        <input type="file" name="file" class="drop-zone__input">
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary mt-5">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script type="text/javascript">
        document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
  const dropZoneElement = inputElement.closest(".drop-zone");

  dropZoneElement.addEventListener("click", (e) => {
    inputElement.click();
  });

  inputElement.addEventListener("change", (e) => {
    if (inputElement.files.length) {
      updateThumbnail(dropZoneElement, inputElement.files[0]);
    }
  });

  dropZoneElement.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropZoneElement.classList.add("drop-zone--over");
  });

  ["dragleave", "dragend"].forEach((type) => {
    dropZoneElement.addEventListener(type, (e) => {
      dropZoneElement.classList.remove("drop-zone--over");
    });
  });

  dropZoneElement.addEventListener("drop", (e) => {
    e.preventDefault();

    if (e.dataTransfer.files.length) {
      inputElement.files = e.dataTransfer.files;
      updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
    }

    dropZoneElement.classList.remove("drop-zone--over");
  });
});

/**
 * Updates the thumbnail on a drop zone element.
 *
 * @param  {HTMLElement} dropZoneElement
 * @param  {File} file
 */
function updateThumbnail(dropZoneElement, file) {
  let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

  // First time - remove the prompt
  if (dropZoneElement.querySelector(".drop-zone__prompt")) {
    dropZoneElement.querySelector(".drop-zone__prompt").remove();
  }

  // First time - there is no thumbnail element, so lets create it
  if (!thumbnailElement) {
    thumbnailElement = document.createElement("div");
    thumbnailElement.classList.add("drop-zone__thumb");
    dropZoneElement.appendChild(thumbnailElement);
  }

  thumbnailElement.dataset.label = file.name;

  // Show thumbnail for image files
  if (file.type.startsWith("image/")) {
    const reader = new FileReader();

    reader.readAsDataURL(file);
    reader.onload = () => {
      thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
    };
  } else {
    thumbnailElement.style.backgroundImage = null;
  }
}

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\linkdin\crmentresuit-update\resources\views/document.blade.php ENDPATH**/ ?>