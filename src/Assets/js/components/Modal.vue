<template>
    <div class="modal__bacground">
        <div class="modal__tittle">
            {{ title }}
        </div>

        <div class="modal__content">
            <slot></slot>
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

<style>

</style>