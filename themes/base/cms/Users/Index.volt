<table class="width-100">
    <thead>
        <tr>
            <th>
                Логин
            </th>
            <th>
                Емейл
            </th>
            <th>
                Номер
            </th>
            <th>
                Роль
            </th>
        </tr>
    </thead>

    <tbody>
        {% for user in paginator.items %}
            <tr class="text-center">
                <td>
                    {{ user.username }}
                </td>
                <td>
                    {{ user.email }}
                </td>
                <td>
                    {{ user.phone }}
                </td>
                <td>
                    <change-role roles={{ roles }} userrole="{{ user.roles.id }}" userid="{{ user.id }}"></change-role>
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
