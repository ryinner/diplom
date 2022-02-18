<template>
    <div class="modal__background" :class="{modal__active:isActive}">
        <div class="modal__content">
            <div class="modal__tittle d-flex space-between xy-center border-2px">
                <h3>{{ tittle }}</h3>
                <div class="pos-relative icon xy-center center" @click="toogleModal">
                    <span id="x-icon-left" class="x-icon"></span>
                    <span id="x-icon-right" class="x-icon"></span>
                </div>
            </div>
    
            <div class="modal__body">
                <slot></slot>
            </div>

            <div class="modal__footer d-flex space-between">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        tittle: {
            type: String,
            required: true,
        },
        isActive: {
            type: Boolean,
            required: true,
        }
    },
    methods: {
        toogleModal() {
            this.$parent.toogleModal()
        }
    }
}
</script>

<style lang="scss">
    .modal {
        &__background {
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.384);
            position: fixed;
            z-index: 2000;
            display: none;
        }

        &__content {
            top: 50%;
            left: 50%;
            padding: 16px;
            min-width: 40%;
            position: absolute;
            border-radius: 2px;
            transform: translate(-50%,-50%);
            background-color: var(--background-color);
        }

        &__tittle {
            position: relative;
            color: var(--text-color);
            min-width: 200px;
        }

        &__body {
            color: var(--text-color);
        }

        &__active {
            display: block;
            transition: 500ms ease all;
        }
    }
</style>