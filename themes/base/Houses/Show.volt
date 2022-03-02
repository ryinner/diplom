<h2>{{ house.statuses.status }} {{ house.types.type }}, {{ house.square }} кв. м., {{ house.rooms }} {% if house.rooms == 1 %} комната {% elseif house.rooms == 2 OR house.rooms == 3 OR house.rooms == 4 %} комнаты {% else %} комнат{% endif %}</h2>
<h4>{{ house.adress }}</h4>

<div class="m-c-10">
    <slider rawslides={{ images }}></slider>
</div>

<div class="d-flex space-between wrap-mobile">
    <div class="left width-70 width-mobile-100">
        
        <div class="desription">
            {{ house.description }}
        </div>
    </div>
    
    <div class="contact-house width-30 width-mobile-100 d-flex column text-center">
        <p>{{ house.price }} руб. {% if house.statuses.id == 2 %} в месяц {% endif %}</p>
        <p>Телефон: <a href="tel:{{ house.users.phone }}">{{ house.users.phone }}</a></p>
        <p>Имя менеджера: {{ house.users.first_name }} {{ house.users.last_name }}</p>
        
        <createorder house="{{ house.id }}" user="{% if this.auth.user().id is defined %} {{this.auth.user().id}} {% else %} a {% endif %}" manager="{{ house.users.id }}"></createorder>
    </div>
</div>
