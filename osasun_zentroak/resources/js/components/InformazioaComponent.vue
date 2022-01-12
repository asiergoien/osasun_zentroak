<template>
  <div>
      <button type="button" id="btnFav" class="btn btn-primary">Gogoko dut</button>
  </div>

</template>

<script>
import Button from '../../../vendor/laravel/jetstream/stubs/inertia/resources/js/Jetstream/Button.vue'
    export default {
  components: { Button },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
