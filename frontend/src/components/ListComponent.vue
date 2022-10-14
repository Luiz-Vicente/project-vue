<template>
  <ul>
    <slot v-for="(item, index) in list" :key="index" v-bind:item="item"></slot>
  </ul>
</template>

<script>
export default {
  data() {
    return {
      list: [1, 2, 3],
    };
  },
};
</script>
