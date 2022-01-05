<template>
    <div>
        <label :for="info">{{ info }}</label>
        <input
            :class="{'form-control':true,'valid':valid_flag,'invalid':!valid_flag}"
            :type="intype"
            :placeholder="info"
            :name="info"
            :id="info"
            :ref="info"
            :value="state"
            @input="updateState"
        />
    </div>
</template>

<script>
import { mapState } from "vuex";
export default {
    data(){
        return{
            valid_flag:false
        }
    },
    props: {
        info: { type: String, required: true },
        storeState: { type: String, required: true },
        intype: { type: String, required: true },
        state_dir: { type: String, required: true },
        state_name_map:{type:String},
        inValidate: { type: Function }
    },
    methods: {
        updateState(e) {
            let payload = {};
            payload[e.target.id] = e.target.value;
            this.$store.commit(this.storeState, payload);

            if (this.inValidate) {
                if (this.inValidate()) {
                    this.valid_flag=true
                    // e.target.style =
                    //     "box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(255, 100, 255, 0.5);";
                } else {
                    this.valid_flag=false
                    // e.target.style =
                    //     "box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(97, 160, 253, 0.5);";
                }
            }
        },

    },
    computed: {
        ...mapState({
            'state': function(state){return state[this.state_dir][this.state_name_map]},
        })
    },
};
</script>

<style>
.valid{
box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(255, 100, 255, 0.5);
}
.invalid{
box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(97, 160, 253, 0.5);
}
</style>
