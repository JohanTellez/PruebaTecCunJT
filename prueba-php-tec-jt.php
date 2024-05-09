<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba técnica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="px-4 py-5 my-5 text-center">
        <h2>Punto 1</h2>
        <p>Si tenemos un string str = '1,2,3,4,5,6,7’; ¿cómo podemos obtener la suma de los enteros que contiene?</p>

<?php
$str = '1,2,3,4,5,6,7';
?>

        <div class="card">
            <div class="card-body">
                <h3>La cadena es: <?php echo $str ?></h3>
            
<?php
// Divide los números de la cadena 
$numeros = explode(',', $str);

$suma = 0;

foreach ($numeros as $numero) {
    $suma += (int)$numero;
}
?>

                <h3>La suma de los números de la cadena es: <?php echo $suma; ?></h3>
            </div>
        </div>
        <hr>


        <h2>Punto 2</h2>
        <p>Dado un string s y un número entero n, encuentra todas las subcadenas de s de longitud n que contengan al menos una letra mayúscula y al menos una letra minúscula. 
            Por ejemplo, para el string "HelloWorld" y n=3, las subcadenas válidas serían "Hel", "ell", "llo", "loW", y "oWo". La subcadena "Wor" no es válida ya que no contiene una letra minúscula.
        </p>
        <div class="card">
            <div class="card-body">

<?php
function obtenerSubcadenas($s, $n) {
    $subcadenasValidas = array();

    // Recorre las subcadenas de $n
    for ($i = 0; $i <= strlen($s) - $n; $i++) {
        $subcadena = substr($s, $i, $n);
        
        // Verifica la subcadena si tiene al menos una mayúscula y una minúscula
        if (preg_match('/[A-Z]/', $subcadena) && preg_match('/[a-z]/', $subcadena)) {
            $subcadenasValidas[] = $subcadena;
        }
    }

    return $subcadenasValidas;
}

$s = "HelloWorld";
$n = 3;
$subcadenasValidas = obtenerSubcadenas($s, $n);

?>
                <h3>Las subcadenas de longitud <?php echo $n; ?> en  <?php echo $s; ?> son las siguientes:</h3>
<?php
foreach ($subcadenasValidas as $subcadena) {
?>
            <h4><?php echo $subcadena; ?>, </h4>
<?php
}
?>
            </div>
        </div>
        <hr>


        <h2>Punto 3</h2>
        <p>¿Cómo consumirías un servicio de tipo REST en PHP o C#?</p>
        <div class="card">
            <div class="card-body">
<?php
// Pokeapi
$baseUrl = 'https://pokeapi.co/api/v2/';

// Nombre del pokemon
$pokemon = 'pikachu';

// Construir url para el pokem´pn
$url = $baseUrl . 'pokemon/' . $pokemon;

// Inicializa curl
$curl = curl_init($url);

// Regresar respuesta de curl como cadena
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Realiza solicitud http
$response = curl_exec($curl);

// Comprobar si hubo algún error
if ($response === false) {
    $error = curl_error($curl);
    echo "Error al realizar la solicitud: $error";
} else {
    $decodificaPokemon = json_decode($response, true);
?>
                <h3>Nombre: <?php echo $decodificaPokemon['name']; ?></h3>
                <h3>Peso: <?php echo $decodificaPokemon['weight']; ?></h3>
                <h3>Altura: <?php echo $decodificaPokemon['height']; ?></h3>
<?php
}

// Cerrar curl
curl_close($curl);
?>
            </div>
        </div>
        <hr>

        <h2>Punto 5</h2>
        <p>Que función convierte una cadena en mayúsculas en C# o PHP.</p>
        <div class="card">
            <div class="card-body">
<?php
$cadena = "hola mundo";
$cadenaMayusculas = strtoupper($cadena);
?>
                <h3>Cadena original: <?php echo $cadena; ?></h3>
                <h3>Cadena convertida: <?php echo $cadenaMayusculas; ?></h3>
            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>