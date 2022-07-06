
<template>
  <Multipane class="vertical-panes" layout="vertical">
  <div class="pane" :style="{ minWidth: '150px', width: '200px', maxWidth: '300px' }">
    <div>
      <h6 class="title is-6">Лицензии</h6>
      <p class="subtitle is-6">[ПОИСК]</p>
      <p>
        <small>
          <strong>[ФИЛЬТР]</strong><br/>
          <div class="Licence_condition">
            <ul v-for="licence_condition in licences_condition" :key="licence_condition.id">
                <p>{{licence_condition}}</p>
            </ul>
          <!-- <TreeBrowser/> -->
          </div>
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
const axios = require('axios').default;
import { Multipane, MultipaneResizer } from 'vue-multipane';
import TreeBrowser from './TreeBrowser';

export default {
  name: 'app',
  data() {
    return{
      licences_condition: []
    }
  },
  mounted()
  {
    this.GetLicencesCondition();
  },
  methods:{
    GetLicencesCondition(){
      axios
    .get('/export/licences_condition')
    .then((response) => 
      {
        console.log(response);
        this.licences_condition = response;
      })
      .catch((error) => 
      {
        console.error(error);
      });
    }

  },
  components: {
    Multipane,
    MultipaneResizer,
    TreeBrowser,
    // PerfectScrollbar,
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