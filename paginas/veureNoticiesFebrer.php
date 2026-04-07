<?php
// Connectar-se a la base de dades
$db_path = dirname(__DIR__) . '/base_dades/diariLocal.db';


@$db = new SQLite3($db_path);

// Mostra totes les notícies del mes de febrer, endreçades per data 
$resultat = $db->query("SELECT * FROM noticies WHERE not_data LIKE '%-02-%' ORDER BY not_data DESC");

// Mostrar les nòtícies
$count = 0;
while ($noticia = $resultat->fetchArray(SQLITE3_ASSOC)) {
    echo "
    <div class='noticia'>
        <p><strong>ID:</strong> " . htmlspecialchars($noticia['not_id']) . "</p>
        <h3>" . htmlspecialchars($noticia['not_titular']) . "</h3>
        <p><strong>Secció:</strong> " . htmlspecialchars($noticia['not_seccio']) . "</p>
        <p><strong>Data:</strong> " . htmlspecialchars($noticia['not_data']) . "</p>
        <p>" . htmlspecialchars($noticia['not_cos']) . "</p>
    </div>
    ";
    $count++;
}

if ($count === 0) {
    echo "<div class='error'>No hi ha nòtícies de Cultura disponibles.</div>";
}

$db->close();
?>