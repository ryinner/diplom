<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtor</title>
    {{ assets.outputCss('css') }}
</head>
<body>
    {{ content() }}
    {{ assets.outputJs('js') }}
</body>
</html>