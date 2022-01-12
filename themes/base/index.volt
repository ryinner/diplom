<!DOCTYPE html>
<!-- Переделать на куку -->
<html lang="ru" data-theme-style="master">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtor</title>
    {{ assets.outputJs('main_js') }}
    {{ assets.outputCss('main_css') }}
</head>
<body id="app">
    {{ content() }}
</body>
</html>