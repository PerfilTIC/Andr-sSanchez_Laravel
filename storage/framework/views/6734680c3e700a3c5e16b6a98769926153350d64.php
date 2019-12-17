    <div class="card-header">
        <div class='data-user'>
            <a href="<?php echo e(route('product.detail',['id' => $product->id])); ?>" class="nav-link">
                <span class="nickname"> <?php echo e($product->name); ?> </span>
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="image-container">
            <a href="<?php echo e(route('product.detail',['id' => $product->id])); ?>">
                <img src="<?php echo e(route('product.file',['filename' => $product->image1])); ?>" />
            </a>
        </div>
        <div class="description">
            <span class="nickname"><?php echo e('Producto: '.$product->name); ?></span>
            <br/>
            <span class="nickname"><?php echo e('Precio: $'.$product->price); ?></span>
            <p><?php echo e($product->description); ?></p>
        </div>
        
    </div>
    <div class="clearfix"></div>
<?php /**PATH C:\wamp64\www\tienda\resources\views/includes/product.blade.php ENDPATH**/ ?>