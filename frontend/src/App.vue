<script>
import Sidebar from 'primevue/sidebar';
import {ref} from "vue";

export default {
  name: 'App',
  components:
      {Sidebar,},
  data() {
    return {
      visible: ref(false),
      linkData: [
        {
          title: 'Данные',
          link: '/dataPanel'
        },
        {
          title: 'Отчет',
          link: '/reportPanel'
        },
        {
          title: 'Журнал',
          link: '/journalPanel'
        },
        {
          title: 'Справка',
          link: '/helpPanel'
        },
      ]
    }
  }
}
</script>
<template>
  <div>
    <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary header">
      <div class="container-fluid">
        <Button icon="pi pi-align-justify" @click="visible = true"/>
        <i class="pi pi-user" style="color: slateblue; font-size: 2rem"></i>
      </div>
    </nav>
    <Sidebar v-model:visible="visible">
      <router-link v-for="linkItem in linkData" :to="linkItem.link" :key="linkItem.title">
        <h2 class="linkItem" @click="visible=false">{{linkItem.title}}</h2>
      </router-link>
    </Sidebar>
  </div>
  <div class="body">
    <router-view></router-view>
  </div>

</template>

<style scoped>
.header {
  background-color: white;
  padding: 15px;
  margin-bottom: 50px;
}
.body{
  padding: 10px 100px;
  background-color: white;
  border-radius: 12px;
  width:80%;
  margin: auto;
}
.linkItem{
  color:slateblue
}
</style>
