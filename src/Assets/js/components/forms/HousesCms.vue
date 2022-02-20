<template>
    <div class="column">
        <h2>Добавить жилплощадь</h2>

        <div class="form-controll m-c-10">
            <input
                type="text"
                class="width-60"
                placeholder="Формат адреса: ул. Улица, д. 1"
                v-model="adress"
            />
            <div class="errors" v-if="adressError.class">
                <span class="errors__text">{{ adressError.error }}</span>
            </div>
        </div>

        <div class="form-controll m-c-10">
            <input
                type="text"
                class="width-60"
                placeholder="Введите цену"
                v-model="price"
            />
            <div class="errors" v-if="priceError.class">
                <span class="errors__text">{{ priceError.error }}</span>
            </div>
        </div>

        <div class="form-controll m-c-10">
            <input
                type="text"
                placeholder="Комнаты"
                class="input__small"
                v-model="rooms"
            />
            <input
                type="text"
                placeholder="Площадь"
                class="input__small m-r-10"
                v-model="square"
            />
            <div class="errors" v-if="roomsError.class">
                <span class="errors__text">{{ roomsError.error }}</span>
            </div>
            <div class="errors" v-if="squareError.class">
                <span class="errors__text">{{ squareError.error }}</span>
            </div>
        </div>

        <div class="form-controll m-c-10">
            <input
                type="radio"
                name="type"
                id="house"
                value="2"
                v-model="type"
            />
            <label for="house">Дом</label>

            <input
                type="radio"
                name="type"
                id="apartment"
                value="1"
                checked
                v-model="type"
            />
            <label for="apartment">Квартира</label>
        </div>

        <div class="form-controll m-c-10">
            <input
                type="radio"
                name="status"
                id="rent"
                value="2"
                v-model="statuses"
            />
            <label for="rent">В аренду</label>
            <input
                type="radio"
                name="status"
                id="sell"
                value="1"
                checked
                v-model="statuses"
            />
            <label for="sell">Продажа</label>
        </div>

        <div class="form-controll m-c-10">
            <input
                type="radio"
                name="new"
                id="new"
                value="true"
                v-model="isNew"
            />
            <label for="new">Новый</label>
            <input
                type="radio"
                name="new"
                id="old"
                value="false"
                checked
                v-model="isNew"
            />
            <label for="old">Старый</label>
        </div>

        <div class="form-controll m-c-10">
            <h3>Описание</h3>
            <tiptap v-model="description" />
            <div class="errors" v-if="descriptionError.class">
                <span class="errors__text">{{ descriptionError.error }}</span>
            </div>
        </div>

        <div class="form-controll m-c-10">
            <button @click.prevent="parseData">Создать</button>
        </div>
    </div>
</template>

<script>
import Tiptap from "./../Tiptap.vue";
import axios from "axios";

export default {
    components: {
        Tiptap,
    },

    data() {
        return {
            description: "",
            adress: "",
            price: "",
            rooms: "",
            square: "",
            type: "",
            statuses: "",
            isNew: "",

            adressError: { class: false, error: "" },
            priceError: { class: false, error: "" },
            roomsError: { class: false, error: "" },
            squareError: { class: false, error: "" },
            descriptionError: { class: false, error: "" },
            valid: "",
        };
    },

    methods: {
        parseData() {
            this.validData();
            if (this.valid === true) {
                this.sendData();
            }
        },

        sendData() {
            axios
                .post("/Api/Houses/Create", {
                    adress: this.adress,
                    price: this.price,
                    rooms: this.rooms,
                    square: this.square,
                    type: this.type,
                    status: this.statuses,
                    isNew: this.isNew,
                    description: this.description,
                })
                .then((response) => {
                    if (response.data.success === true) {
                        document.location.href = '/Cms/Houses/Edit/' + response.data.id
                    } else {
                        
                    }
                })

                .catch((error) => {
                    console.log(error);
                });
        },

        validData() {
            this.valid = true;
            if (this.adress == "") {
                this.valid = false;
                this.adressError = { class: true, error: "Заполните адрес" };
            }

            if (this.price == "") {
                this.valid = false;
                this.priceError = { class: true, error: "Заполните цену" };
            }

            if (this.rooms == "") {
                this.valid = false;
                this.roomsError = {
                    class: true,
                    error: "Заполните количество комнат",
                };
            }

            if (this.square == "") {
                this.valid = false;
                this.squareError = { class: true, error: "Заполните площадь" };
            }

            if (this.description == "") {
                this.valid = false;
                this.descriptionError = {
                    class: true,
                    error: "Заполните описание",
                };
            }
        },
    },
};
</script>

<style lang="scss">
.errors {
    &__text {
        color: var(--red);
    }

    &__input {
        border: 2px solid var(--red) !important;
    }
}
</style>