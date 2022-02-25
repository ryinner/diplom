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
                    {{ house.statuses.status }} {{ house.types.type }} {{ house.square }} кв. м.
                </h4>
                <div class="adress">
                    {{ house.adress }}
                </div>
                <div class="price">
                    {{ house.price }} руб.
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