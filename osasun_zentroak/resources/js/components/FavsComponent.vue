<template>

    <div id="centros" class="col-lg-9 col-md-8 d-flex flex-wrap rounded my-5 p-5">
        <div v-for="(centro, index) in filteredCentros" v-bind:key="index" class="centro">
            <div v-if="centro.Zentroarenkodea === ''">
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
</template>


 <script>


export default {

  props: ['favs'],
  mounted() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get("probintzia"))
      this.provincia = urlParams.get("probintzia");
    this.getCentros();
    // const favoritos = (this.favs);
    // console.log(favoritos);
    this.getfavs();
  },

  data: () => ({
    title: "Zentro gustokoenak",
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
    },

    getfavs() {
      let favoritos = (this.favs);
      const arrayFavs = favoritos.split("/");
      // console.log(arrayFavs);
      let arrayLength = arrayFavs.length;
      // console.log(arrayLength);

      for (var i = 0; i < arrayLength; i++) {
        console.log(arrayFavs[i]);
      }
    }
  }
};

</script>
