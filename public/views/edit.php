<?php

require_once "../../app/classes/VehicleManager.php";

$vehicleManager = new VehicleManager('', '', '', '');
$id = $_GET['id'] ?? null;

if($id === null){
    header("Location: index.php");
    exit;
}

$vehicles = $vehicleManager->getVehicles();
$vehicle = $vehicles[$id] ?? null;


if(!$vehicle){
    header("Location: index.php");
    exit;
}

if($_SERVER['REQUEST_METHOD']=== "POST"){
    $vehicleManager->editVehicle($id,[
        'name' => $_POST['name'],
        'type' => $_POST['type'],
        'price' => $_POST['price'],
        'image' => $_POST['image']
    ]);
    header("Location: index.php");
    exit;
}




include './header.php';
?>


<div class="container my-4">
    <h1 class="page-title">Edit Vehicle</h1>
    <div class="card shadow-sm">
        <div class="card-body p-4">
            <form method="POST">
                <div class="mb-4">
                    <label class="form-label"><i class="fas fa-car me-2"></i>Vehicle Name</label>
                    <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($vehicle['name']) ?>" required>
                </div>
                <div class="mb-4">
                    <label class="form-label"><i class="fas fa-tag me-2"></i>Vehicle Type</label>
                    <input type="text" name="type" class="form-control" value="<?= htmlspecialchars($vehicle['type']) ?>" required>
                </div>
                <div class="mb-4">
                    <label class="form-label"><i class="fas fa-dollar-sign me-2"></i>Price</label>
                    <input type="number" name="price" class="form-control" value="<?= htmlspecialchars($vehicle['price']) ?>" required>
                </div>
                <div class="mb-4">
                    <label class="form-label"><i class="fas fa-image me-2"></i>Image URL</label>
                    <input type="text" name="image" class="form-control" value="<?= htmlspecialchars($vehicle['image']) ?>" required>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <a href="index.php" class="btn btn-secondary btn-lg"><i class="fas fa-arrow-left me-2"></i> Back to List</a>
                    <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save me-2"></i> Update Vehicle</button>
                </div>
            </form>
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
            rgba(0, 243, 255, 0.1),
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
    
    .btn-primary {
        background-color: transparent;
        border: 2px solid var(--neon-blue);
        color: var(--neon-blue);
        box-shadow: 0 0 15px rgba(0, 243, 255, 0.3);
    }
    
    .btn-primary:hover {
        background-color: var(--neon-blue);
        color: var(--darker-bg);
        box-shadow: 0 0 25px rgba(0, 243, 255, 0.7);
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