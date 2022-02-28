<h2>{{ house.statuses.status }} {{ house.types.type }}, {{ house.square }} кв. м., {{ house.rooms }} {% if house.rooms == 1 %} комната {% elseif house.rooms == 2 OR house.rooms == 3 OR house.rooms == 4 %} комнаты {% else %} комнат{% endif %}</h2>
<h4>{{ house.adress }}</h4>
<div class="m-c-10">
    <slider rawslides={{ images }}></slider>
</div>