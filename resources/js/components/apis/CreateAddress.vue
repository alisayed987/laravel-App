<template>
    <div class="container">
        <div class="row">
            <div class="col form-group">
                <label-input
                    intype="email"
                    info="email"
                    storeState="updateCreateAddress"
                    state_dir="create_user_state"
                    state_name_map="email"
                    :inValidate="validateEmail"
                    v-model="$store.state.create_user_state.email"
                />
            </div>
        </div>
        <div class="row">
            <div class="col-6 form-group">
                <label-input
                    intype="text"
                    info="area"
                    storeState="updateCreateAddress"
                    state_dir="create_user_state"
                    state_name_map="area"
                    v-model="$store.state.create_user_state.area"

                />
            </div>
            <div class="col-6 form-group">
                <label-input
                    intype="text"
                    info="street"
                    storeState="updateCreateAddress"
                    state_dir="create_user_state"
                    state_name_map="street"
                    v-model="$store.state.create_user_state.street"

                />
            </div>
        </div>
        <div class="row">
            <div class="col-4 form-group">
                <label-input
                    intype="text"
                    info="building"
                    storeState="updateCreateAddress"
                    state_dir="create_user_state"
                    state_name_map="building"
                    v-model="$store.state.create_user_state.building"

                />
            </div>
            <div class="col-4 form-group">
                <label-input
                    intype="text"
                    info="floor"
                    storeState="updateCreateAddress"
                    state_dir="create_user_state"
                    state_name_map="floor"
                    v-model="$store.state.create_user_state.floor"

                />
            </div>
            <div class="col-4 form-group">
                <label-input
                    intype="text"
                    info="apt"
                    storeState="updateCreateAddress"
                    state_dir="create_user_state"
                    state_name_map="apt"
                    v-model="$store.state.create_user_state.apt"

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
            email_regexp: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,
        };
    },
    components: { LabelInput },
    methods: {
        createAddress: function () {
            this.$store.dispatch("createAddress")
            .then((created) => {
                if (created) {
                    this.$store.commit("defaultCreateAddress")
                }
            });
        },
        validateEmail() {
            const add = this.$store.getters.getUserState;
            if (add.email != "" && this.email_regexp.test(add.email)) {
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
