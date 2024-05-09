<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Picas y fijas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

</head>
<body>

    <div class="px-4 py-5 my-5 text-center">
        <p>
            El juego de Picas y Fijas es un juego de adivinanza en el que el sistema genera un número secreto de cuatro dígitos. El objetivo del jugador es adivinar este número secreto. En cada intento, el jugador proporciona un número de cuatro dígitos y el sistema le indica cuántas "picas" y cuántas "fijas" tiene el número ingresado.
            Una "pica" indica que un dígito del número ingresado existe en el número secreto, pero está en una posición incorrecta. Una "fija" indica que un dígito del número ingresado existe en el número secreto y está en la posición correcta.
            Por ejemplo, si el número secreto es 1234 y el jugador ingresa 2031, el sistema debería indicar que hay 2 picas (los dígitos 2 y 0 están en el número secreto, pero en posiciones incorrectas) y 1 fija (el dígito 1 está en la posición correcta).
            El juego continúa hasta que el jugador adivina el número secreto (es decir, hasta que el número ingresado tenga 4 "fijas") 
        </p>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="text" name="numero" id="numero" placeholder="Ingrese número" class="form-control"><br>
            <input type="submit" value="Validar" class="btn btn-success">
        </form><br>


<?php
session_start();

// Verificar si ya existe un número secreto
if (!isset($_SESSION['numeroSecreto'])) {
    $_SESSION['numeroSecreto'] = strval(rand(1000, 9999));
}

// Obtener el número secreto
$numeroSecreto = $_SESSION['numeroSecreto'];
// $numeroSecreto = '1111';

// echo 'numero secreto '. $numeroSecreto;

// Si se envía un número
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $numeroJugador = $_POST['numero'];

    $picas = 0;
    $fijas = 0;

    // Comparar el número aleatorio con el ingresado
    for ($i = 0; $i < 4; $i++) {
        $digitoSecreto = $numeroSecreto[$i];
        $digitoJugador = $numeroJugador[$i];

        if ($digitoSecreto == $digitoJugador) {
            $fijas++;
        } elseif (strpos($numeroSecreto, $digitoJugador) != false) {
            $picas++;
        }
    }
    ?>

        <h3>Picas: <?php echo $picas; ?></h3>
        <h3>Fijas: <?php echo $fijas; ?></h3>

    <?php
    if ($fijas == 4) {
    ?>
        <div class="alert alert-success" role="alert">¡¡Se adivinó el número!!</div>

    <?php
        // Reinicia número aleatorio
        unset($_SESSION['numeroSecreto']);
        exit();
    }
}
?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>