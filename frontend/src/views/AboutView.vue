<template>
  <div>
    <h1>List</h1>
    <!-- <ListComponent v-slot="{ item }"></ListComponent> -->
    <ListComponent v-slot="props">
      <li>{{ props.item }}</li>
    </ListComponent>
  </div>
</template>

<script>
import ListComponent from "@/components/ListComponent";

export default {
  components: { ListComponent },
};
</script>
