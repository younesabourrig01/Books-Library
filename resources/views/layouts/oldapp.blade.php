<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque en ligne - Accueil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans antialiased">

    <!-- Header -->

@include("partials.header")


    <!-- Main Content -->
@yield("content");


    <!-- Footer -->
@include("partials.footer")


</body>
</html>
