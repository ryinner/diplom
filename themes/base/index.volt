<!DOCTYPE html>
<!-- Переделать на куку data-theme-style -->
<html lang="ru" data-theme-style="{% if this.cookies.get('theme') == 'dark' %}dark{% else %}master{% endif %}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/logo/logo_dark.svg">
    <title>Realtor</title>
    {{ assets.outputJs('main_js') }}
    {{ assets.outputCss('main_css') }}
</head>
<body id="app">
    {{ content() }}
</body>
</html>