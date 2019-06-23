<template>
  <div>
    <h1>Create A Car</h1>
    <form @submit.prevent="addVoiture">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Voiture matricul:</label>
            <input
              type="text"
              class="form-control"
              v-model="voiture.v_matricule"
              name="v_matricule"
            >
            <span v-if="errors.v_matricule" class="text-danger">{{errors.v_matricule[0]}}</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>kilometrage:</label>
            <input
              type="text"
              class="form-control"
              v-model="voiture.kilometrage"
              name="kilometrage"
            >
            <span v-if="errors.kilometrage" class="text-danger">{{errors.kilometrage[0]}}</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>couleur:</label>
            <input type="text" class="form-control" v-model="voiture.couleur" name="couleur">
            <span v-if="errors.couleur" class="text-danger">{{errors.couleur[0]}}</span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Marques:</label>
            <select v-model="voiture.marque_id" class="form-control">
              <option disabled value selected="selected">Please select one</option>
              <option
                v-for="marque in marques"
                :key="marque.id"
                :value="marque.id"
              >{{marque.nom_marque}}</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Model:</label>
            <select class="form-control" v-model="voiture.marque_id">
              <option disabled value selected="selected">Please select one</option>
              <option
                v-for="model in modelsCar"
                :key="model.id"
                :value="model.id"
              >{{model.nom_model}}</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>prix:</label>
            <input type="text" class="form-control" v-model="voiture.prix" name="prix">
            <span v-if="errors.prix" class="text-danger">{{errors.prix[0]}}</span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Image:</label>
            <input type="file" multiple v-on:change="onFileChange" class="form-control">
          </div>
        </div>
      </div>
      <br>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>disponibilite:</label>
            <input
              type="text"
              class="form-control"
              v-model="voiture.disponibilite"
              name="disponibilite"
            >
            <span v-if="errors.disponibilite" class="text-danger">{{errors.disponibilite[0]}}</span>
          </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>description:</label>
            <input
              type="text"
              class="form-control"
              v-model="voiture.description"
              name="description"
            >
            <span v-if="errors.description" class="text-danger">{{errors.description[0]}}</span>
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
      voiture: {
        v_matricule: "",
        kilometrage: "",
        couleur: "",
        prix: "",
        // marques:{id_marque:'',nom_marque:''},
        photo: "",
        disponibilite: "",
        description: ""
      },

      photo: "",
      errors: [],
      marques: [],
      //   marque_id:''
      // marque:{id_marque:'',nom_marque:''}
      modelsCar: []
    };
  },
  methods: {
    getText() {
      this.axios.get("api/marque");
    },

    onFileChange(e) {
      console.log(e.target.files[0]);
      this.photo = e.target.files[0];
    },

    addVoiture(e) {
      this.errors = [];

      e.preventDefault();
      let currentObj = this;
      let v = this.voiture;

      let formData = new FormData();
      formData.append("photo", this.photo);
      formData.append("v_matricule", v.v_matricule);
      formData.append("kilometrage", v.kilometrage);
      formData.append("prix", v.prix);
      formData.append("couleur", v.couleur);
      formData.append("marque_id", v.marque_id);
      formData.append("disponibilite", v.disponibilite);
      formData.append("description", v.description);

      // console.log(this.voiture);
      this.axios
        .post("api/cars", formData)
        .then(response => {
          Vue.swal({
            type: "success",
            title: "Car added successfully"
          });

          this.$router.push({ name: "listV" });
        })
        .catch(error => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;
          }
        });
    },
    onChangeMarque(e) {
      this.axios.get("api/cars").then(response => {
        this.voitures = response.data;
        console.log(this.voitures);
      });
    }
  },
  created() {
    this.axios.get("api/marque").then(response => {
      this.marques = response.data.data;
    });
    this.axios.get("getModel/{id}").then(response => {
      this.modelsCar = response.data.data;
      console.log(this.modelsCar);
    });
  }
};
</script>