<template>
  <SlotComponent>
    <template v-slot:default>
      <h1>Arroz</h1>
    </template>
    <!-- <template #default>Arroz</template> -->
  </SlotComponent>
</template>

<script>
import SlotComponent from "@/components/SlotComponent";

export default {
  components: { SlotComponent },
};
</script>
