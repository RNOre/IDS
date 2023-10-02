<template>
  <div>
      <router-link v-for="item in linkData" :key="item.index" :to="item.link">
        <div class='wrapper' >
          <h1>{{ item.title }}</h1>
          <p>{{ item.description }}</p>
        </div>
      </router-link>
  </div>
</template>

<script>
export default {
  name: 'AdminPanel',
  data() {
    return {
      linkData: [
        {
          title: 'Данные',
          description: 'Информация о мероприятиях и студентах',
          link: '/dataPanel'
        },
        {
          title: 'Отчет',
          description: 'Расчет уровня индивидуальных достижений',
          link: '/reportPanel'
        },
        {
          title: 'Журнал',
          description: 'Информация об индивилуальных баллах достижений',
          link: '/journalPanel'
        },
        {
          title: 'Справка',
          description: 'Справочная информация об алгоритме раоты с ПИС',
          link: '/helpPanel'
        },
      ]
    }
  }
}
</script>

<style>
.title {
  text-align: center;
}

.title h1 {
  font-weight: bold;
  font-size: 32px;
  margin: 50px 0;
}

.itemList {
  display: flex;
  justify-content: space-around;
  margin-top: 200px;
}

.wrapper {
  width: 250px;
  height: 200px;
  background-color: white;
  box-shadow: 7px 7px 14px 0px grey;
  text-decoration: none;
  color: black;
  padding: 20px;
  border-radius: 5px;
  transition: 1s;
}

.wrapper:hover {
  cursor: pointer;
  scale: 1.2;
  box-shadow: 15px 15px 14px 0px grey;
  border: 1px solid #f3f3f3;
}

.wrapper h1 {
  font-weight: bold;
  font-size: 24px;
}

.wrapper p {
  font-size: 16px;
  margin-top: 20px;
  color: grey;
}
a:hover{
  text-decoration: none;
}
</style>