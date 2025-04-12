<?php
require_once "./../app/classes/VehicleManager.php";

$vehicleManager = new VehicleManager('', '', '', '');
$vehicles = $vehicleManager->getVehicles();



include './views/header.php';



?>


<div class="container my-4">
    <h1 class="page-title">Vehicle Listing</h1>
    <div class="row">
        <!-- Loop Go here -->
         <?php foreach($vehicles as $id=>$vehicle): ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?= $vehicle['image'] ?>" class="card-img-top" alt="<?= htmlspecialchars($vehicle['name']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($vehicle['name']) ?></h5> 
                        <p class="card-text"><i class="fas fa-car me-2"></i>Type: <?= htmlspecialchars($vehicle['type']) ?></p>
                        <p class="card-text"><i class="fas fa-tag me-2"></i>Price: $<?= htmlspecialchars($vehicle['price']) ?></p>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="./views/edit.php?id=<?= $id ?>" class="btn btn-primary"><i class="fas fa-edit me-1"></i> Edit</a>
                            <a href="./views/delete.php?id=<?= $id ?>" class="btn btn-danger"><i class="fas fa-trash-alt me-1"></i> Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <!-- Loop ends here -->
    </div>
</div>

<!-- Floating Action Button -->
<a href="./views/add.php" class="floating-btn">
    <i class="fas fa-plus"></i>
</a>

</body>
</html>
