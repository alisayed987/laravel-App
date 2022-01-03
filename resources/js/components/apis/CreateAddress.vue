<template>
    <div class="container">
        <div class="row">
            <div class="col form-group">
                <label for="user_email">Email</label>
                <input
                    class="form-control"
                    type="email"
                    placeholder="Email"
                    name="user_email"
                    id="user_email"
                    v-model="email"
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
                    v-model="area"
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
                    v-model="street"
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
                    v-model="building"
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
                    v-model="floor"
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
                    v-model="apt"
                />
            </div>
            <button class="btn btn-primary" v-on:click="createAddress">
                Create Address
            </button>
            <button class="btn btn-primary" v-on:click="logState">
                log current state
            </button>
            <div>{{$store.getters.getUserState}}</div>
        </div>
    </div>
</template>

<script>
import {useStore} from "vuex"
export default {
    data() {
        return {
            email: null,
            area: null,
            street: null,
            building: null,
            floor: null,
            apt: null,
        };
    },
    methods:{
      createAddress: function(){
        const payload ={
        email: this.email,
        area: this.area,
        street: this.street,
        building: this.building,
        floor: this.floor,
        apt: this.apt,
      }
        this.$store.commit('setUserState',payload)
        this.$store.dispatch('createAddress')
        } ,
      logState:function () {console.log(this.$store.getters.getUserState)}
    }
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
