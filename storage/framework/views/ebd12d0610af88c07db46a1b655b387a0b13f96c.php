<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card pub_image pub_image_detail">
                <div class="card-header">
                    <div class='data-user'>
                        <span class="nickname"> <?php echo e($product->name); ?> </span>
                    </div>
                </div>

                <div class="card-body">
                    
                    <div class="description">
                        <p><?php echo e('Descripción: '.$product->description); ?></p>
                    </div>
                    <div class="description">
                        <p><?php echo e('Peso: '.$product->weight); ?></p>
                    </div>
                    <div class="description">
                        <p><?php echo e('Precio: '.$product->price); ?></p>
                    </div>
                    <div class="description">
                        <p><?php echo e('Categoria: '.$product->category_id); ?></p>
                    </div>
                    <div class="image-container image-detail">
                        <img src="<?php echo e(route('product.file',['filename' => $product->image1])); ?>" />
                    </div>
                    <div class="image-container image-detail">
                        <img src="<?php echo e(route('product.file',['filename' => $product->image2])); ?>" />
                    </div>
                    <div class="image-container image-detail">
                        <img src="<?php echo e(route('product.file',['filename' => $product->image3])); ?>" />
                    </div>
                    <?php if(Auth::user()->email == 'admin@admin.com'): ?>
                    <div class="actions">
                        <a href="<?php echo e(route('product.edit',['id' => $product->id])); ?>" class="btn btn-sm btn-primary">Actualizar</a>
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal">
                            Eliminar
                        </button>

                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">¿Estás seguro?</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Sí eliminas el producto no podrás recuperarlo, ¿estás seguro de querer borrarlo?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                                        <a href="<?php echo e(route('product.delete',['id' => $product->id])); ?>" class="btn btn-danger">Borrar Definitivamente</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div  class="crearfix"></div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\tienda\resources\views/product/detail.blade.php ENDPATH**/ ?>