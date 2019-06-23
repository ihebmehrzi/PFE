<template>
  <div>
    <h1>Update A Car Marque</h1>
    <form @submit.prevent="updateCarMarque">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Reference Marque:</label>
            <input type="text" class="form-control" v-model="marqueCar.id_marque">
            <span v-if="errors.id_marque" class="text-danger">{{errors.id_marque[0]}}</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Nom Marque:</label>
            <input type="text" class="form-control" v-model="marqueCar.nom_marque">
            <span v-if="errors.nom_marque" class="text-danger">{{errors.nom_marque[0]}}</span>
          </div>
        </div>
      </div>

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
      marqueCar: {},
      errors: []
    };
  },
  methods: {
    updateCarMarque() {
      this.errors = [];
      this.axios
        .patch(`api/marque/${this.$route.params.id}`, this.marqueCar)
        .then(response => {
          this.$router.push({ name: "listMarque" });
        })
        .catch(error => {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors;
          }
        });
    }
  },
  created() {
    this.axios
      .get(`api/marque/${this.$route.params.id}/edit`)
      .then(response => {
        this.marqueCar = response.data;
      });
  }
};
</script>