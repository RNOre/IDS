<script>
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import Button from 'primevue/button';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import Dialog from 'primevue/dialog';
import ShowStudent from "./ShowStudent.vue";
import {mapState} from "vuex";
import Toast from 'primevue/toast';
import SpeedDial from 'primevue/speeddial';
import {ref} from 'vue';
import {useToast} from "primevue/usetoast";
import {useConfirm} from "primevue/useconfirm";
import ConfirmDialog from 'primevue/confirmdialog';


export default {
  name: 'DataItem',
  components: {
    ShowStudent,
    TabView,
    TabPanel,
    Button,
    DataTable,
    Column,
    Dialog,
    Toast,
    SpeedDial,
    ConfirmDialog
  },
  computed: {
    ...mapState({
      studentData: state => state.students.students,
    })
  },
  created() {
    this.$store.dispatch('getStudents');
    this.studentData = this.$store.getters.getStudentsData;
  },
  methods: {
    showStudent(id) {
      this.currentStudent = id;
      this.visible = true;
    },
    deleteStudent(id) {
      this.confirm.require({
        message: `Вы уверены, что хотите удалить студента с id: ${id}?`,
        header: 'Удаление студента',
        icon: 'pi pi-info-circle',
        acceptClass: 'p-button-danger',
        accept: () => {
          this.$toast.add({
            severity: 'error',
            summary: `Удаление студента`,
            detail: `Студент с id:${id} удален`,
            life: 3000
          });
          this.$store.dispatch('deleteStudent', id);
        },
        reject: () => {
        }
      });


    },
    setCurrentStudent(data) {
      this.currentStudent = data.id
    }
  },
  data() {
    return {
      visible: false,
      currentStudent: 0,
      eventData: [
        {
          id: '1',
          title: 'Областной конкурс',
          price: 10,
        },
        {
          id: '2',
          title: 'Региональный этап',
          price: 20,
        },
        {
          id: '3',
          title: 'Конкурс',
          price: 5,
        },
      ],
      messages: [],
      toast: useToast(),
      items: ref([
        {
          label: 'EditStudent',
          icon: 'pi pi-pencil',
          command: () => {
            this.showStudent(this.currentStudent);
          }
        },
        {
          label: 'DeleteStudent',
          icon: 'pi pi-trash',
          command: () => {
            this.deleteStudent(this.currentStudent);
          }
        },
        {
          label: 'ShowStudent',
          icon: 'pi pi-info-circle',
          command: () => {
            this.showStudent(this.currentStudent);
          }
        },
      ]),
      confirm: useConfirm(),
    }
  }
}
</script>
<template>
  <div class='dataItem'>
    <Toast/>
    <ConfirmDialog></ConfirmDialog>
    <div class="tabWrapper">
      <h1>Добавление/Редактирование/Просмотр данных</h1>
      <TabView>
        <TabPanel header="Студенты">
          <DataTable :value="studentData" stripedRows tableStyle="min-width: 50rem">
            <Column field="id" header="id" headerStyle="justify-content:center; vertical-align:middle"
                    bodyStyle="text-align:center; vertical-align:middle"></Column>
            <Column field="value" header="Шифр" headerStyle="justify-content:center; vertical-align:middle"
                    bodyStyle="text-align:center; vertical-align: middle"></Column>
            <Column style="min-width: 1rem" bodyStyle="text-align:center">
              <template #body="{data}">
                <SpeedDial @click="setCurrentStudent(data)" :model="items" buttonClass="p-button-outlined"
                           showIcon="pi pi-bars"
                           :radius="70" type="circle" hideIcon="pi pi-times"/>
              </template>
            </Column>
          </DataTable>
        </TabPanel>
        <TabPanel header="Мероприятия">
          <table class="table table-striped table-hover">
            <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Название мероприятия</th>
              <th scope="col">*Ценность</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="event in eventData" :key="event.id">
              <th scope="row">{{ event.id }}</th>
              <td>{{ event.title }}</td>
              <td>{{ event.price }}</td>
              <td>
                <div class='editBtn'>
                  <div title="Просмотр">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                         fill="currentColor"
                         class="bi bi-info-circle" viewBox="0 0 16 16">
                      <path
                          d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      <path
                          d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                    </svg>
                  </div>
                  <div title="Редактирование">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                         fill="currentColor"
                         class="bi bi-pencil" viewBox="0 0 16 16">
                      <path
                          d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                    </svg>
                  </div>
                  <div title="Удаление">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red"
                         class="bi bi-trash3" viewBox="0 0 16 16">
                      <path
                          d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                    </svg>
                  </div>
                </div>
              </td>
            </tr>
            </tbody>
          </table>
        </TabPanel>
      </TabView>
    </div>
    <!--show student modal-->
    <Dialog v-model:visible="visible" modal header="Подробная информация о студенте" :style="{ width: '50vw' }">
      <ShowStudent :currentStudent="currentStudent"/>
    </Dialog>
  </div>
</template>

<style>
body {
  background-color: #eaeef3;
}

.dataItem {

}

.dataItem h1 {
  text-align: center;
  margin: 30px;
}

.tabWrapper {
  background-color: white;
  padding: 20px;
  border-radius: 12px
}

/*.editBtn {*/
/*  text-align: center;*/
/*  display: flex;*/
/*  justify-content: space-around;*/
/*}*/

/*.editBtn div {*/
/*  display: flex;*/
/*  cursor: pointer;*/
/*}*/

tr {
  height: 100px;
}

th div {
  justify-content: center;
}

td {
  text-align: center;
}
</style>