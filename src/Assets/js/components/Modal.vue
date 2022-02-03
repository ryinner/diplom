<template>
    <div class="modal__background" :class="{modal__active:isActive}">
        <div class="modal__content">
            <div class="modal__tittle d-flex space-beetwen xy-center">
                <h3>{{ tittle }}</h3>
                <div class="pos-relative icon xy-center center" @click="toogle">
                    <span id="x-icon-left" class="x-icon"></span>
                    <span id="x-icon-right" class="x-icon"></span>
                </div>
            </div>
    
            <div class="modal__body">
                <slot></slot>
            </div>

            <div class="modal__footer">
                <button></button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isActive: false,
        }
    },
    props: {
        tittle: {
            type: String,
            required: true,
        }
    },
    methods: {
        toogle() {
            this.isActive = !this.isActive;
        }
    },
}
</script>

<style lang="scss">
    .modal {
        &__background {
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.384);
            position: absolute;
            z-index: 2000;
            // display: none;
        }
        &__content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: #fafafa;
            padding: 16px;
        }
        &__tittle {
            position: relative;
            color: #0f0f0f;
            min-width: 200px;
        }
        &__body {
            color: #0f0f0f;
        }
        &__active {
            display: block;
            transition: 500ms ease all;
        }
    }
    

    .x-icon {
        display: block;
        position: absolute;
        height: 100%;
        width: 2px;
        background: #000;
        cursor: pointer;
        margin-bottom: -8px;
    }

    #x-icon-left {
        transform: rotate(45deg);
    }

    #x-icon-right {
        transform: rotate(-45deg);
    }
</style>