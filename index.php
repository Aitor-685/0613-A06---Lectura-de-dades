<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diari Local - Nòtícies</title>
    <link rel="stylesheet" href="style/estilo.css">
</head>
<body>
    <div class="container">
        <h1>Diari Local - Nòtícies</h1>
        
        <div class="menu">
            <a href="?pagina=totes" <?php echo (!isset($_GET['pagina']) || $_GET['pagina'] === 'totes') ? 'class="active"' : ''; ?>>Totes les nòtícies</a>
            <a href="?pagina=cultura" <?php echo (isset($_GET['pagina']) && $_GET['pagina'] === 'cultura') ? 'class="active"' : ''; ?>>Cultura</a>
            <a href="?pagina=febrer" <?php echo (isset($_GET['pagina']) && $_GET['pagina'] === 'febrer') ? 'class="active"' : ''; ?>>Febrer</a>
            <a href="?pagina=numero-febrer" <?php echo (isset($_GET['pagina']) && $_GET['pagina'] === 'numero-febrer') ? 'class="active"' : ''; ?>>Número de notícies de Febrer</a>
        </div>
        
        <div class="content">
            <?php
            $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 'totes';
            $archivo = '';
            
            switch($pagina) {
                case 'cultura':
                    $archivo = 'paginas/veureNoticiesCultura.php';
                    break;
                case 'totes':
                default:
                    $archivo = 'paginas/veureTotesLesNoticies.php';
                    break;
                case 'febrer':
                    $archivo = 'paginas/veureNoticiesFebrer.php';
                    break;
                case 'numero-febrer':
                    $archivo = 'paginas/numeroNoticiesFebrer.php';
                    break;
            }
            
            if (file_exists($archivo)) {
                include $archivo;
            } else {
                echo "<div class='error'>Error: No es pot trobar el fitxer " . htmlspecialchars($archivo) . "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>
