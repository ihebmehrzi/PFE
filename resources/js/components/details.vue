<template>
  <div id="app">
    <center>
      <div class="rq-car-listing-wrapper">
        <div class="rq-listing-choose rq-listing-list">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="card-columns">
                <div class="listing-single">
                  <div class="listing-img">
                    <img
                      v-bind:src="/images/ + voiture.photo"
                      alt="image"
                      class="card-img-top"
                      width="300"
                      height="300"
                    >
                  </div>
                  <div class="listing-details">
                    <h5 class="car-brand">FORD</h5>
                    <h3 class="car-name">
                      <a href="#">{{voiture.marques.nom_marque}}</a>
                    </h3>

                    <ul>
                      <li>
                        Matricule:
                        <span>{{voiture.v_matricule}}</span>
                      </li>
                      <li>
                        Kilometrage:
                        <span>{{voiture.kilometrage}}</span>
                      </li>
                      <li>
                        Couleur:
                        <span>{{voiture.couleur}}</span>
                      </li>
                      <li>
                        Disponibilite:
                        <span>{{voiture.disponibilite}}</span>
                      </li>
                      <!--<li>Disponibilite: <span>{{voiture.marques.nom_marque}}</span></li>-->
                      <!--<li><b>Marque</b> <span>{{voiture.marques.nom_marque}}</span></li>-->
                    </ul>
                    <ul>
                      <li>Description:</li>
                      <td>{{voiture.description}}</td>
                    </ul>
                    <div class="listing-footer">
                      <!--<span><a href="#">Details</a></span>-->

                      <span>
                        Starting at
                        <span class="price">{{voiture.prix}}DT</span> / day
                      </span>

                      <span>
                        <li>
                          <router-link
                            :to="{name: 'createR', params: { id: voiture.id }}"
                            class="nav-link"
                          >Reserver</router-link>
                        </li>
                      </span>

                      <!--<span><li>-->
                      <!--<router-link :to="{name: 'details', params: { id: voiture.id }}"> Réserver</router-link></li></span>-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </center>
  </div>
</template>
<script>
export default {
  data() {
    return {
      voiture: {},
      //  voitures:[],
      errors: [],
      marque: {}
    };
  },

  methods: {
    ShowCar() {
      this.axios.get(`api/cars/${this.$route.params.id}`).then(response => {
        this.voiture = response.data;
        console.log(response.data);
      });
    }
  },
  created() {
    this.ShowCar();
    console.log(this.voiture);
  }
};
</script>