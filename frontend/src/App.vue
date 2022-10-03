<template>
  <div id="app">
    <li v-for="(user, index) in users" v-bind:key="index">
      {{ user.firstName }}
    </li>
  </div>
</template>

<script>
import http from "@/services/http";

export default {
  data() {
    return {
      users: [],
    };
  },

  async mounted() {
    try {
      const { data } = await http.get("/api/users");
      this.users = data;
    } catch (error) {
      console.log(error);
    }
  },
};
</script>
