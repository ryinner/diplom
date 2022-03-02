{% if paginator.items|length !== 0 %}
    <div class="row">
        {% for order in paginator.items %}
            <div class="text-center order" data-order-id="{{ order.id }}">
                <p>{{ order.houses.adress }} {{ order.houses.types.type }} {{ order.houses.statuses.status }}</p>
                <p>{{ order.houses.price }} руб. {% if order.houses.statuses.id == 2 %} в месяц {% endif %}</p>
                <p>{{ order.getManager().first_name }} {{ order.getManager().last_name }} <a href="tel:{{ order.getManager().phone }}">{{ order.getManager().phone }}</a></p>
                <p>{{ order.status }}</p>
                {% if order.status == "В работе" %}
                    <deleteorder order="{{order.id}}"></deleteorder>
                {% endif %}
            </div>
        {% endfor %}
    </div>
{% endif %}

<div class="m-c-10">
    <theme-change></theme-change>
</div>

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