<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio IntroducciÃ³n</title>
</head>
<style>
    form, label{
        display:block;
    }
</style>
<body>
    <?php
    // Definir las constantes
    define('EUR_PTA', 166.386);
    define('PTA_EUR', 1/166.386);
    ?>

    <h1>Conversor de Monedas</h1>

    <p>Valor de la constante "EurPta": <?php echo EUR_PTA; ?></p>
    <p>Valor de la constante "PtaEur": <?php echo PTA_EUR; ?></p>

    <form method="post">
        <fieldset>
            <legend>Conversor de Monedas</legend>
            <label for="amount">Introduce la cantidad:</label>
            <input type="number" name="amount">
            <button type="submit" name="convert" value="pesetas">Convertir a Pesetas</button>
            <button type="submit" name="convert" value="euros">Convertir a Euros</button>
        </fieldset>
    </form>

    <?php
    // Comprobar si se envia el formulario
    if (isset($_POST['convert'])) {//La función isset() comprueba si una variable está declarada, lo que significa que debe declararse y no es NULL.
        $amount = floatval($_POST['amount']);//floatval devuelve el valor en número de una variable
        if (!is_nan($amount)) {//La función is_nan() comprueba si un valor "no es un número"
            if ($_POST['convert'] === "pesetas") {
                $pesetas = convertirEuroPta($amount);
                echo "En pesetas: $pesetas";
            } elseif ($_POST['convert'] === "euros") {
                $euros = convertirPtaEuro($amount);
                echo "En euros: $euros";
            }
        } else {
            echo "Por favor, ingrese una cantidad vÃ¡lida.";
        }
    }
    // Funciones para convertir euros a pesetas y viceversa
    function convertirEuroPta($cantidadEuros) {
        return $cantidadEuros * EUR_PTA;
    }

    function convertirPtaEuro($cantidadPesetas) {
        return $cantidadPesetas * PTA_EUR;
    }
    ?>
</body>
</html>
