<template>
    <div>
      <TreeLicenceCondition
      :node = root
      />
    </div>
</template>

<script>
const axios = require('axios').default;
import TreeLicenceCondition from './TreeLicenceCondition';

export default {
    name: 'TreeBrowser',
    components:{
      TreeLicenceCondition
    },

    data(){
      return{
        condition: [],
        users: [],
        root:{
          name:'Состояние лицензии',
          id:0,
          nodes: [],
        }
      }
    },

    props:{
        node: Object,
        depth: {
            type: Number,
            default: 0,
        }
    },

    mounted()
  {
    this.GetLicencesCondition();
    this.GetSubsoilUsers();
  },

  methods:{
    GetLicencesCondition(){
      axios
    .get('/export/licences_condition')
    .then((response) => 
      {
        this.condition = response.data.data;
         for(let i = 0; i < this.condition.length; i++){
            let currentNode = {name: this.condition[i].condition, id: this.condition[i].id, message: response.data.message, nodes: []}
            this.root.nodes.push(currentNode)
      }})
    },
    GetSubsoilUsers(){
      axios
    .get('/export/subsoil_users')
    .then((response) => 
      {
        this.users = response.data.data;
        
         for(let i = 0; i < this.users.length; i++){
            let currentNode = {name: this.users[i].name, id: this.users[i].id, message: response.data.message, nodes: []}
            this.root.nodes.push(currentNode)
      }})
    },
  },

}
</script>

<style scoped>
    .node{
        text-align: left;
    }
    .type{
        margin-right: 5px;
    }
</style>