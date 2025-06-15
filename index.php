<?php
// Llamada a la API
$apiUrl = "http://localhost:3000/quote/today"; // Cambia esto si tu API está en otro host
$response = file_get_contents($apiUrl);
$quoteData = json_decode($response, true);

// Valores por defecto si la API falla
$quote = $quoteData['Quote'] ?? "No se pudo obtener la cita.";
$author = $quoteData['Author'] ?? "";
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cita del Día</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: #fff;
      background: linear-gradient(135deg, #A9746E, #5C4033); /* Mocha Mousse degradado */
    }

    .quote-box {
      max-width: 800px;
      padding: 2rem;
      background-color: rgba(0, 0, 0, 0.4);
      border-radius: 12px;
      text-align: center;
    }

    .quote {
      font-size: 1.8rem;
      font-weight: 500;
      margin-bottom: 1rem;
    }

    .author {
      font-size: 1.2rem;
      font-style: italic;
    }

    @media (prefers-reduced-motion: reduce) {
      * {
        animation: none !important;
        transition: none !important;
      }
    }
  </style>
</head>
<body>
  <div class="quote-box" role="region" aria-label="Cita del día">
    <div class="quote">“<?= htmlspecialchars($quote) ?>”</div>
    <div class="author">— <?= htmlspecialchars($author) ?></div>
  </div>
</body>
</html>
