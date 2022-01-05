<template>
  <div class="container">
    <div class="row">
      <div class="col form-group">
        <label-input
          intype="text"
          info="user_id"
          :state="user_address_state.user_id"
          :stateFunc="userIdFunc"
        />
      </div>
      <button class="btn btn-primary" v-on:click="fetchData()">
        Get Addresses
      </button>
    </div>
    <table-component
      :table_heads="table_heads"
      :state_array="user_address_state.user_addresses"
      :deleteItemFunc="deleteAddressFunc"
    />
  </div>
</template>

<script>
import { mapActions, mapMutations, mapState } from "vuex";
import LabelInput from "../widgets/LabelInput.vue";
import TableComponent from "../widgets/TableComponent.vue";
export default {
  components: { LabelInput, TableComponent },
  data() {
    return {
      table_heads: ["street", "building_num", "floor", "apartment_num"],
    };
  },
  methods: {
    ...mapActions(["fetchData", "deleteAddress"]),
    ...mapMutations(["setFetchUserAddress"]),
    userIdFunc: function (ininput) {
      this.setFetchUserAddress(ininput);
    },
    deleteAddressFunc: function (id) {
      this.deleteAddress(id);
    },
  },
  computed: {
    ...mapState(["user_address_state"]),
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
