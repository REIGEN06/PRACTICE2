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
        root:{
          name:'Состояние лицензии',
          id:0,
          condition:0,
          nodes: [],
          message:'root',
        }
      }
    },

    mounted()
  {
    this.GetLicence();
  },

  methods:{
    GetLicence(){
    axios
    .get('/export/licences_condition')
    .then((response) => 
      {
        this.condition = response.data.data;

         for(let i = 0; i < this.condition.length; i++){
            let currentNode = {name: this.condition[i].condition, id: this.condition[i].id, message: response.data.message, condition: this.condition[i].id, nodes: []}
            this.root.nodes.push(currentNode)
          }
      })
    },
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