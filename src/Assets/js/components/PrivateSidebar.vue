<template>
    <div class="left-bar width-20">
        <div class="logo d-flex space-around">
            <div class="left"><a href="/cms/index/index"><h2>CMS</h2></a></div>
            <div class="right xy-center width-10">
                <img src="/img/helpers/burger-menu.svg">
            </div>
        </div>
        <div class="navs">
            <ul>
                <li>

                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            
        }
    }
}
</script>

<style lang="scss">
    .left-bar {
        height: 100%;
        background: var(--dark);
        color: var(--white);
    }

    .left h2 {
        color: var(--white);
    }

    .right {
        min-width: 20px;
    }
</style>