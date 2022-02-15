<template>
<div class="column">
    <h3>Добавить жилплощадь</h3>

    <div class="form-controll m-c-10">
        <input type="text" class="width-60" placeholder="Введите адрес">
    </div>

    <div class="form-controll m-c-10">
        <input type="text" class="width-60" placeholder="Введите цену">
    </div>

    <div class="form-controll m-c-10">
        <input type="text" placeholder="Комнаты" class="input__small">
        <input type="text" placeholder="Площадь" class="input__small">
    </div>

    <div class="form-controll m-c-10">
        <input type="radio" name="type" id="house">
        <label for="house">Дом</label>
        
        <input type="radio" name="type" id="apartment">
        <label for="apartment">Квартира</label>
    </div>

    <div class="form-controll m-c-10">
        <input type="radio" name="status" id="rent">
        <label for="rent">В аренду</label>
        <input type="radio" name="status" id="sell">
        <label for="sell">Продажа</label>
    </div>

    <div class="form-controll m-c-10">
        <input type="radio" name="new" id="new">
        <label for="new">Новый</label>
        <input type="radio" name="new" id="old">
        <label for="old">Старый</label>
    </div>

    <div class="form-controll m-c-10">
        <textarea class="width-60 textarea__big" placeholder="Описание"></textarea>
    </div>
</div>

</template>

<script>
export default {

}
</script>

<style lang="scss">

</style>