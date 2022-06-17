<template>
    <div class="search-group">
        <form action="">
            <input
                type="search"
                v-model="query"
                @input="getSearchData"
                name="search"
                list="search_results"
                placeholder="Введите адрес"
                class="input__big"
            />
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
            search: [{ id: 0, adress: "Идет поиск..." }],
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

<style lang="scss" scoped>
</style>