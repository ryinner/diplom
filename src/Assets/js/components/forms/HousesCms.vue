<template>
<div class="column">
    <h3>Добавить жилплощадь</h3>

    <div class="form-controll m-c-10">
        <input type="text" class="width-60" placeholder="Формат адреса: ул. Улица, д. 1">
    </div>

    <div class="form-controll m-c-10">
        <input type="text" class="width-60" placeholder="Введите цену">
    </div>

    <div class="form-controll m-c-10">
        <input type="text" placeholder="Комнаты" class="input__small">
        <input type="text" placeholder="Площадь" class="input__small">
    </div>

    <div class="form-controll m-c-10">
        <input type="radio" name="type" id="house" value="2">
        <label for="house">Дом</label>
        
        <input type="radio" name="type" id="apartment" value="1">
        <label for="apartment">Квартира</label>
    </div>

    <div class="form-controll m-c-10">
        <input type="radio" name="status" id="rent" value="2">
        <label for="rent">В аренду</label>
        <input type="radio" name="status" id="sell" value="1">
        <label for="sell">Продажа</label>
    </div>

    <div class="form-controll m-c-10">
        <input type="radio" name="new" id="new" value="true">
        <label for="new">Новый</label>
        <input type="radio" name="new" id="old" value="false">
        <label for="old">Старый</label>
    </div>

    <div class="form-controll m-c-10">
        <div class="width-60">
            <h3>Описание</h3>
            <tiptap v-model="description" />
        </div>
    </div>

    <div class="form-controll m-c-10">
        <button @click.prevent="parseData">Создать</button>
    </div>
</div>

</template>

<script>
import Tiptap from './../Tiptap.vue'

export default {
    components: {
        Tiptap
    },

    data() {
        return {
            description: ''
        }
    },

    methods: {
        parseData() {
            
        }
    }
}
</script>

<style lang="scss">

</style>