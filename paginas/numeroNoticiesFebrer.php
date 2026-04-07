<?php
// Connectar-se a la base de dades
$db_path = dirname(__DIR__) . '/base_dades/diariLocal.db';

if (!file_exists($db_path)) {
    echo "<div class='error'>No s'ha trobat la base de dades.</div>";
    exit;
}

$db = new SQLite3($db_path);

// Comptar les notícies del mes de febrer
$resultat = $db->query("SELECT COUNT(*) AS total FROM noticies WHERE not_data LIKE '%-02-%'");

$total = 0;
if ($resultat) {
    $fila = $resultat->fetchArray(SQLITE3_ASSOC);
    if ($fila) {
        $total = (int)$fila['total'];
    }
}

echo "<div class='noticia'>
    <p><strong>El número de notícies de febrer és:</strong> " . htmlspecialchars($total) . "</p>
</div>";

$db->close();
?>