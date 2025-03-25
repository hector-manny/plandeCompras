

<?php $__env->startSection('title', 'Listado de Planes de Compra'); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Listado de Planes de Compra</h1>

        <form method="GET" class="flex gap-4 mb-6">
            <div>
                <label class="block text-sm">Año:</label>
                <select name="año" class="border rounded p-2">
                    <option value="">Todos</option>
                    <?php $__currentLoopData = $años; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $año): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($año); ?>" <?php echo e(request('año') == $año ? 'selected' : ''); ?>><?php echo e($año); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div>
                <label class="block text-sm">Unidad Organizativa:</label>
                <select name="unidad_organizativa_id" class="border rounded p-2">
                    <option value="">Todas</option>
                    <?php $__currentLoopData = $unidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($unidad->id); ?>" <?php echo e(request('unidad_organizativa_id') == $unidad->id ? 'selected' : ''); ?>>
                            <?php echo e($unidad->nombre); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="flex items-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Filtrar
                </button>
            </div>
        </form>

        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="p-2 border">Año</th>
                    <th class="p-2 border">Unidad Organizativa</th>
                    <th class="p-2 border">Producto</th>
                    <th class="p-2 border">Precio Unitario</th>
                    <th class="p-2 border">Cantidad</th>
                    <th class="p-2 border">Costo Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $planes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="p-2 border"><?php echo e($plan->año); ?></td>
                        <td class="p-2 border"><?php echo e($plan->unidadOrganizativa->nombre); ?></td>
                        <td class="p-2 border"><?php echo e($plan->producto->nombre); ?></td>
                        <td class="p-2 border">$<?php echo e(number_format($plan->precio_unitario, 2)); ?></td>
                        <td class="p-2 border"><?php echo e($plan->cantidad); ?></td>
                        <td class="p-2 border font-semibold">$<?php echo e(number_format($plan->costo_total, 2)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center p-4">No hay datos para mostrar.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\plan-compras\resources\views/planes/index.blade.php ENDPATH**/ ?>