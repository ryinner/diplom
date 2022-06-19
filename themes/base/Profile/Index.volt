{% if paginator.items|length !== 0 %}
    <div class="grid-row gap-10">
        {% for order in paginator.items %}
            <div class="text-center grid-col-4 order d-flex xy-center" data-order-id="{{ order.id }}">
                <div class="fix">
                    <p class="m-c-6">{{ order.houses.adress }} {{ order.houses.types.type }} (<span class="text-focus">{{ order.houses.statuses.status }}</span>)</p>
                    <p class="m-c-6">{{ order.houses.price }} руб. {% if order.houses.statuses.id == 2 %} в месяц {% endif %}</p>
                    <p class="m-c-6">{{ order.getManager().first_name }} {{ order.getManager().last_name }} <a href="tel:{{ order.getManager().phone }}">{{ order.getManager().phone }}</a></p>
                    <p class="m-c-6 {% if order.status == 5 %}text-success{% elseif order.status == 6 %}text-danger{% endif %}">{{ order.statuses.status }}</p>
                    {% if order.status == 4 %}
                        <deleteorder order="{{order.id}}"></deleteorder>
                    {% endif %}
                </div>
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