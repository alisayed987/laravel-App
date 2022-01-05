<template>
  <div>
    <label :for="info">{{ info }}</label>
    <input
      :class="{ 'form-control': true, valid: !valid_flag, invalid: valid_flag }"
      :type="intype"
      :placeholder="info"
      :name="info"
      :id="info"
      :ref="info"
      :value="state"
      :v-model="instate"
      @input="updateState"
    />
  </div>
</template>

<script>
export default {
  data() {
    return {
      instate: null,
      valid_flag: true,
    };
  },
  props: {
    info: { type: String, required: true },
    intype: { type: String, required: true },
    state: { type: String },
    stateFunc: { type: Function },
    inValidate: { type: Function },
  },
  methods: {
    updateState(e) {
      let payload = {};
      payload[e.target.id] = e.target.value;
      this.stateFunc(payload);
      if (this.inValidate) {
        if (this.inValidate()) {
          this.valid_flag = false;
        } else {
          this.valid_flag = true;
        }
      }
    },
  },
  computed: {},
};
</script>

<style>
.valid {
  box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset,
    0px 0px 8px rgba(255, 100, 255, 0.5);
}
.invalid {
  box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset,
    0px 0px 8px rgba(97, 160, 253, 0.5);
}
</style>
