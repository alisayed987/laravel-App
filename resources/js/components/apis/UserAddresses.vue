<template>
    <div class="container">
        <div class="row">
            <div class="col form-group">
               
                <label-input intype="email"
                    info="user_id"
                    state_dir="user_address_state"
                    state_name_map="user_id"
                    storeState="setFetchUserAddress"
                    
                    />
            </div>
            <button class="btn btn-primary" v-on:click="fetchData()">
                Get Addresses
            </button>
        </div>
        <table-component :table_heads="table_heads" :state_array="($store.state.user_address_state.user_addresses)?$store.state.user_address_state.user_addresses:[]" delete_action="deleteAddress"/>
    </div>
</template>

<script>
import LabelInput from '../widgets/LabelInput.vue';
import TableComponent from '../widgets/TableComponent.vue';
export default {
  components: { LabelInput, TableComponent },
    data() {
        return {
            table_heads:['street','building_num','floor','apartment_num'],
        };
    },
    methods: {
        fetchData: function () {
            this.$store.dispatch("fetchData");
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
