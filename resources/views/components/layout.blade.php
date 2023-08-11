<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>The Aulab Post</title>

    <link rel="icon" type="image/x-icon" href="https://th.bing.com/th/id/OIP.CHluVEdMXQd1FfDf7X8VxQHaHa?w=185&h=185&c=7&r=0&o=5&dpr=1.5&pid=1.7">

</head>

<body>
    <x-navbar />

    <div class='min-vh-100'>
        {{$slot}}
    </div>
    
</body>
</html>