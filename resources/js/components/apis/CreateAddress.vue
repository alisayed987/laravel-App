<template>
  <div class="container">
    <div class="row">
      <div class="col form-group">
        <label-input
          intype="email"
          info="email"
          :state="create_user_state.email"
          :stateFunc="updateCreateAddressState"
          :inValidate="validateEmail"
        />
      </div>
    </div>
    <div class="row">
      <div class="col-6 form-group">
        <label-input
          intype="text"
          info="area"
          :state="create_user_state.area"
          :stateFunc="updateCreateAddressState"
        />
      </div>
      <div class="col-6 form-group">
        <label-input
          intype="text"
          info="street"
          :state="create_user_state.street"
          :stateFunc="updateCreateAddressState"
        />
      </div>
    </div>
    <div class="row">
      <div class="col-4 form-group">
        <label-input
          intype="text"
          info="building"
          :state="create_user_state.building"
          :stateFunc="updateCreateAddressState"
        />
      </div>
      <div class="col-4 form-group">
        <label-input
          intype="text"
          info="floor"
          :state="create_user_state.floor"
          :stateFunc="updateCreateAddressState"
        />
      </div>
      <div class="col-4 form-group">
        <label-input
          intype="text"
          info="apt"
          :state="create_user_state.apt"
          :stateFunc="updateCreateAddressState"
        />
      </div>
      <button
        ref="submit_button"
        :class="{
          btn: true,
          'btn-primary': true,
          disabled: !(
            create_user_state.email &&
            create_user_state.area &&
            create_user_state.street &&
            flag
          ),
        }"
        v-on:click="submitForm"
      >
        Create Address
      </button>
      <div></div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapMutations, mapState } from "vuex";
import LabelInput from "../widgets/LabelInput.vue";
export default {
  data() {
    return {
      email_regexp:
        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,
      flag: false,
    };
  },
  components: { LabelInput },
  methods: {
    ...mapMutations(["updateCreateAddress", "defaultCreateAddress"]),
    ...mapActions(["createAddress"]),
    updateCreateAddressState: function (ininput) {
      this.updateCreateAddress(ininput);
    },
    validateEmail() {
      const add = this.$store.getters.getUserState;
      if (add.email != "" && this.email_regexp.test(add.email)) {
        this.flag = true;
        return false;
      } else {
        this.flag = false;
        return true;
      }
    },
    submitForm: function () {
      const created = this.createAddress();
      if (created) this.defaultCreateAddress();
    },
  },
  computed: {
    ...mapState(["create_user_state"]),
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
</style>
