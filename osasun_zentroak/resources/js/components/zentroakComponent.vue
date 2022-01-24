<template>
  <div class="d-flex justify-content-center">
    <div class="container row">
      <div v-if="centros.length == 0" class="d-flex gap-3 justify-content-center align-items-center">
        <div class="spinner-border text-secondary" role="status">
          <span class="visually-hidden">Kargatzen...</span>
        </div>
        <span class="text-muted">Osasun zentroak bilatzen</span>
      </div>

      <div v-if="centros.length > 0" class="mb-5">
        <div class="col-lg-10 col-md-5 rounded mt-5 shadow-lg p-3">
          <br>

          <div class="d-flex text-muted">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
            <h5>&nbsp;&nbsp;IRAGAZKIAK</h5>
          </div>
          <hr>
          <h5 class="text-primary">&nbsp;&nbsp;IZENA</h5>
          <input v-model="sartutakoIzena" type="text" id="txtBusqueda" name="txtBusqueda" placeholder="Zentroaren izena..." title="Izen bat idatzi" class="form-control mb-3">
          <hr>
          <h5 class="text-primary">&nbsp;&nbsp;ZENTRO MOTA</h5>
          <select v-model="tipodecentro" id="filtro-tipo" class="form-select">
            <option default selected value=""> -- Aukeratu mota -- </option>
            <option value="Anbulatorioa">Anbulatorioa</option>
            <option value="Osasun-zentroa">Osasun zentroa</option>
            <option value="Osasun mentaleko zentroa">Osasun mentaleko zentroa</option>
            <option value="Ospitalea">Ospitalea</option>
            <option value="Beste batzuk">Beste batzuk</option>
          </select>
          <hr>
          <h5 class="text-primary">&nbsp;&nbsp;PROBINTZIA</h5>
          <select v-model="provincia" id="filtro-provincia" class="form-select">
            <option default selected value=""> -- Aukeratu probintzia -- </option>
            <option value="Bizkaia">Bizkaia</option>
            <option value="Gipuzkoa">Gipuzkoa</option>
            <option value="Araba">Araba</option>
          </select>
      </div>
    </div>
  </div>
      

      <div id="centros" class="col-lg-9 col-md-8 d-flex flex-wrap rounded my-5 p-3">
        <div v-for="(centro, index) in filteredCentros" v-bind:key="index" class="centro">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" v-if="centro.Zentromota === 'Anbulatorioa'" src="ambulatorio.jpg" heigth="100px" width="100px">
            <img class="card-img-top" v-else-if="centro.Zentromota === 'Beste batzuk'" src="otros2.jpg" heigth="100px" width="100px">
            <img class="card-img-top" v-else-if="centro.Zentromota === 'Kontsultategia'" src="consultorio.jpg" heigth="100px" width="100px">
            <img class="card-img-top" v-else-if="centro.Zentromota === 'Osasun Zentroa' || centro.Zentromota === 'Osasun-zentroa'" src="centro-de-salud.png" heigth="100px" width="100px">
            <img class="card-img-top" v-else-if="centro.Zentromota === 'Osasun mentaleko zentroa'" src="centro-salud-mental.jpg" heigth="100px" width="100px">
            <img class="card-img-top" v-else-if="centro.Zentromota === 'Ospitalea'" src="hospital.jpg" heigth="100px" width="100px">
            <div class="card-body">
              <h5 class="card-title text-primary">{{ centro.Izena }}</h5>
              <p class="card-text"><b>{{ centro.Zentromota }}</b><br>{{ centro.Udalerria }}, {{ centro.Probintzia }}</p>
              <a v-bind:href="'http://127.0.0.1:8000/informazioa?zentroa=' + centro.Zentroarenkodea" class="btn btn-primary">Ikusi</a>
            </div>
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
    if (urlParams.get("probintzia"))
      this.provincia = urlParams.get("probintzia");
    if (urlParams.get("mota"))
      this.tipodecentro = urlParams.get("mota");
    this.getCentros();
  },

  data: () => ({
    title: "Euskadiko osasun zentroak",
    centros: [],
    provincia: "",    
    tipodecentro: "",
    sartutakoIzena: ""
  }),

  computed: {

    filteredCentros() {
      let arrEmaitza = this.searchByName();

      if (this.provincia.length > 0) {
        arrEmaitza = this.searchByProbintzia(arrEmaitza);
      }
      if (this.tipodecentro.length > 0) {
        arrEmaitza = this.searchByMota(arrEmaitza);
      }

      return arrEmaitza;
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
    },
    searchByName() {
      if(this.sartutakoIzena.length > 0){
        return this.centros.filter((centro) => centro.Izena.toLowerCase().includes(this.sartutakoIzena.toLowerCase()));
      }else{
        return this.centros;
      }
    },
    searchByMota(arrayDeResultadosRecibidos) {
      return arrayDeResultadosRecibidos.filter((centro) => centro.Zentromota.toLowerCase().includes(this.tipodecentro.toLowerCase())).concat(arrayDeResultadosRecibidos.filter((centro) => centro.Zentromota.includes("Osasun Zentroa")));

      // return arrayDeResultadosRecibidos.filter((centro) => centro.Zentromota.toLowerCase().includes(this.tipodecentro.toLowerCase()));

    },
    searchByProbintzia(arrayDeResultadosRecibidos) {
      return arrayDeResultadosRecibidos.filter((centro) => centro.Probintzia.toLowerCase().includes(this.provincia.toLowerCase()));
    },
    getParams() {
      var parser = document.createElement('a');
      parser.href = window.location.href;
      var query = parser.search.substring(1);
      var value = query.split('=');
      return value[1];
    }

  }

};

</script>