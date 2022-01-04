<template>
    <div>
        <label :for="info">{{ info }}</label>
        <input
            class="form-control"
            :type="intype"
            :placeholder="info"
            :name="info"
            :id="info"
            :ref="info"
            @input="updateState"
        />
    </div>
</template>

<script>
import { mapState } from "vuex";
export default {
    props: {
        info: { type: String, required: true },
        storeState: { type: String, required: true },
        intype: { type: String, required: true },
        store_state: { type: String, required: true },
        inValidate: { type: Function },
    },
    methods: {
        updateState(e) {
            if (this.inValidate) {
                if (this.inValidate()) {
                    e.target.style =
                        "box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(255, 100, 255, 0.5);";
                } else {
                    e.target.style =
                        "box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(97, 160, 253, 0.5);";
                }
            }
            let payload = {};
            payload[e.target.id] = e.target.value;
            this.$store.commit(this.storeState, payload);
        },
    },
    computed: {
        ...mapState({
            invalue: (state) => state[this.store_state][info],
        }),
    },
};
</script>

<style></style>
