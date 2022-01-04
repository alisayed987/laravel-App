<template>
    <div class="container">
        <div class="row">
            <div class="col form-group">
               
                <label-input intype="email"
                    info="user_id"
                    store_state="user_address_state"
                    storeState="setFetchUserAddress"/>
            </div>
            <button class="btn btn-primary" v-on:click="fetchData()">
                Get Addresses
            </button>
        </div>
        <table-component :table_heads="table_heads" />
    </div>
</template>

<script>
import LabelInput from '../widgets/LabelInput.vue';
import TableComponent from '../widgets/TableComponent.vue';
export default {
  components: { LabelInput, TableComponent },
    data() {
        return {
            table_heads:['street','building','floor','apartment','delete']
        };
    },
    methods: {
        fetchData: function () {
            this.$store.dispatch("fetchData");
        },
        deleteAddress: function (id) {
            this.$store.dispatch("deleteAddress", id);
        },
    },
};
</script>

<style scoped>
.container {
    max-width: 50%;
}
.btn {
    margin: 20px;
}
table {
    float: left;
}
table,
th,
td {
    border: 1px solid black;
    padding: 10px;
}
</style>
