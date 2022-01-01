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
          v-model="user_id"
        />
      </div>
      <button class="btn btn-primary" v-on:click="fetchData(user_id)">
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
          <tr v-for="add in user_addresses" :key="add.id">
            <td>{{ add.street }}</td>
            <td>{{ add.building_num }}</td>
            <td>{{ add.floor }}</td>
            <td>{{ add.apartment_num }}</td>
            <td>
              <button class="btn btn-danger" v-on:click="deleteAddress(add.id)">
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
import axios from "axios";
console.log("User Address");
export default {
  data() {
    return {
      user_id: null,
      user_addresses: undefined,
    };
  },
  methods: {
    fetchData: function (user_id) {
      axios.get("http://localhost/api/user/address/" + user_id).then((res) => {
        this.user_addresses = res.data.address_list;
        console.log(this.user_addresses);
      });
    },
    deleteAddress: function (address_id) {
      axios
        .get("http://localhost/api/deleteAddress/" + address_id)
        .then((res) => {
          alert(res.data.deleted);
        });
      console.log(address_id);
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
