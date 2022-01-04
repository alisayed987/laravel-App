<template>
  <div class="container">
            <table>
                <thead>
                    <th v-for="(h,index) in table_heads" :key="index">{{h}}</th>
                </thead>
                <tbody>
                    <tr
                        v-for="add in $store.state.user_address_state
                            .user_addresses"
                        :key="add.id"
                    >
                        <td>{{ add.street }}</td>
                        <td>{{ add.building_num }}</td>
                        <td>{{ add.floor }}</td>
                        <td>{{ add.apartment_num }}</td>
                        <td>
                            <button
                                class="btn btn-danger"
                                v-on:click="deleteAddress(add.id)"
                            >
                                delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
</template>

<script>
export default {
props:{
    table_heads:{type:Array,required:true}}
}
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