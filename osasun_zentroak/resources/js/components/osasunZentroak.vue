<template>
  <div>

    <div v-if="centros.length == 0" class="d-flex gap-3 justify-content-center align-items-center">
      <div class="spinner-border text-secondary" role="status">
        <span class="visually-hidden">Kargatzen...</span>
      </div>
      <span class="text-muted">Osasun zentroak bilatzen</span>
    </div>

    <div v-if="provincia.length > 0">
      <h4>'{{ provincia }}' -ko osasun zentroak</h4>
      <p class="text-muted">{{ filteredCentros.length }} centros encontrados</p>
    </div>

    <div v-if="centros.length > 0" class="mb-5">
      <input id="filtro-nombre" type="text" class="form-control">
      <div class="d-flex gap-3 mt-3">
        <select id="filtro-provincia" class="form-select">
          <option value="bizkaia">Bizkaia</option>
          <option value="gipuzkoa">Gipuzkoa</option>
          <option value="araba">Araba</option>
        </select>
        <select id="filtro-tipo" class="form-select">
          <option value="bizkaia">Bizkaia</option>
          <option value="gipuzkoa">Gipuzkoa</option>
          <option value="araba">Araba</option>
        </select>
      </div>
    </div>

    <div class="centro">
      <div v-for="(centro, index) in filteredCentros" v-bind:key="index" class="hotel shadow-sm">
        <div class="card">
          <h5 class="card-header">{{ centro.Zentromota }}</h5>
          <div class="card-body">
            <h5 class="card-title">{{ centro.Izena }}</h5>
            <p class="card-text">{{ centro.Udalerria }}, {{ centro.Probintzia }}</p>
            <a href="#" class="btn btn-primary">Ikusi</a>
          </div>
        </div>
      </div>
    </div>

  </div>

</template>

<script>

export default {

  mounted() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get("provincia"))
      this.provincia = urlParams.get("provincia").toLowerCase();
    this.getCentros();
  },

  data: () => ({
    title: "Euskadiko osasun zentroak",
    centros: [],
    likes: [],
    provincia: ""
  }),

  computed: {

    filteredCentros() {
      if (this.provincia.length > 0) {
        return this.centros.filter(centro => {
          return centro.Udalerria.toLowerCase().includes(this.provincia)
            || centro.Eskualdea.toLowerCase().includes(this.provincia);
        });
      } else {
        return this.centros;
      }
    }

  },

  methods: {

    getCentros() {
      delete axios.defaults.headers.common['X-Requested-With'];
      // const URL = "https://opendata.euskadi.eus/contenidos/ds_localizaciones/centros_salud_en_euskadi/opendata/centros-salud.json";
      const URL = "https://opendata.euskadi.eus/contenidos/ds_localizaciones/centros_salud_en_euskadi/opendata/osasun-zentroak.json";
      axios.get(URL).then((response) => {
        let data = new String(response.data).replace("jsonCallback(", "").replace(");", "");
        this.centros = JSON.parse(data); 
        for (let i = 0; i < this.centros.length; i++) {
          this.centros[i].id = i;
        }
      });
    }

  }

};

</script>