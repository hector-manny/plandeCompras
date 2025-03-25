

<?php $__env->startSection('title', 'Nuevo Plan de Compra'); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-6">📝 Reporte de Plan de Compra</h1>

        <?php if(session('success')): ?>
            <div class="bg-green-100 text-green-700 p-3 rounded mb-6">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-6">
                <ul class="list-disc pl-5">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('planes.store')); ?>" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php echo csrf_field(); ?>

            <div>
                <label class="block mb-1 font-semibold">Año:</label>
                <input type="number" name="año" class="w-full border rounded p-2" value="<?php echo e(old('año', date('Y') + 1)); ?>" required>
            </div>

            <div>
                <label class="block mb-1 font-semibold">Unidad Organizativa:</label>
                <select name="unidad_organizativa_id" class="w-full border rounded p-2" required>
                    <option value="">Seleccione</option>
                    <?php $__currentLoopData = $unidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($unidad->id); ?>" <?php echo e(old('unidad_organizativa_id') == $unidad->id ? 'selected' : ''); ?>>
                            <?php echo e($unidad->nombre); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block mb-1 font-semibold">Producto:</label>
                <select name="producto_id" class="w-full border rounded p-2" required>
                    <option value="">Seleccione</option>
                    <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($producto->id); ?>" <?php echo e(old('producto_id') == $producto->id ? 'selected' : ''); ?>>
                            <?php echo e($producto->nombre); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div>
                <label class="block mb-1 font-semibold">Precio Unitario:</label>
                <input type="number" name="precio_unitario" step="0.01" class="w-full border rounded p-2" value="<?php echo e(old('precio_unitario')); ?>" required>
            </div>

            <div>
                <label class="block mb-1 font-semibold">Cantidad:</label>
                <input type="number" name="cantidad" class="w-full border rounded p-2" value="<?php echo e(old('cantidad')); ?>" required>
            </div>

            <div class="md:col-span-2 text-right">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                    Guardar
                </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\plan-compras\resources\views/planes/create.blade.php ENDPATH**/ ?>