<template>
  <h1>Search</h1>
  <input v-model="searchUser" type="text" v-on:keyup="search" />
  <ul>
    <template v-for="(user, index) in users" :key="index">
      <li>{{ user.firstName }}</li>
    </template>
  </ul>
  <p v-if="userNotFound">Nenhum usuário encontrado</p>
</template>

<script>
import http from "@/services/http.js";
import _ from "lodash";

export default {
  data() {
    return {
      searchUser: "",
      users: null,
      loading: true,
    };
  },
  computed: {
    userNotFound() {
      if (!this.loading && this.users?.length <= 0) {
        return false;
      }
      return true;
    }
  },
  methods: {
    search: _.debounce(async function (event) {
      try {
        const { data } = await http.get("api/users/search", {
          params: {
            user: event.target.value,
          },
        });
        this.users = data;
      } catch (error) {
        console.log(error.response.data);
      }
    }, 1000),

    async getUsers() {
      try {
        const { data } = await http.get("api/users");
        this.users = data;
        this.loading = false;
      } catch (error) {
        console.log(error.response.data);
      }
    }
  },
  mounted() {
    this.getUsers();
  },
};
</script>
