<template>
  <Multipane class="vertical-panes" layout="vertical">
  <div class="pane" :style="{ minWidth: '150px', width: '200px', maxWidth: '300px' }">
    <div>
      <h6 class="title is-6">Лицензии</h6>
      <a class="btn btn-success" href="/export/subsoil_user" role="button">Загрузить</a>
      <p class="subtitle is-6">[ПОИСК]</p>
      <p>
        <small>
          <strong>[ФИЛЬТР]</strong><br/>
          <TreeBrowser
            :node = "root"
          />
        </small>
      </p>
    </div>
  </div>
  <multipane-resizer></multipane-resizer>
  <div class="pane" :style="{ flexGrow: 1 }">
    <div>
      <p>
        <small>
          Лицензия<br/>
          Разработка<br/>
          Документы<br/>
        </small>
      </p>
    </div>
  </div>
</Multipane>
</template>

<script>
import { Multipane, MultipaneResizer } from 'vue-multipane';
import TreeBrowser from './TreeBrowser';

export default {
  mounted() {
    console.log('Component mounted.')
  },
  name: 'app',
  data() {
    return {
      root: {
        name: 'Tree',
        children: [
          {
            name: 'music',
            children: [
              {
                name:'song.mp3'
              }
            ]
          },
          {
            name: 'workspace',
            children: [
              {
                name: 'source.js'
              }
            ]
          }
        ]
      }
    }
  },
  components: {
    Multipane,
    MultipaneResizer,
    TreeBrowser
  }
}
</script>

<style lang="scss" scoped>
  .vertical-panes {
  width: 100%;
  height: 400px;
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