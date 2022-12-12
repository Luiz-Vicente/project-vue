<template>
  <div>
    <router-link class="mx-2" to="/">Home</router-link>
    <router-link class="mx-2" to="/search">Search</router-link>
    <router-link class="mx-2" to="/list">List</router-link>
    <router-link class="mx-2" to="/user/create">User create</router-link>
  </div>
</template>

<script>
export default {
  name: "NavComponent",
};
</script>
