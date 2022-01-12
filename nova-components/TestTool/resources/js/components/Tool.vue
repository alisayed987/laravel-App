<template>
  <div class="container">
    <heading class="mb-6">Test Tool</heading>

    <div class="row">
      <div class="col-6">
        <input
          type="text"
          name="user_id"
          id="user_id"
          v-model="user_id"
          placeholder="user id"
        />
      </div>
      <div class="col-6">
        <select class="form-select" v-model="isOld" aria-label="Isold">
          <option selected>-</option>
          <option value="1">isOld</option>
          <option value="0">new</option>
        </select>
      </div>
    </div>
    <div class="row">
      <input
        type="text"
        name="search"
        id="search"
        v-model="pattern"
        placeholder="search"
      />
    </div>
    <div class="row">
      <div class="col">
        <table-component
          :table_heads="th"
          :state_array="getUserAddresses"
        ></table-component>
      </div>
    </div>
    <div class="row">
      <button class="btn btn-default btn-primary" @click="submit">
        Get Addresses
      </button>
    </div>
  </div>
</template>
<script>
import { mapActions, mapGetters, mapMutations } from "vuex";
export default {
  data() {
    return {
      th: ["street", "building_num", "floor", "apartment_num"],
      user_id: null,
      user_addresses: [],
      pattern: "",
      isOld: null,
    };
  },
  methods: {
    ...mapMutations(["idUpdate", "patternUpdate", "isOldUpdate"]),
    ...mapActions(["fetchAddresses"]),
    submit() {
      if (this.isOld === "-") {
        this.isOldUpdate(null);
      } else {
        this.isOldUpdate(this.isOld);
      }
      this.idUpdate(this.user_id);
      this.patternUpdate(this.pattern);
      this.fetchAddresses();
    },
  },
  computed: {
    ...mapGetters(["getId", "getUserAddresses"]),
  },
};
</script>

<style>
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
.row {
  margin: 20px;
}
</style>
