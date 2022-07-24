<template>
    <div>
        <div @click="expanded=!expanded" :style="{'margin-left': `${depth * 20}px`}" class="node">
            <div @click="GetUsers(node, node.id, node.message)" >
                <span class="type" v-if="hasChildren" >{{expanded ? '&#9660;' : '&#9658;'}}</span>
                <span class="type" v-if="isArea"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-binary" viewBox="0 0 16 16"><path d="M7.05 11.885c0 1.415-.548 2.206-1.524 2.206C4.548 14.09 4 13.3 4 11.885c0-1.412.548-2.203 1.526-2.203.976 0 1.524.79 1.524 2.203zm-1.524-1.612c-.542 0-.832.563-.832 1.612 0 .088.003.173.006.252l1.559-1.143c-.126-.474-.375-.72-.733-.72zm-.732 2.508c.126.472.372.718.732.718.54 0 .83-.563.83-1.614 0-.085-.003-.17-.006-.25l-1.556 1.146zm6.061.624V14h-3v-.595h1.181V10.5h-.05l-1.136.747v-.688l1.19-.786h.69v3.633h1.125z"/><path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/></svg></span>
                <span class="type" v-if="!hasChildren && !isArea">&#9658;</span>
                <label class="text-primary">id:{{node.id}}</label> {{node.name}} 
            </div>
        </div>
        <div v-if="expanded">
            <TreeBrowser
                v-for="child in node.nodes" :key="child.id"
                :node="child"
                :depth="depth + 1"
            />
        </div>
    </div>
</template>

<script>
export default {
    name: 'TreeBrowser',
    props:{
        node: Object,
        depth: {
            type: Number,
            default: 0,
        }
    },
    data() {
        return {
            expanded:false,
            users: [],
            areas: [],
        }
    },
    computed: {
        hasChildren() {
            if(this.node.nodes.length != 0) return true;
        },
        isArea(){
            if(this.node.message == 'licence_areas') return true;
        }
    },
    methods:{
        GetUsers(node, id, message)
        {
            // console.log(node);
            if (message == 'licence_areas'){
                GetInfo(node, id, message)
                return;
            }
            if (node.nodes.length == 0){
                axios
                .get(`/export/child?id=${id}&message=${message}`)
                .then((response) =>
                {//фильтрация на состояние лицензии (добавить лицензию в скобках)
                    if (response.data.message == 'users')
                    {   
                        this.users = response.data.data;
                        
                        for(let i = 0; i < this.users.length; i++)
                        {
                            let currentNode = {name: this.users[i].name, id: this.users[i].id, message: response.data.message, nodes: []}
                            
                            node.nodes.push(currentNode)
                            
                        }
                    }
                    if (response.data.message == 'licence_areas')
                    {
                        this.areas = response.data.data;
                        
                        for(let i = 0; i < this.areas.length; i++)
                        {
                            let currentNode = {name: this.areas[i].name, id: this.areas[i].id, message: response.data.message, nodes: []}
                            node.nodes.push(currentNode)
                        }
                    }
                })
            }
        },
        GetInfo(node, id, message){
            //взаимодействие элементов
        }
    }
}
</script>

<style scoped>
    .node{
        text-align: left;
    }
    .node:hover{
        background: gold;
    }
    .type{
        margin-right: 5px;
    }
</style>