<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SAHLA MAHLA</title>
</head>

<body>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="card-title text-danger">
                    Compte suspendu
                </div>

            </div>
            <div class="card-body">
                <h3>Votre Compte a été Suspendu</h3>
                <p>
                    Nous sommes désolés de vous informer M./Mme {{ucwords($user->name)}} , que votre compte a été
                    suspendu en raison
                    de votre comportement, puisque vous avez atteint 10 signalements, de la part de prestataires de
                    services.
                    En conséquence, vous ne pouvez plus utiliser nos services
                </p>
            </div>
        </div>
    </div>
</body>

</html>