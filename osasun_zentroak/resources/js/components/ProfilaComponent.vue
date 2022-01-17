<template>
  <div class="background">
    <form class="form">
      <div class="irudia">
        <img src="persona.png">
      </div>
      <div class="izena-gustokoenak">
        <h2 class="izena">SARAY</h2>
        <input type="button" id="btn-gustokoenak" class="btn btn-warning btn-lg" value="Gustokoenak" />
      </div>
      <div class="email-container">
        <h3 class="email-text">Email:</h3>
        <input type="email" class="email" placeholder="saray@gmail.com" />
      </div>
      <div class="aldatu">
        <input type="button" id="btn-aldatu" class="btn btn-secondary btn-sm" value="Aldatu pasahitza" />
      </div>
    </form>
  </div>
</template>

<script>
export default {

  mounted() {
    console.log("Component mounted.");
  },
};
</script>
