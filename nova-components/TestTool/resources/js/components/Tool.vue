<template>
  <div class="container">
    <heading class="mb-6">Test Tool</heading>
    <div class="row">
      <label-input
          intype="text"
          info="user_id"
          :state="user_id"
          :stateFunc="updateUserId"
        />
    </div>
    <div class="row">
      <div class="col-6">
      <label-input
          intype="text"
          info="search"
          :state="pattern"
          :stateFunc="updatePattern"
        />

      </div>
      <div class="col-6">
        <label for="isOld">isOld</label>
        <select class="form-select" v-model="isOld" aria-label="isOld">
          <option selected>-</option>
          <option value="1">isOld</option>
          <option value="0">new</option>
        </select>
      </div>
    </div>
    
    <div class="row">
      <button class="btn btn-default btn-primary" @click="submit">
        Get Addresses
      </button>
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
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
          
          <li class="page-item" v-for="index in getPages" :key="index"><a class="page-link" @click="updateCurrentPage(index)">{{index}}</a></li>
          
          
        </ul>
      </nav>
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
      pages:0
    };
  },
  methods: {
    ...mapMutations(["idUpdate", "patternUpdate", "isOldUpdate","currentPageUpdate"]),
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
    updateUserId(input){
      this.user_id = input['user_id']
    },
    updatePattern(input){
      this.pattern = input['search']
    },
    updateCurrentPage(page){
      this.currentPageUpdate(page)
      this.fetchAddresses()
    }
  },
  computed: {
    ...mapGetters(["getId", "getUserAddresses","getPages"]),
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
