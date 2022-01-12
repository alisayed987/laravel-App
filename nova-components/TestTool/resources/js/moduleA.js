import {encoder,tableArray} from './helpers.js'
export default {
    state: {
        user_id: 0,
        user_addresses: [],
        pattern: "",
        isOld: null,
        count:-1,
        per_page:3,
        current_page:1,
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
        },
        currentPageUpdate: function(state,val){
            state.current_page=val;
            dispatchEvent
        }
    },
    actions: {
        fetchAddresses: function(context) {
            const classes = {
                'App\\Nova\\Filters\\IsOld': context.state.isOld,
                'App\\Nova\\Filters\\UserId':context.state.user_id
            }
            const encoded_filter = encoder(classes)
            const params = {
                search:context.state.pattern,
                filters:encoded_filter,
                orderBy:'',
                perPage:context.state.per_page,
                trashed:'',
                page:context.state.current_page,
                relationshipType:''
            }
            Nova.request().get(
                'http://localhost:1234/nova-api/addresses'
            ,{params})
                .then(result => {
                    const organised_arr = tableArray(result.data.resources); 
                    context.commit("addressesUpdate", organised_arr);
                })
                .catch(err => {
                    throw err;
                });
            Nova.request().get(
                'http://localhost:1234/nova-api/addresses/count'
            ,{params})
            .then(result => {
                context.state.count = result.data.count;
            })
            .catch(err => {
                throw err;
            });
        }
    },
    getters: {
        getId: state => state.user_id,
        getUserAddresses: state => state.user_addresses,
        getPages: state=> {
            return Math.ceil(state.count/state.per_page)
        }
    }
};
