<template>
  <form action="" v-on:submit.prevent="create">
    <input placeholder="First Name" type="text" v-model="user.firstName" />
    <p class="error" v-if="errors['firstName']">{{ errors["firstName"][0] }}</p>
    <input placeholder="Last Name" type="text" v-model="user.lastName" />
    <p class="error" v-if="errors['lastName']">{{ errors["lastName"][0] }}</p>
    <input placeholder="E-mail" type="email" v-model="user.email" />
    <p class="error" v-if="errors['email']">{{ errors["email"][0] }}</p>
    <input placeholder="Password" type="password" v-model="user.password" />
    <p class="error" v-if="errors['password']">{{ errors["password"][0] }}</p>
    <button type="submit">Create user</button>
  </form>
</template>

<script>
import http from "@/services/http";

export default {
  data() {
    return {
      user: {},
      errors: [],
    };
  },
  methods: {
    async create() {
      try {
        const { data } = await http.post("api/user", this.user);
        console.log(data);
      } catch (errors) {
        if (errors.response?.data) {
          this.errors = errors.response.data["errors"];
        }
      }
    },
  },
}
</script>

<style>
.error {
  color: red;
}
</style>