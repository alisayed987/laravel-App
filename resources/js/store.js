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
        defaultCreateAddress(state, message) {
            console.log('state cleared')
            state.create_user_state = {
                email: null,
                area: null,
                street: null,
                building: null,
                floor: null,
                apt: null,
            };
            console.log(state.create_user_state)
        },
        updateCreateAddress(state, message) {
            for (const key in message) {
                state.create_user_state[key] = message[key];
            }
            console.log(state.create_user_state);
        },
        setFetchUserAddress: function (state, payload) {
            state.user_address_state.user_id = payload.user_id;
        },
        setFetchedUserAdd: function (state, list) {
            state.user_address_state.user_addresses = list;
        },
    },
    // actions ++++++++++++++++++++++++++++
    actions: {
        fetchData: function ({ commit }) {
            axios
                .get(
                    "http://localhost:1234/api/user/address/" +
                        this.state.user_address_state.user_id
                )
                .then((res) => {
                    if (res.status == 200) {
                        commit("setFetchedUserAdd", res.data.address_list);
                    } else if (res.status == 404) {
                        commit("setFetchedUserAdd", []);
                        alert("User does not exist");
                    }
                });
        },
        deleteAddress: function ({ dispatch }, delete_id) {
            if (delete_id) {
                axios
                    .get("http://localhost:1234/api/deleteAddress/" + delete_id)
                    .then((res) => {
                        alert(res.data.deleted);
                        dispatch("fetchData");
                    });
            }
        },
        createAddress: function ({commit}) {
            // req header ------------------------
            const headers = {
                "Content-Type": "application/json",
                Accept: "application/json",
            };

            // req body ---------------------------
            const req_body = this.state.create_user_state;

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
                                // commit("defaultCreateAddress");
                                alert(res.data.message);
                            }
                        }
                    })
                    .catch((err) => reject(err));
            });
        },
    },
    // getters ++++++++++++++++++++++++++++
    getters: {
        getUserState: (state) => state.create_user_state,
        getAddressesState: (state) => state.user_address_state
    },
});
