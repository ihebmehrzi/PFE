<template>
  <div>
    <h1>Cars</h1>
    <div class="row">
      <div class="col-md-2">
        <router-link :to="{ name: 'createV' }" class="btn btn-primary">Create Car</router-link>
        <br>
      </div>

      <!--<div class="container">-->

      <!--<form action="/search" method="POST" role="search">-->

      <!--<div class="input-group">-->
      <!--<input type="text" class="form-control" name="q"-->
      <!--placeholder="Search users"> <span class="input-group-btn">-->
      <!--<button type="submit" class="btn btn-default">-->
      <!--<i class="fal fa-search"></i>-->
      <!--</button>-->
      <!--</span>-->
      <!--</div>-->
      <!--</form>-->
      <!--</div>-->
    </div>
    <br>
    <input type="text" class="form-control" name="search">

    <table class="table table-hover">
      <thead>
        <tr>
          <th>Matricule</th>
          <th>Kilometrage</th>
          <th>Couleur</th>
          <th>Prix</th>
          <th>Marque</th>
          <th>Disponibilite</th>
          <!--<th>description</th>-->
          <th>Photo</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="voiture in voitures" :key="voiture.id">
          <td>{{voiture.v_matricule}}</td>
          <td>{{voiture.kilometrage}}</td>
          <td>{{voiture.couleur}}</td>
          <td>{{voiture.prix}}</td>
          <td>{{voiture.marques.nom_marque}}</td>
          <td>{{voiture.disponibilite}}</td>

          <!--<td>{{voiture.caracterstique}}</td>-->
          <td>
            <img
              v-bind:src="/images/ + voiture.photo"
              alt="image"
              width="80px"
              height="80px"
              style="border-radius: 50%"
            >
          </td>

          <td>
            <router-link :to="{name: 'editCar', params: { id: voiture.id }}">
              <i class="far fa-edit"></i>
            </router-link>/
            <a href="#" @click.prevent="deleteCar(voiture.id)">
              <i class="fas fa-trash-alt"></i>
            </a>
          </td>
          <!--<td><router-link :to="{name: 'editCar', params: { id: voiture.id }}" class="btn btn-primary">Edit</router-link>-->

          <!--<button class="btn btn-danger" @click.prevent="deleteCar(voiture.id)">Delete</button></td>-->
        </tr>
      </tbody>
    </table>
    <br>

    <div class="pagination">
      <button
        class="btn btn-default"
        v-on:click="fetchPaginateUsers(pagination.prev_page_url)"
        :disabled="!pagination.prev_page_url"
      >Previous</button>

      <span>&nbsp; Page {{pagination.current_page}} of {{pagination.last_page}} &nbsp;</span>

      <button
        class="btn btn-default"
        v-on:click="fetchPaginateUsers(pagination.next_page_url)"
        :disabled="!pagination.next_page_url"
      >Next</button>
    </div>
  </div>
</template>


<script>
export default {
  data() {
    return {
      voitures: {},
      url: "api/cars",
      marque: {}
    };
  },
  methods: {
    getAllVoitures() {
      this.axios.get(this.url).then(response => {
        this.voitures = response.data.data;
        this.makePagination(response.data);
        console.log(response.data);
        // console.log(response.data[0]['marques']);
      });
    },

    deleteCar(id) {
      Vue.swal({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then(result => {
        if (result.value) {
          this.axios.delete("api/cars/" + id).then(response => {
            this.getAllVoitures();

            Vue.swal({
              type: "success",
              title: "Your file has been deleted."
            });
          });
        }
      });
    },
    makePagination(data) {
      let pagination = {
        current_page: data.current_page,
        last_page: data.last_page,
        next_page_url: data.next_page_url,
        prev_page_url: data.prev_page_url
      };
      this.pagination = pagination;
    },

    fetchPaginateUsers(url) {
      this.url = url;
      this.getAllVoitures();
    }
  },
  created() {
    this.getAllVoitures();
    this.axios.get("api/cars").then(response => {
      this.marquesCar = response.data.data;
    });

    console.log("cars ", this.voitures);
  }
};
</script>