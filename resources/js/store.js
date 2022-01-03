import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
  // state +++++++++++++++++++++++++++++
	state: {
		create_user_state:{
            email: null,
            area: null,
            street: null,
            building: null,
            floor: null,
            apt: null,
          },
    user_address_state:{
            user_id: null,
            user_addresses: undefined,
            // del_add:null
          }
	},
  // mutations +++++++++++++++++++++++++++
	mutations: {
    setUserState:function(state,payload){
      state.create_user_state = payload
      console.log(payload)
    },
    setUserAddress:function(state,payload){
      state.user_address_state.user_id = payload;
      // state.user_address_state.user_addresses = 
    },
    setDeleteAddress: function(state,payload){
      state.user_address_state.del_add = payload
    }
	},
  // actions ++++++++++++++++++++++++++++
  actions:{
      fetchData: function () {
        axios.get("http://localhost:1234/api/user/address/" + this.state.user_address_state.user_id).then((res) => {
          this.state.user_address_state.user_addresses = res.data.address_list;
          console.log(this.state.user_address_state.user_addresses);
        });
      },
      // deleteAddress: function () {
      //   if(this.state.user_address_state.del_add){
      //     axios
      //     .get("http://localhost:1234/api/deleteAddress/" + this.state.user_address_state.del_add)
      //     .then((res) => {
      //       alert(res.data.deleted);
      //     });
      //   console.log(address_id);
      //   }
        
      // },
      createAddress: function () {
        // req header ------------------------
        const headers = {
          "Content-Type": "application/json",
          Accept: "application/json",
        };
        // req body --------------------------
        const req_body = {
          email: this.state.create_user_state.email,
          area: this.state.create_user_state.area,
          street: this.state.create_user_state.street,
          building: this.state.create_user_state.building,
          floor: this.state.create_user_state.floor,
          apt: this.state.create_user_state.apt,
        };
        console.log(JSON.stringify(req_body));
        // send post req -----------------------
        axios
          .post("http://localhost:1234/api/createAddress", req_body, { headers })
          .then((res) => {
            if (res.data.saved == true) {
              alert("address created");
            }
          });
      },
  },
  // getters ++++++++++++++++++++++++++++
	getters: {
    getUserState: state => state.create_user_state,
	}
})