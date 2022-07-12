<template>
    <div>
      <TreeBrowser
      :node = root
      />
    </div>
</template>

<script>
const axios = require('axios').default;
import TreeBrowser from './TreeBrowser';

export default {
    name: 'TreeBuilder',
    components:{
      TreeBrowser
    },

    data(){
      return{
        condition: [],
        users: [],
        licence: [],
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
    this.GetLicence();
    this.GetUsers();
  },

  methods:{
    GetLicence(){
    axios
    .get('/export/licences_condition')
    .then((response) => 
      {
        this.condition = response.data.data;
         for(let i = 0; i < this.condition.length; i++){
            let currentNode = {name: this.condition[i].condition, id: this.condition[i].id, message: response.data.message, nodes: []}
            this.root.nodes.push(currentNode)
          }
      })
    },

    GetUsers(){
      axios
    .get('/export/subsoil_user')
    .then((response) =>
    {
      this.users = response.data.data;

      for(let i = 0; i < this.users.length; i++)
        {
            let currentNode = {name: this.users[i].name, id: this.users[i].id, status: this.users[i].status, message: response.data.message, nodes: []}
            this.root.nodes[0].nodes.push(currentNode)
        }
    })
      
      }
    }
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