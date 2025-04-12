<?php
require_once "../../app/classes/VehicleManager.php";

if($_SERVER['REQUEST_METHOD']=== "POST"){
    $vehicleManager = new VehicleManager('', '', '', '');
    $vehicleManager->addVehicle([
        'name' => $_POST['name'],
        'type' => $_POST['type'],
        'price' => $_POST['price'],
        'image' => $_POST['image']
    ]);
    header("Location: ../index.php");
    exit;
}


include './header.php';
?>

<div class="container my-4">
    <h1 class="page-title">Add Vehicle</h1>
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <form method="POST">
                <div class="mb-4">
                    <label class="form-label"><i class="fas fa-car me-2"></i>Vehicle Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label class="form-label"><i class="fas fa-tag me-2"></i>Vehicle Type</label>
                    <input type="text" name="type" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label class="form-label"><i class="fas fa-dollar-sign me-2"></i>Price</label>
                    <input type="number" name="price" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label class="form-label"><i class="fas fa-image me-2"></i>Image URL</label>
                    <input type="text" name="image" class="form-control" required>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <a href="../index.php" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Back</a>
                    <button type="submit" class="btn btn-success"><i class="fas fa-plus me-1"></i> Add Vehicle</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>



    
