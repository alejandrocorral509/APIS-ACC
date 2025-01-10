<?php
$url = "https://randomuser.me/api/?results=10"; 
$response = file_get_contents($url); 

if ($response !== false) {
    $data = json_decode($response, true);
    $usuarios = $data['results']; 
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Usuarios</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
            }
            th {
                background-color: #f4f4f4;
                text-align: left;
            }
        </style>
    </head>
    <body>
        <h1>Lista de Usuarios</h1>
        <table>
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Género</th>
                    <th>País</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><img src="<?php echo htmlspecialchars($usuario['picture']['thumbnail']); ?>" alt="Foto"></td>
                        <td><?php echo htmlspecialchars($usuario['name']['first'] . ' ' . $usuario['name']['last']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['gender']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['location']['country']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
    </html>
    <?php
} else {
    echo "No se pudo obtener información.";
}
?>










