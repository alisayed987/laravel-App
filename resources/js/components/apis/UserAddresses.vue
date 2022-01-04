<template>
    <div class="container">
        <div class="row">
            <div class="col form-group">
                <label for="user_id">Email</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="User Id"
                    name="user_id"
                    id="user_id"
                    v-model="userId"
                />
            </div>
            <button class="btn btn-primary" v-on:click="fetchData()">
                Get Addresses
            </button>
        </div>
        <div class="container">
            <table>
                <thead>
                    <th>street</th>
                    <th>building</th>
                    <th>floor</th>
                    <th>apartment</th>
                    <th>delete</th>
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
    </div>
</template>

<script>
export default {
    data() {
        return {};
    },
    computed: {
        userId: {
            get() {
                return this.$store.state.user_address_state.user_id;
            },
            set(value) {
                this.$store.commit("setFetchUserAddress", value);
            },
        },
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
