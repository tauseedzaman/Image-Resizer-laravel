<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Images resizer</title>
        <link rel="stylesheet" href="../resources/css/bootstrap.css">
        <link rel="stylesheet" href="../resources/css/w3.css">
    </head>
    <body class="bg-dark">
    <div class="container">
        <?php if(session('status')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-12 my-3">
                <h1 class="text-center text-success">Resize Image</h1>
            </div>
                <div class="col-8 mx-auto bg-dark">
                    <div class="card-body ">
                    <form action="resize" class="form my-3" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mt-4">
                            <label for="image" class="custom-file-label mt-5 bg-dark text-success">Select Image To Resize</label>
                            <input type="file" name="image" class="custom-file-input bg-dark" >
                        </div>
                            <div class="form-group">
                                <label for="" class="text-info">Width</label>
                                <input type="text" required class="custom-control mb-3 bg-dark text-success" autocomplete="off" value="250" name="width" placeholder="Width for Image">
                            </div>
                        <button class="btn btn-outline-info btn-lg" >Resize</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
<?php /**PATH D:\xampp\htdocs\ResizeImage\resources\views/welcome.blade.php ENDPATH**/ ?>