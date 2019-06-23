<template>
  <div>
    <h1>Create A maitenancce</h1>
    <form @submit.prevent="addMaintenance">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>id_maintenance:</label>
            <input type="text" class="form-control" v-model="maintenanceCar.id_maintenance">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Ddesc_maintenance:</label>
            <input type="text" class="form-control" v-model="maintenanceCar.desc_maintenance">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>date_deb_maintenance:</label>
            <input type="text" class="form-control" v-model="maintenanceCar.date_deb_maintenance">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>date_fin_maintenance:</label>
            <input type="text" class="form-control" v-model="maintenanceCar.date_fin_maintenance">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>montant_maintenance:</label>
            <input type="text" class="form-control" v-model="maintenanceCar.montant_maintenance">
          </div>
        </div>
      </div>
      <br>
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
      maintenanceCar: {}
    };
  },
  methods: {
    addMaintenance() {
      this.axios
        .post("api/maintenances", this.maintenanceCar)
        .then(response => {
          this.$router.push({ name: "listM" });
        });
    },
    getall() {}
  }
};
</script>