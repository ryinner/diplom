<template>
    <div class="modal__bacground">
        <div class="modal__content">
            <div class="modal__tittle">
                {{ title }}

                <span id="x-icon-left" class="x-icon"></span>
                <span id="x-icon-right" class="x-icon"></span>
            </div>

            <div class="modal__body">
                <slot></slot>
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
    methods: {
        toogle() {
            this.isActive = !this.isActive;
        }
    },
}
</script>

<style lang="css">
    .modal__bacground {
        width: 100%;
        height: 100%;
        opacity: 0.6;
        background-color: #000;
    }

    .modal__title {
        background-color: #fafafa;
    }

    .x-icon {
        display: block;
        width: 2px;
        background: #000;
    }

    #x-icon-left {
        transform: rotate(45deg);
    }

    #x-icon-right {
        transform: rotate(-45deg);
    }

    .modal__body {
        
    }
</style>