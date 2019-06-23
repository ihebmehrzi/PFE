<template>
  <div>
    <h1>Update A Reservation</h1>
    <form @submit.prevent="updateReservation">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Reference reservation:</label>
            <input type="text" class="form-control" v-model="reservation.ref_reservation">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Date prise en charge:</label>
            <input type="text" class="form-control" v-model="reservation.date_prise_en_charge">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Lieu pris en charge:</label>
            <input type="text" class="form-control" v-model="reservation.lieu_pris_en_charge">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Livraison:</label>
            <input type="text" class="form-control" v-model="reservation.livraison">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>etat:</label>
            <input type="text" class="form-control" v-model="reservation.etat">
          </div>
        </div>
      </div>
      <br>
      <div class="form-group">
        <button class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      reservation: {}
    };
  },
  methods: {
    updateReservation() {
      this.axios
        .patch(`api/reservations/${this.$route.params.id}`, this.reservation)
        .then(response => {
          this.$router.push({ name: "listR" });
        });
    }
  },
  created() {
    this.axios
      .get(`api/reservations/${this.$route.params.id}/edit`)
      .then(response => {
        this.reservation = response.data;
      });
  }
};
</script>