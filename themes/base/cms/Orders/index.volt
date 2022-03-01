{% if paginator.items|length !== 0 %}
<table class="width-100">
    <thead>
        <tr>
            <th>
                Клиент
            </th>
            <th>
                Дом
            </th>
            <th>
                Статус
            </th>
            <th>
                Решение
            </th>
        </tr>
    </thead>

    <tbody>
        {% for order in paginator.items %}
            <tr class="text-center">
                <td>
                    {{order.users.first_name}} {{order.users.last_name}}
                </td>
                <td>
                    {{order.houses.adress}}
                </td>
                <td>
                    {{order.status}}
                </td>
                <td>
                    <controll-orders order={{order.id}}></controll-orders>
                </td>
            </tr>
        {% endfor %}
    </tbody>
</table>
{% else %}
<h2>Заявок нет</h2>
{% endif %}
<ul class="pagination">
    {% if paginator.items|length !== 0 %}
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
    {% endif %}

</ul>
