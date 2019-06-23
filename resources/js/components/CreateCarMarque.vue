<template>
  <div>
    <h1>Create A Car Marque</h1>
    <form @submit.prevent="addMarque">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Reference marque:</label>
            <input type="text" class="form-control" v-model="marqueCar.id_marque" name="id_marque">
            <span v-if="errors.id_marque" class="text-danger">{{errors.id_marque[0]}}</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>nom marque:</label>
            <input
              type="text"
              class="form-control"
              v-model="marqueCar.nom_marque"
              name="nom_marque"
            >
            <span v-if="errors.nom_marque" class="text-danger">{{errors.nom_marque[0]}}</span>
          </div>
        </div>
      </div>

      <div class="form-group">
        <button class="btn btn-primary">Create</button>
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
    addMarque() {
      this.errors = [];
      this.axios
        .post("api/marque", this.marqueCar)
        .then(response => {
          Vue.swal({
            type: "success",
            title: "Marque added successfully"
          });
          this.$router.push({ name: "listMarque" });
        })
        .catch(error => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;
          }
        });
    }
  }
};
</script>