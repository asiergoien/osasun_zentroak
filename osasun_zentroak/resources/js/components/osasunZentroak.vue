<template>
  <div>

    <div v-if="centros.length == 0" class="d-flex gap-3 justify-content-center align-items-center">
      <div class="spinner-border text-secondary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
      <span class="text-muted">Buscando centros</span>
    </div>

    <div v-if="provincia.length > 0">
      <h4>Centros de salud de '{{ provincia }}'</h4>
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

    <div class="centros">
      <div v-for="(centro, index) in filteredCentros" v-bind:key="index" class="hotel shadow-sm">
        <span class="title">{{ centro.Nombre }}</span>
        <ul>
        <li>{{ centro.Municipio }}, {{ centro.Provincia }}</li>
        <li>{{ centro.Telefono }}</li>
        </ul>
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
    title: "Centros de salud de euskadi",
    centros: [],
    likes: [],
    provincia: ""
  }),

  computed: {

    filteredCentros() {
      if (this.provincia.length > 0) {
        return this.centros.filter(centro => {
          return centro.Municipio.toLowerCase().includes(this.provincia)
            || centro.Territorio.toLowerCase().includes(this.provincia);
        });
      } else {
        return this.centros;
      }
    }

  },

  methods: {

    getCentros() {
      delete axios.defaults.headers.common['X-Requested-With'];
      const URL = "https://opendata.euskadi.eus/contenidos/ds_localizaciones/centros_salud_en_euskadi/opendata/centros-salud.json";
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
