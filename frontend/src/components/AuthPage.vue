<script>
import axios from "axios";

export default {
  name: 'AuthPage',
  data() {
    return {
      login: '',
      password: '',
      response: ''
    }
  },
  methods: {

    async inputValue() {
      const data = {
        login: this.login,
        password: this.password,
      }

      let resp = await axios.post(
          'http://127.0.0.1:8000/api/v1/testValue',
          data)

      //     .then(res => res.status);
      // if (resp == 200) {
      //   this.$router.push('/adminPanel');
      // }
    }
  },
}
</script>
<template>
  <div class="title">
    <h1>
      ПИС "ИДС"
    </h1>
    <p>Програмно информационная система для оценки индивидуальных достижений студента</p>
  </div>
  <div class="authGroup">
    <img
        src="https://avatars.mds.yandex.net/i?id=44bbde9b114294ee5bc1a6488f408bb46fa7943e-9854613-images-thumbs&n=13"/>
    <div class="inputGroup">
      <p>Вход в систему</p>
      <input type="text" class="loginInput" placeholder="Логин" v-model="login"/>
      <input type="password" class="passInput" placeholder="Пароль" v-model="password"/>
      <div class="enterBtn" @click="inputValue()">Войти</div>
    </div>
  </div>
</template>

<style scoped>
.title {
  text-align: center;
}

.title h1 {
  font-weight: bold;
  font-size: 32px;
  margin: 50px 0;
}

.title p {
  margin-bottom: 50px;
}

.authGroup {
  padding: 0 100px;
  display: flex;
  justify-content: space-between;
  gap: 50px;
}

.inputGroup {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 60%;
  gap: 50px;
}

.inputGroup input {
  border: none;
  border-bottom: 1px black solid;
  font-size: 20px;
  width: 60%;
  background-color: #FFFFFF;
}

.inputGroup input:focus {
  outline: none;
  border-bottom: 2px #010162 solid
}

.enterBtn {
  background-color: #010162;
  color: white;
  width: 100px;
  height: 50px;
  border-radius: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.enterBtn:hover {
  cursor: pointer;
}
</style>
