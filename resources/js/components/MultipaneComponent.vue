
<template>
  <Multipane class="vertical-panes" layout="vertical">
  <div class="pane" :style="{ minWidth: '150px', width: '300px', maxWidth: '500px' }">
    <div>
      <h6 class="title is-4">Лицензии</h6>
      <SearchComponent/>
      <simplebar class="test" data-simplebar-auto-hide="false">
        <TreeBuilder/>
      </simplebar>
    </div>
  </div>
  <multipane-resizer></multipane-resizer>
  <div class="pane" :style="{ flexGrow: 1 }">
    <ViewComponent/>
  </div>
</Multipane>
</template>

<script>
import { Multipane, MultipaneResizer } from 'vue-multipane';
import TreeBuilder from './TreeBuilder';
import SearchComponent from './SearchComponent.vue';
import ViewComponent from './ViewComponent';
import simplebar from 'simplebar-vue';
import 'simplebar/dist/simplebar.min.css';
export default {
  components: {
    Multipane,
    MultipaneResizer,
    TreeBuilder,
    SearchComponent,
    ViewComponent,
    simplebar,
  }
}
</script>

<style lang="scss" scoped>
  .test {
  height: 900px;
  }
  .vertical-panes {
  width: 100%;
  height: 1000px;
  border: 1px solid #ccc;
}
.vertical-panes > .pane {
  text-align: left;
  padding: 15px;
  overflow: hidden;
  background: #eee;
}
.vertical-panes > .pane ~ .pane {
  border-left: 1px solid #ccc;
}
</style>