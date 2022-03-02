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
                @input="onlyNumbers"
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
                @input="onlyNumbers"
            />
            <input
                type="text"
                placeholder="Площадь"
                class="input__small m-r-10"
                v-model="square"
                @input="onlyNumbers"
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
                v-model="statuses"
            />
            <label for="sell">Продажа</label>
        </div>

        <div class="form-controll m-c-10">
            <input
                type="radio"
                name="new"
                id="new"
                value="1"
                v-model="isNew"
            />
            <label for="new">Новый</label>
            <input
                type="radio"
                name="new"
                id="old"
                value="0"
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
            <input type="file" multiple ref="fileInput">
            <div class="errors" v-if="imagesError.class">
                <span class="errors__text">{{ imagesError.error }}</span>
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
import Validator from './../../plugins/Validator'

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
            type: 2,
            statuses: 2,
            isNew: 1,
            images: '',

            adressError: { class: false, error: "" },
            priceError: { class: false, error: "" },
            roomsError: { class: false, error: "" },
            squareError: { class: false, error: "" },
            descriptionError: { class: false, error: "" },
            imagesError: {class:false , error: ""},
            valid: "",
        };
    },

    methods: {
        parseData() {
            this.parseFiles()
            this.validData()
            if (this.valid === true) {
                this.sendData();
            }
        },

        sendData() {
            let formData = new FormData;

            for (let i=0; i < this.images.length; i++ ) {
                formData.append('files['+i+']', this.images[i])
            }

            formData.append('adress', this.adress)
            formData.append('price', this.price)
            formData.append('rooms', this.rooms)
            formData.append('square', this.square)
            formData.append('type_id', this.type)
            formData.append('status_id', this.statuses)
            formData.append('is_new', this.isNew)
            formData.append('description', this.description)

            axios
                .post("/Api/Houses/Create", formData, 
                {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    }
                })

                .then((response) => {
                    if (response.data.success === true) {
                        document.location.href = '/Cms/Houses/Index'
                    } else {
                        
                    }
                })

                .catch((error) => {
                    console.log(error);
                });
        },

        validData() {
            this.valid = true;

            this.adressError = { class: false, error: "" }
            this.priceError = { class: false, error: "" }
            this.roomsError = { class: false, error: "" }
            this.squareError = { class: false, error: "" }
            this.descriptionError = { class: false, error: "" }

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

            if (this.description == "<p></p>") {
                this.valid = false;
                this.descriptionError = {
                    class: true,
                    error: "Заполните описание",
                };
            }

            if (this.images.length == 0) {
                this.valid = false;
                this.imagesError = {
                    class: true,
                    error: "Добавьте картинку",
                };
            }
        },

        parseFiles() {
            this.imagesError = { class: false, error: "" }
            this.images = this.$refs.fileInput.files

            for (let i = 0; i < this.images.length; i++) {
                if (this.images[i].type !== 'image/jpeg' && this.images[i].type !== 'image/jpg' && this.images[i].type !== 'image/png') {
                    this.valid = false;
                    this.imagesError = {class:true , error: "Неверное расширение файла " + this.images[i].name}
                }

                if (this.images[i].size > 10485760) {
                    this.valid = false;
                    this.imagesError = {class:true , error: "Слишком большой файл " + this.images[i].name}
                }
            }
        },

        onlyNumbers() {
            this.price = Validator.onlyNumbers(this.price)
            this.rooms = Validator.onlyNumbers(this.rooms)
            this.square = Validator.onlyNumbers(this.square)
        }
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