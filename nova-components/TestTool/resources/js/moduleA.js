// import Vue from "vue";
// import Vuex from "vuex";

// Vue.use(Vuex);

export default {
    state: {
        user_id: 0,
        user_addresses: [],
        pattern: "",
        isOld: null
    },
    mutations: {
        idUpdate: function(state, id) {
            state.user_id = id;
        },
        addressesUpdate: function(state, adds) {
            state.user_addresses = adds;
        },
        patternUpdate: function(state, pattern) {
            state.pattern = pattern;
        },
        isOldUpdate: function(state, val) {
            state.isOld = val;
        }
    },
    actions: {
        fetchAddresses: function(context) {
            console.log(context.state.isOld);
            let x = `[{"class":"App\\\\Nova\\\\Filters\\\\IsOld","value":{"isOld":"${context.state.isOld}","id":${context.state.user_id}}}]`;
            let encoded_filter = btoa(x);
            console.log(encoded_filter);
            Nova.request(
                `http://localhost:1234/nova-api/addresses?search=${context.state.pattern}&filters=${encoded_filter}&orderBy=&perPage=25&trashed=&page=1&relationshipType=`
            )
                .then(result => {
                    const data = result.data.resources; //array of objects {attribute,value}
                    let temp_arr = [];
                    data.forEach(element => {
                        const fields = element["fields"]; //arr
                        let temp_obj = {};
                        fields.forEach(ele => {
                            temp_obj[ele["attribute"]] = ele["value"];
                        });
                        temp_arr.push(temp_obj);
                    });
                    context.commit("addressesUpdate", temp_arr);
                    console.log(temp_arr);
                })
                .catch(err => {
                    throw err;
                });
        }
    },
    getters: {
        getId: state => state.user_id,
        getUserAddresses: state => state.user_addresses
    }
};
