<table class="width-100">
    <thead>
        <tr>
            <th>
                Телефон
            </th>
            <th>
                Имя
            </th>
            <th>
                Проблема
            </th>
            <th>
                Статус
            </th>
        </tr>
    </thead>

    <tbody>
        {% for request in paginator.items %}
            <tr class="text-center">
                <td>
                    <a href="tel:{{ request.phone }}"></a>{{ request.phone }}</a>
                </td>
                <td>
                    {{ request.name }}
                </td>
                <td>
                    {{ request.problem }}
                </td>
                <td>
                    {% if request.status == 1 %}
                        Завершено
                    {% else %}
                        Ожидает
                    {% endif %}
                </td>
            </tr>
        {% endfor %}
    </tbody>
</table>

<ul class="pagination">
    {% if paginator.last != 1 %}
        {% if paginator.current != 1 %}
            <li>
                <a href="/Cms/Requests/Index?page=1">&laquo;</a>
            </li>
        {% endif %}

        {% for i in 1..paginator.last %}
            <li>
                <a {% if i == paginator.current %} class="active" {% endif %} href="/Cms/Requests/Index?page={{ i }}">{{ i }}</a>
            </li>
        {% endfor %}

        {% if paginator.current != paginator.last %}
            <li>
                <a href="/Cms/Requests/Index?page={{ paginator.last }}">&raquo;</a>
            </li>
        {% endif %}
    {% endif %}
</ul>