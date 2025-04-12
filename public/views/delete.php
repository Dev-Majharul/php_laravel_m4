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
                <a href="index.php" class="btn btn-secondary btn-lg"><i class="fas fa-arrow-left me-2"></i> Back to List</a>
                <form method="POST" class="d-inline">
                    <button type="submit" name="confirm" value="yes" class="btn btn-danger btn-lg"><i class="fas fa-trash-alt me-2"></i> Yes, Delete</button>
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
    
    .btn {
        padding: 12px 24px;
        font-size: 1rem;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        border-radius: 5px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .btn::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(
            45deg,
            transparent,
            rgba(255, 255, 255, 0.1),
            transparent
        );
        transform: translateX(-100%);
        transition: transform 0.6s ease;
    }
    
    .btn:hover::after {
        transform: translateX(100%);
    }
    
    .btn-danger {
        background-color: transparent;
        border: 2px solid var(--neon-pink);
        color: var(--neon-pink);
        box-shadow: 0 0 15px rgba(255, 0, 255, 0.3);
    }
    
    .btn-danger:hover {
        background-color: var(--neon-pink);
        color: var(--darker-bg);
        box-shadow: 0 0 25px rgba(255, 0, 255, 0.7);
        transform: translateY(-3px);
    }
    
    .btn-secondary {
        background-color: transparent;
        border: 2px solid var(--neon-yellow);
        color: var(--neon-yellow);
        box-shadow: 0 0 15px rgba(255, 255, 0, 0.3);
    }
    
    .btn-secondary:hover {
        background-color: var(--neon-yellow);
        color: var(--darker-bg);
        box-shadow: 0 0 25px rgba(255, 255, 0, 0.7);
        transform: translateY(-3px);
    }
</style>

</body>
</html>