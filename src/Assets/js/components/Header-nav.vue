<template>
<div id="sidebar" class="center" v-show="isActive">
    <ul>
        <li>
            <a @click="toogle">
                <div class="logo">
                    <img src="img/logo/logo.svg" alt="Риелтор"  />
                    <span>Риелтор</span>
                </div>
            </a>
        </li>

        <li>
            <a href="/">Недвижимость</a>
        </li>

        <li>
            <a href="/">Заявка на продажу</a>
        </li>

        <li>
            <a href="/">Помощь</a>
        </li>

        <li>
            <a href="/">Контакты</a>
        </li>
    </ul>
</div>

<header class="center">
    <div class="content">
        <nav>
            <div class="left">
                <ul>
                    <li>
                        <a @click="toogle">
                            <div class="logo">
                                <img src="img/logo/logo.svg" alt="Риелтор"  />
                                <span>Риелтор</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="right">
                <ul>
                    <li>
                        <a href="/">Войти</a>
                    </li>
                </ul>
            </div>
        </nav>
        
    </div>
</header>
</template>

<script>
export default{
    data() {
        return {
            isActive: false,
        };
    },
    methods: {
        toogle(){
            // document.querySelector("#sidebar").classList.toogle("active");
            this.isActive = !this.isActive
        }
    }
}
</script>

<style lang="css" scoped>
#sidebar ul li a {
    color: var(--background-color);
}

#sidebar ul:first-child {
    margin-bottom: 12px;
    font-size: 1.2em;
}

.logo {
    display: flex;
    align-content: center;
}

.logo span {
    margin-left: 4px;
}

#sidebar {
    position: absolute;
    /* margin-left: -25%; */
    width: 25%;
    height: 100%;
    background: var(--color);
    color: var(--background-color);
    transition: 500ms ease all;
}

.active {
    /* margin-left: 25%; */
    transition: 500ms ease all;
}
</style>