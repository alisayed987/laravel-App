<template>
  <div class="container">
            <table>
                <thead>
                    <th v-for="(head,index) in table_heads" :key="index">{{head}}</th>
                </thead>
                <tbody>
                    <tr
                        v-for="(item) in state_array"
                        :key="item.id"
                    >
                        <td v-for="(head,index) in table_heads" :key="index">{{ item[head] }}</td>
                        <td>
                            <button
                                class="btn btn-danger"
                                v-on:click="deleteAddress(item.id)"
                            >
                                delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
</template>

<script>
import { mapActions } from 'vuex';
export default {
    
props:{
    table_heads:{type:Array,required:true},
    state_array:{type:Array,required:true},
    delete_action:{type:String,required:true}
    },
    methods:{
        deleteAddress: function (id) {
            this.$store.dispatch(this.delete_action, id);
        }
    }
    
}
</script>

<style scoped>
.container {
    max-width: 50%;
}
.btn {
    margin: 20px;
}
table {
    float: left;
}
table,
th,
td {
    border: 1px solid black;
    padding: 10px;
}
</style>