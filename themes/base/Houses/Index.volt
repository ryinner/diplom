<div class="row">
    {% for house in paginator.items %}
        <div class="item m-c-10">
            <a href="/Houses/Show/{{ house.id }}">
                <div class="width-100">
                    {% for image in house.images %}
                        <img src="/img/houses/{{ image.path }}">
                        {% break %}
                    {% endfor %}
                </div>
                <h4>
                    {{ house.statuses.status }} {{ house.types.type }}, {{ house.square }} кв. м., {{ house.rooms }} {% if house.rooms == 1 %} комната {% elseif ((house.rooms == 2) OR (house.rooms == 3) OR ( house.rooms == 4)) %} комнаты {% else %} комнат{% endif %}
                </h4>
                <div class="adress">
                    {{ house.adress }}
                </div>
                <div class="price">
                    {{ house.price }} руб. {% if house.statuses.id == 2 == 2 %} в месяц {% endif %}
                </div>
            </a>
        </div>
    {% endfor %}
</div>

<ul class="pagination">
    {% if paginator.last != 1 %}
        {% if paginator.current != 1 %}
            <li>
                <a href="/Houses/Index?page=1">&laquo;</a>
            </li>
        {% endif %}

        {% for i in 1..paginator.last %}
            <li>
                <a {% if i == paginator.current %} class="active" {% endif %} href="/Houses/Index?page={{ i }}">{{ i }}</a>
            </li>
        {% endfor %}

        {% if paginator.current != paginator.last %}
            <li>
                <a href="/Houses/Index?page={{ paginator.last }}">&raquo;</a>
            </li>
        {% endif %}
    {% endif %}
</ul>