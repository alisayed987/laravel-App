import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

Vue.use(Vuex);

export default new Vuex.Store({
    // state +++++++++++++++++++++++++++++
    state: {
        create_user_state: {
            email: null,
            area: null,
            street: null,
            building: null,
            floor: null,
            apt: null,
        },
        user_address_state: {
            user_id: null,
            user_addresses: undefined,
        },
    },
    // mutations +++++++++++++++++++++++++++
    mutations: {
        updateUserAddress(state, message) {
            for (const key in message) {
                this.state.create_user_state[key] = message[key];
            }
            console.log(this.state.create_user_state);
        },
        setUserAddress: function (state, payload) {
            this.state.user_address_state.user_id = payload;
            console.log(state.user_address_state.user_id);
            // state.user_address_state.user_addresses =
        },
    },
    // actions ++++++++++++++++++++++++++++
    actions: {
        fetchData: function () {
            axios
                .get(
                    "http://localhost:1234/api/user/address/" +
                        this.state.user_address_state.user_id
                )
                .then((res) => {
                    if (res.status == 200) {
                        this.state.user_address_state.user_addresses =
                            res.data.address_list;
                    }else if(res.status == 404){
                      this.state.user_address_state.user_addresses =
                            res.data.address_list;
                            console.log("404444")
                          alert("User does not exist");
                    }
                });
        },
        deleteAddress: function ({ commit, dispatch }, delete_id) {
            if (delete_id) {
                axios
                    .get("http://localhost:1234/api/deleteAddress/" + delete_id)
                    .then((res) => {
                        alert(res.data.deleted);
                        dispatch("fetchData");
                    });
            }
        },
        createAddress: function () {
            // req header ------------------------
            const headers = {
                "Content-Type": "application/json",
                Accept: "application/json",
            };
            const req_body = this.state.create_user_state;
            console.log(JSON.stringify(req_body));
            // send post req -----------------------

            return new Promise((resolve, reject) => {
                axios
                    .post("http://localhost:1234/api/createAddress", req_body, {
                        headers,
                    })
                    .then((res) => {
                        if (res) {
                            if (res.data.saved == true) {
                                resolve(res.data.saved);
                                this.state.create_user_state = {
                                    email: null,
                                    area: null,
                                    street: null,
                                    building: null,
                                    floor: null,
                                    apt: null,
                                };
                                alert(res.data.message)
                            }
                        }
                    });
            });
        },
    },
    // getters ++++++++++++++++++++++++++++
    getters: {
        getUserState: (state) => state.create_user_state,
    },
});
