<template>
    <div class="search__form">
        <form action="" class="pos-relative search__group">
            <input
                type="search"
                v-model="query"
                @input="getSearchData"
                name="search"
                list="search_results"
                placeholder="Введите адрес"
                class="input__big"
            />
            <button type="submit"></button>
            <datalist id="search_results">
                <option v-for="item in search" :key="item.id" :value="item.adress">{{ item.adress }}</option>
            </datalist>
        </form>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            search: [],
            query: "",
        };
    },
    methods: {
        getSearchData() {
            axios.post("/Api/Search/Houses", {query: this.query})
            .then((response) => {
                if (response.data.success === true) {
                    this.search = response.data.data
                }
            })
        },
    },
};
</script>

<style lang="scss">
    .search__group {
        & input {
            width: 100%;
            border-radius: 5px 0 0 5px !important;
        }

        & button {
            position: absolute; 
            top: 0;
            width: 46px;
            height: 45px;
            border-right: none;
            border: 1px solid var(--text-color);
            background: var(--background-color);
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }

        & button:before {
            content: "\f002";
            font-family: FontAwesome;
            font-size: 16px;
            color: var(--text-color);
            margin-left: -6px;
        }
    }
</style>