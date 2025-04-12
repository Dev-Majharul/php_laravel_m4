<?php
require_once "../../app/classes/VehicleManager.php";

$vehicleManager = new VehicleManager('', '', '', '');
$id = $_GET['id'] ?? null;

if($id === null){
    // print_r("HEllo");
    header("Location: index.php");
    exit;
}

$vehicles = $vehicleManager->getVehicles();
$vehicle = $vehicles[$id] ?? null;

if(!$vehicle){
    // print_r("HEllo");
    header("Location: index.php");
    exit;
}

if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(isset($_POST['confirm']) && $_POST['confirm'] === 'yes'){
        $vehicleManager->deleteVehicle($id);
    }
    header("Location: index.php");
    exit;
}


include './header.php';
?>

<div class="container my-4">
    <h1 class="page-title">Delete Vehicle</h1>
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong>Warning:</strong> This action cannot be undone.
            </div>
            <p class="mb-4">Are you sure you want to delete <strong><?= htmlspecialchars($vehicle['name']) ?></strong>?</p>
            <div class="d-flex justify-content-between mt-4">
                <a href="../index.php" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Cancel</a>
                <form method="POST" class="d-inline">
                    <button type="submit" name="confirm" value="yes" class="btn btn-danger"><i class="fas fa-trash-alt me-1"></i> Yes, Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        position: relative;
        overflow: hidden;
    }
    
    .card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(
            45deg,
            transparent,
            rgba(255, 0, 255, 0.1),
            transparent
        );
        transform: rotate(45deg);
        animation: cyber-glow 3s linear infinite;
    }
    
    @keyframes cyber-glow {
        0% {
            transform: rotate(45deg) translateY(0);
        }
        100% {
            transform: rotate(45deg) translateY(100%);
        }
    }
    
    .alert-danger {
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% {
            box-shadow: 0 0 10px rgba(255, 0, 255, 0.2);
        }
        50% {
            box-shadow: 0 0 20px rgba(255, 0, 255, 0.4);
        }
        100% {
            box-shadow: 0 0 10px rgba(255, 0, 255, 0.2);
        }
    }
</style>

</body>
</html>