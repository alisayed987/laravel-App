<template>
    <div class="container">
        <div class="row">
            <div class="col form-group">
                <label-input
                    intype="email"
                    info="email"
                    storeState="updateCreateAddress"
                    store_state="create_user_state"
                    :inValidate="validateEmail"
                />
            </div>
        </div>
        <div class="row">
            <div class="col-6 form-group">
                <label-input
                    intype="text"
                    info="area"
                    storeState="updateCreateAddress"
                    store_state="create_user_state"
                />
            </div>
            <div class="col-6 form-group">
                <label-input
                    intype="text"
                    info="street"
                    storeState="updateCreateAddress"
                    store_state="create_user_state"
                />
            </div>
        </div>
        <div class="row">
            <div class="col-4 form-group">
                <label-input
                    intype="text"
                    info="building"
                    storeState="updateCreateAddress"
                    store_state="create_user_state"
                />
            </div>
            <div class="col-4 form-group">
                <label-input
                    intype="text"
                    info="floor"
                    storeState="updateCreateAddress"
                    store_state="create_user_state"
                />
            </div>
            <div class="col-4 form-group">
                <label-input
                    intype="text"
                    info="apt"
                    storeState="updateCreateAddress"
                    store_state="create_user_state"
                />
            </div>
            <button
                ref="submit_button"
                class="btn btn-primary"
                v-on:click="createAddress"
            >
                Create Address
            </button>
        </div>
    </div>
</template>

<script>
import LabelInput from "../widgets/LabelInput.vue";
export default {
    data() {
        return {
            regexp: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,
        };
    },
    components: { LabelInput },
    methods: {
        createAddress: function () {
            let reset_flag = false;
            this.$store.dispatch("createAddress");
            // .then((created) => {
            //     if (created) {
            //         reset_flag=true
            //         this.$refs["email"].value = "";
            //         this.$refs["area"].value = "";
            //         this.$refs["street"].value = "";
            //         this.$refs["building"].value = "";
            //         this.$refs["floor"].value = "";
            //         this.$refs["apt"].value = "";
            //     }
            // });
        },
        validateEmail() {
            // e.style =
            //     "box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(255, 100, 255, 0.5);";
            // const add = this.$store.getters.getUserState;
            // if (add.email != "" && this.regexp.test(add.email)) {
            //     e.style =
            //         "box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(97, 160, 253, 0.5);";

            // }
            const add = this.$store.getters.getUserState;
            if (add.email != "" && this.regexp.test(add.email)) {
                return false;
            } else {
                return true;
            }
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
</style>
