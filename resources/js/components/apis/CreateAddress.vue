<template>
    <div class="container">
        <div class="row">
            <div class="col form-group">
                <label for="user_email">Email</label>
                <input
                    class="form-control"
                    type="email"
                    placeholder="Email"
                    name="email"
                    id="email"
                    ref="email"
                    @input="updateUserAddress"
                />
            </div>
        </div>
        <div class="row">
            <div class="col-6 form-group">
                <label for="area">Area</label>
                <input
                    type="text"
                    class="form-control"
                    placeholder="Area"
                    name="area"
                    id="area"
                    ref="area"
                    @input="updateUserAddress"
                />
            </div>
            <div class="col-6 form-group">
                <label for="street">Street</label>
                <input
                    type="text"
                    class="form-control"
                    placeholder="Street"
                    name="street"
                    id="street"
                    ref="street"
                    @input="updateUserAddress"
                />
            </div>
        </div>
        <div class="row">
            <div class="col-4 form-group">
                <label for="building">Building</label>
                <input
                    class="form-control"
                    type="text"
                    placeholder="Building"
                    name="building"
                    id="building"
                    ref="building"
                    @input="updateUserAddress"
                />
            </div>
            <div class="col-4 form-group">
                <label for="floor">Floor</label>
                <input
                    type="text"
                    class="form-control"
                    placeholder="Floor"
                    name="floor"
                    id="floor"
                    ref="floor"
                    @input="updateUserAddress"
                />
            </div>
            <div class="col-4 form-group">
                <label for="apt">Apartment</label>
                <input
                    type="text"
                    class="form-control"
                    placeholder="Apartment Number"
                    name="apt"
                    id="apt"
                    ref="apt"
                    @input="updateUserAddress"
                />
            </div>
            <button
                ref="submit_button"
                class="btn btn-primary"
                v-on:click="createAddress"
                disabled
            >
                Create Address
            </button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            regexp: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,
        };
    },
    computed: {
        validate() {
            this.$refs["email"].style =
                "box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(255, 100, 255, 0.5);";
            const add = this.$store.getters.getUserState;
            if (add.email != "" && this.regexp.test(add.email)) {
                this.$refs["email"].style =
                    "box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(97, 160, 253, 0.5);";
                if (add.email && add.area && add.street) {
                    this.$refs["submit_button"].disabled = false;
                } else {
                }
            }
        },
    },
    methods: {
        updateUserAddress(e) {
            let payload = {};
            payload[e.target.id] = e.target.value;
            this.$store.commit("updateUserAddress", payload);
            this.validate;
        },
        createAddress: function () {
            this.$store.dispatch("createAddress").then((created) => {
                if (created) {
                    this.$refs["email"].value = "";
                    this.$refs["area"].value = "";
                    this.$refs["street"].value = "";
                    this.$refs["building"].value = "";
                    this.$refs["floor"].value = "";
                    this.$refs["apt"].value = "";
                }
            });
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
