{% set navLinks = [
    'Квартиры' : '/',
    'Подать заявление' : '/order',
    'Помощь' : '/help',
    'Контакты' : '/contact'] 
%}
<!-- <div class="upheader">
    <span></span>
    <span></span>
</div> -->
<header>
    <div class="content">
        <nav>
            <div class="left">
                <ul>
                    <li>
                        <div class="logo">
                            <img src="img/logo/logo.svg" alt="Риелтор">
                            <span>Риелтор</span>
                        </div>
                    </li>
                    {% for key, value in navLinks %}
                        <li>
                            {{ link_to(value, 'class':'nav-link', key) }}
                        </li>
                    {% endfor %}
                </ul>
            </div>
            <div class="right">
                <ul>
                    <li>
                        {{ link_to('/', 'class':'nav-link', 'Войти') }}
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<div class="content">
    {{ content() }}
</div>

<footer>
    <div class="content">
        
    </div>
</footer>