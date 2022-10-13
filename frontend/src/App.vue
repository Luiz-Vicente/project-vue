<template>
  <div>
    <NavComponent />
    <router-view></router-view>
  </div>
</template>

<script>
import NavComponent from '@/components/NavComponent';
export default {
  components: { NavComponent },
};
</script>
