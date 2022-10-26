<template>
  <SlotComponent>
    <template v-slot:default>
      <h1>Arroz</h1>
    </template>
    <!-- <template #default>Arroz</template> -->
  </SlotComponent>

  <ul>
    <li v-for="(item, index) in array" :key="index" ref="li">item</li>
  </ul>
</template>

<script>
import SlotComponent from "@/components/SlotComponent";

export default {
  components: { SlotComponent },
  data() {
    return {
      array: [1, 2, 3],
    };
  },
  mounted() {
    console.log(this.$refs.li);
  },
};
</script>
