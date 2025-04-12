<?php
require_once "../../app/classes/VehicleManager.php";

$vehicleManager = new VehicleManager('', '', '', '');
$vehicles = $vehicleManager->getVehicles();



include 'header.php';



?>


<div class="container my-4">
    <h1 class="page-title">Vehicle Listing</h1>
    <div class="row">
        <!-- Loop Go here -->
         <?php foreach($vehicles as $id=>$vehicle): ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-img-wrapper">
                        <img src="<?= $vehicle['image'] ?>" class="card-img-top" alt="<?= htmlspecialchars($vehicle['name']) ?>">
                        <div class="card-img-overlay">
                            <div class="vehicle-type-badge">
                                <i class="fas fa-car"></i> <?= htmlspecialchars($vehicle['type']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($vehicle['name']) ?></h5> 
                        <p class="card-text"><i class="fas fa-tag me-2"></i>Price: $<?= htmlspecialchars($vehicle['price']) ?></p>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="edit.php?id=<?= $id ?>" class="btn btn-primary"><i class="fas fa-edit me-1"></i> Edit</a>
                            <a href="delete.php?id=<?= $id ?>" class="btn btn-danger"><i class="fas fa-trash-alt me-1"></i> Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <!-- Loop ends here -->
    </div>
</div>

<!-- Floating Action Button -->
<a href="add.php" class="floating-btn">
    <i class="fas fa-plus"></i>
</a>

<style>
    .card-img-wrapper {
        position: relative;
        overflow: hidden;
    }
    
    .card-img-overlay {
        position: absolute;
        top: 0;
        right: 0;
        padding: 10px;
    }
    
    .vehicle-type-badge {
        background-color: rgba(0, 243, 255, 0.2);
        color: var(--neon-blue);
        padding: 5px 10px;
        border-radius: 3px;
        font-size: 0.8rem;
        border: 1px solid rgba(0, 243, 255, 0.5);
        text-shadow: 0 0 5px rgba(0, 243, 255, 0.7);
        box-shadow: 0 0 10px rgba(0, 243, 255, 0.3);
    }
</style>

</body>
</html>
