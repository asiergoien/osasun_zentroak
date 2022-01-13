<template>
  <div class="container">
    <form class="form">
      <div class="izena-gustokoenak">
        <h2 class="izena">SARAY</h2>
        <input type="button" class="btn-gustokoenak" value="Gustokoenak" />
      </div>
      <div class="email-aldatu">
        <h3 class="email-text">Email:</h3>
        <input type="email" class="email" placeholder="saray@gmail.com" />
      </div>
      <div class="aldatu">
        <input type="button" class="btn-aldatu" value="Aldatu" />
      </div>
    </form>
  </div>
</template>

<script>
export default {
  components: {},
  mounted() {
    console.log("Component mounted.");
  },
};
</script>

<style scoped>
@media (max-width: 400px) {

  .izena-gustokoenak {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
  }
  .izena {

  }
  .btn-gustokoenak {
    width: 40%;
    height: 3rem;
    border-radius: 3px;
    border: orange solid 2px;
    background-color: rgb(252, 199, 102);
  }
  .email-aldatu {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
  }
  .email-text {
    /* margin-left: 8%; */
  }
  .email {
    border: lightgray solid 2px;
    border-radius: 2px;
    height: 40%;
    width: 43%;
    /* margin-left: 8%; */
  }
  .aldatu {
    display: flex;
    align-items: center;
    justify-content: right;
  }
  .btn-aldatu {
    margin-right: 10%;
    width: 30%;
    height: 1.5rem;
    border-radius: 3px;
    border: rgb(126, 120, 120) solid 2px;
    background-color: rgb(209, 200, 200);
  }
}
</style>
