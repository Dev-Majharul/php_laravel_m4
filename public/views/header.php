<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Vehicle Listing App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <style>
        :root {
            --neon-blue: #00f3ff;
            --neon-pink: #ff00ff;
            --neon-yellow: #ffff00;
            --neon-green: #39ff14;
            --dark-bg: #0a0a0f;
            --darker-bg: #050507;
            --card-bg: #12121a;
            --text-color: #e0e0e0;
            --text-secondary: #a0a0a0;
        }
        
        body {
            background-color: var(--dark-bg);
            font-family: 'Share Tech Mono', monospace;
            color: var(--text-color);
            background-image: 
                linear-gradient(rgba(10, 10, 15, 0.9), rgba(10, 10, 15, 0.9)),
                url('https://images.unsplash.com/photo-1550751827-4bd374c3f58b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            min-height: 100vh;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            letter-spacing: 1px;
        }
        
        .card {
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 243, 255, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 25px;
            border: 1px solid rgba(0, 243, 255, 0.2);
            background-color: var(--card-bg);
        }
        
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 25px rgba(0, 243, 255, 0.5);
        }
        
        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid rgba(0, 243, 255, 0.3);
        }
        
        .card-body {
            padding: 1.5rem;
            background: linear-gradient(to bottom, var(--card-bg), var(--darker-bg));
        }
        
        .card-title {
            font-weight: 700;
            color: var(--neon-blue);
            margin-bottom: 0.75rem;
            text-shadow: 0 0 5px rgba(0, 243, 255, 0.5);
        }
        
        .card-text {
            color: var(--text-secondary);
            margin-bottom: 0.5rem;
        }
        
        .btn-primary {
            background-color: transparent;
            border: 1px solid var(--neon-blue);
            color: var(--neon-blue);
            border-radius: 3px;
            padding: 0.5rem 1.2rem;
            font-weight: 500;
            transition: all 0.3s ease;
            text-shadow: 0 0 5px rgba(0, 243, 255, 0.5);
            box-shadow: 0 0 10px rgba(0, 243, 255, 0.2);
        }
        
        .btn-primary:hover {
            background-color: var(--neon-blue);
            color: var(--darker-bg);
            box-shadow: 0 0 15px rgba(0, 243, 255, 0.7);
        }
        
        .btn-danger {
            background-color: transparent;
            border: 1px solid var(--neon-pink);
            color: var(--neon-pink);
            border-radius: 3px;
            padding: 0.5rem 1.2rem;
            font-weight: 500;
            transition: all 0.3s ease;
            text-shadow: 0 0 5px rgba(255, 0, 255, 0.5);
            box-shadow: 0 0 10px rgba(255, 0, 255, 0.2);
        }
        
        .btn-danger:hover {
            background-color: var(--neon-pink);
            color: var(--darker-bg);
            box-shadow: 0 0 15px rgba(255, 0, 255, 0.7);
        }
        
        .btn-success {
            background-color: transparent;
            border: 1px solid var(--neon-green);
            color: var(--neon-green);
            border-radius: 3px;
            padding: 0.5rem 1.2rem;
            font-weight: 500;
            transition: all 0.3s ease;
            text-shadow: 0 0 5px rgba(57, 255, 20, 0.5);
            box-shadow: 0 0 10px rgba(57, 255, 20, 0.2);
        }
        
        .btn-success:hover {
            background-color: var(--neon-green);
            color: var(--darker-bg);
            box-shadow: 0 0 15px rgba(57, 255, 20, 0.7);
        }
        
        .btn-secondary {
            background-color: transparent;
            border: 1px solid var(--neon-yellow);
            color: var(--neon-yellow);
            border-radius: 3px;
            padding: 0.5rem 1.2rem;
            font-weight: 500;
            transition: all 0.3s ease;
            text-shadow: 0 0 5px rgba(255, 255, 0, 0.5);
            box-shadow: 0 0 10px rgba(255, 255, 0, 0.2);
        }
        
        .btn-secondary:hover {
            background-color: var(--neon-yellow);
            color: var(--darker-bg);
            box-shadow: 0 0 15px rgba(255, 255, 0, 0.7);
        }
        
        .floating-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: transparent;
            color: var(--neon-green);
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 0 20px rgba(57, 255, 20, 0.4);
            transition: all 0.3s ease;
            z-index: 1000;
            text-decoration: none;
            border: 1px solid var(--neon-green);
        }
        
        .floating-btn:hover {
            transform: scale(1.1);
            background-color: var(--neon-green);
            color: var(--darker-bg);
            box-shadow: 0 0 30px rgba(57, 255, 20, 0.7);
        }
        
        .floating-btn i {
            font-size: 24px;
        }
        
        .page-title {
            color: var(--neon-blue);
            font-weight: 900;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
            text-shadow: 0 0 10px rgba(0, 243, 255, 0.7);
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        
        .page-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100px;
            height: 3px;
            background: linear-gradient(to right, var(--neon-blue), transparent);
            box-shadow: 0 0 10px rgba(0, 243, 255, 0.7);
        }
        
        .form-control {
            border-radius: 3px;
            padding: 0.75rem 1rem;
            border: 1px solid rgba(0, 243, 255, 0.3);
            background-color: rgba(18, 18, 26, 0.8);
            color: var(--text-color);
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: var(--neon-blue);
            box-shadow: 0 0 10px rgba(0, 243, 255, 0.3);
            background-color: rgba(18, 18, 26, 0.9);
            color: var(--text-color);
        }
        
        .form-label {
            font-weight: 500;
            color: var(--neon-blue);
            margin-bottom: 0.5rem;
            text-shadow: 0 0 5px rgba(0, 243, 255, 0.3);
        }
        
        .container {
            padding-bottom: 80px;
        }
        
        .alert-danger {
            background-color: rgba(255, 0, 0, 0.1);
            border: 1px solid var(--neon-pink);
            color: var(--neon-pink);
            border-radius: 3px;
            box-shadow: 0 0 10px rgba(255, 0, 255, 0.2);
        }
        
        .shadow-sm {
            box-shadow: 0 0 15px rgba(0, 243, 255, 0.2);
        }
        
        /* Cyberpunk grid lines */
        .container::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(0, 243, 255, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 243, 255, 0.05) 1px, transparent 1px);
            background-size: 30px 30px;
            pointer-events: none;
            z-index: -1;
        }
        
        /* Cyberpunk scanline effect */
        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: repeating-linear-gradient(
                0deg,
                rgba(0, 0, 0, 0.1),
                rgba(0, 0, 0, 0.1) 1px,
                transparent 1px,
                transparent 2px
            );
            pointer-events: none;
            z-index: 1;
        }
    </style>
</head>
<body>

