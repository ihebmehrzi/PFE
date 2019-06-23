<template>
  <div class="col-12 grid-margin">
    <div class="rq-contact-us-form-content">
      <div class="rq-car-listing-wrapper">
        <div class="rq-listing-choose rq-listing-list">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <br>
              <br>
              <form @submit.prevent="addReservation">
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group row">
                      <!--<label class="col-sm-3 col-form-label">car_id</label>-->
                      <div class="col-sm-9">
                        <input
                          type="hidden"
                          class="contact-form-input"
                          v-model="reservation.car_id=voiture.id"
                          placeholder="car_id"
                        >
                      </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                    <div class="form-group row">
                      <!--<label class="col-sm-3 col-form-label">Nom</label>-->
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="contact-form-input"
                          v-model="reservation.nom"
                          placeholder="Nom"
                          name="nom"
                        >
                        <span v-if="errors.nom" class="text-danger">{{errors.nom[0]}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                    <div class="form-group row">
                      <!--<label class="col-sm-3 col-form-label">Prenom</label>-->
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="contact-form-input"
                          v-model="reservation.prenom"
                          placeholder="Prenom"
                          name="prenom"
                        >
                        <span v-if="errors.prenom" class="text-danger">{{errors.prenom[0]}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group row">
                      <!--<label class="col-sm-3 col-form-label">date_pris_en_charge</label>-->
                      <div class="col-sm-9">
                        <input
                          class="contact-form-input"
                          v-model="reservation.date_pris_en_charge"
                          placeholder="date pris en charge"
                          type="date"
                          value="2018-07-22"
                          min="2018-01-01"
                          max="2018-12-31"
                          name="date_pris_en_charge"
                        >

                        <span
                          v-if="errors.date_pris_en_charge"
                          class="text-danger"
                        >{{errors.date_pris_en_charge[0]}}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-9">
                    <div class="form-group row">
                      <!--<label class="col-sm-3 col-form-label">date_fin_reservation</label>-->
                      <div class="col-sm-9">
                        <input
                          class="contact-form-input"
                          v-model="reservation.date_fin_reservation"
                          placeholder="date fin reservation"
                          type="date"
                          value="2018-07-22"
                          min="2018-01-01"
                          max="2018-12-31"
                          name="date_fin_reservation"
                        >
                        <span
                          v-if="errors.date_fin_reservation"
                          class="text-danger"
                        >{{errors.date_fin_reservation[0]}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group row">
                      <!--<label class="col-sm-3 col-form-label">tel</label>-->
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="contact-form-input"
                          v-model="reservation.tel"
                          placeholder="tel"
                          name="tel"
                        >
                        <span v-if="errors.tel" class="text-danger">{{errors.tel[0]}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group row">
                      <!--<label class="col-sm-3 col-form-label">email</label>-->
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="contact-form-input"
                          v-model="reservation.email"
                          placeholder="email"
                          name="email"
                        >
                        <span v-if="errors.email" class="text-danger">{{errors.email[0]}}</span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <button class="btn btn-primary" type="submit">Sauvegarder</button>
                  <br>
                  <div v-if="isDisplay">
                    <h3>Réservation effectué avec succès. Nous vous contacterons dans les plus brefs delais.</h3>
                  </div>
                </div>

                <!--//  <h1 v-if="!test">Vue est non ordi !</h1>-->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      reservation: {},
      voiture: {},
      test: false,
      isDisplay: false,
      errors: []
    };
  },
  methods: {
    addReservation() {
      this.errors = [];

      this.axios
        .post("api/reservations", this.reservation)
        .then(response => {})
        .catch(error => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;
          }
        });
    },

    getall() {}
  },
  created() {
    this.axios.get(`api/cars/${this.$route.params.id}`).then(response => {
      this.voiture = response.data;
    });
  }
};
</script>