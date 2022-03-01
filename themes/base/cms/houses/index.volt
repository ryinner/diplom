
<div class="d-flex m-c-10">
    <form action="/Cms/Houses/Create"target="_blank">
        <button>Создать</button>
    </form>
</div>    

<table class="width-100">
    <thead>
        <tr>
            <th>
                Ключ
            </th>
            <th>
                Адрес
            </th>
            <th>
                Цена
            </th>
            <th>
                Комнаты
            </th>
            <th>
                Площадь
            </th>
            <th>
                Статус
            </th>
        </tr>
    </thead>

    <tbody>
        {% for house in paginator.items %}
            <tr class="text-center">
                <td>
                    <a href="/Cms/Houses/Edit/{{ house.id }}">{{ house.id }}</a>
                </td>
                <td>
                    {{ house.adress }}
                </td>
                <td>
                    {{ house.price }}
                </td>
                <td>
                    {{ house.rooms }}
                </td>
                <td>
                    {{ house.square }}
                </td>
                <td>
                    {{ house.statuses.status }}
                </td>
            </tr>
        {% endfor %}
    </tbody>
</table>

<ul class="pagination">
    {% if paginator.last != 1 %}
        {% if paginator.current != 1 %}
            <li>
                <a href="/Cms/Houses/Index?page=1">&laquo;</a>
            </li>
        {% endif %}

        {% for i in 1..paginator.last %}
            <li>
                <a {% if i == paginator.current %} class="active" {% endif %} href="/Cms/Houses/Index?page={{ i }}">{{ i }}</a>
            </li>
        {% endfor %}

        {% if paginator.current != paginator.last %}
            <li>
                <a href="/Cms/Houses/Index?page={{ paginator.last }}">&raquo;</a>
            </li>
        {% endif %}
    {% endif %}
</ul>
