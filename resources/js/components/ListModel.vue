<template>
  <div>
    <h1>Models</h1>
    <div class="row">
      <div class="col-md-10"></div>
      <div class="col-md-2">
        <router-link :to="{ name: 'createModel' }" class="btn btn-primary">Create Model</router-link>
        <br>
      </div>
    </div>
    <br>

    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Reference model</th>
          <th>Name model</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="modelCars in modelsCar" :key="modelCars.id">
          <td>{{modelCars.id}}</td>
          <td>{{modelCars.id_model}}</td>
          <td>{{modelCars.nom_model}}</td>
          <!-- <td>{{modelCars.marque_model.nom_marque}}</td> -->
          <td>
            <router-link
              :to="{name: 'editModel', params: { id: modelCars.id }}"
              class="btn btn-primary"
            >Edit</router-link>
            <button class="btn btn-danger" @click.prevent="deleteModel(modelCars.id)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>

    <div class="pagination">
      <button
        class="btn btn-default"
        v-on:click="fetchPaginateCategories(pagination.prev_page_url)"
        :disabled="!pagination.prev_page_url"
      >Previous</button>

      <span>&nbsp; Page {{pagination.current_page}} of {{pagination.last_page}} &nbsp;</span>

      <button
        class="btn btn-default"
        v-on:click="fetchPaginateCategories(pagination.next_page_url)"
        :disabled="!pagination.next_page_url"
      >Next</button>
    </div>

    <div
      class="modal fade"
      id="test"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">...</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!--&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45; modaaaaaaaaaal -&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;-->

    <!--<div class="modal fade" id="addModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
    <!--<div class="modal-dialog" role="document">-->
    <!--<div class="modal-content">-->
    <!--<div class="modal-header">-->
    <!--<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
    <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
    <!--<span aria-hidden="true">&times;</span>-->
    <!--</button>-->
    <!--</div>-->
    <!--<div class="modal-body">-->
    <!--<form >-->
    <!--<div class="row">-->
    <!--<div class="col-md-6">-->
    <!--<div class="form-group">-->
    <!--<label>Reference model:</label>-->
    <!--<input type="text" class="form-control" v-model="modelCar.id_model" name="id_model">-->
    <!--<span v-if="errors.id_model" class="text-danger">{{errors.id_model[0]}}</span>-->
    <!--</div>-->
    <!--</div>-->
    <!--</div>-->

    <!--<div class="row">-->
    <!--<div class="col-md-6">-->
    <!--<div class="form-group">-->
    <!--<label>Marque:</label>-->
    <!--<select v-model="modelsCar.marque_id" class="form-control">-->
    <!--<option disabled value="" selected="selected">Please select one</option>-->
    <!--<option v-for="marque in marques" :key="marque.id" :value="marque.id">-->
    <!--{{marque.nom_marque}}-->
    <!--</option>-->

    <!--</select>-->
    <!--</div>-->
    <!--</div>-->
    <!--</div>-->

    <!--<div class="row">-->
    <!--<div class="col-md-6">-->
    <!--<div class="form-group">-->
    <!--<label>nom model:</label>-->
    <!--<input type="text" class="form-control" v-model="modelCar.nom_model" name="nom_model">-->
    <!--<span v-if="errors.nom_model" class="text-danger">{{errors.nom_model[0]}}</span>-->
    <!--</div>-->
    <!--</div>-->
    <!--</div>-->

    <!--<div class="modal-footer">-->
    <!--<button type="button" class="btn btn-primary"  data-dismiss="modal" @click.prevent="addModel">Create Model</button>-->
    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->

    <!--</div>-->
    <!--</form>-->
    <!--</div>-->

    <!--</div>-->
    <!--</div>-->
    <!--</div>-->

    <!--&lt;!&ndash;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45; modaaaaaaaaaal -&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&ndash;&gt;-->
  </div>
</template>

<script>
export default {
  data() {
    return {
      modelsCar: [],
      url: "api/modelCars",
      pagination: [],
      modelCar: {},
      errors: [],
      marques: []
    };
  },
  methods: {
    addModel() {
      this.errors = [];
      this.axios
        .post("api/modelCars", this.modelCar)
        .then(response => {
          Vue.swal({
            type: "success",
            title: "Model added succefully"
          });

          this.$router.push({ name: "listModel" });
        })
        .catch(error => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;
          }
        });
    },

    test() {
      console.log("test");
    },
    getAll() {
      this.axios.get(this.url).then(response => {
        this.modelsCar = response.data.data;
        this.makePagination(response.data);
        console.log(this.modelsCar);
      });
    },
    deleteModel(id) {
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
          this.axios.delete("api/modelCars/" + id).then(response => {
            this.getAll();

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

    fetchPaginateCategories(url) {
      this.url = url;
      this.getAll();
    }
  },

  created() {
    this.getAll();
    this.axios.get("api/marque").then(response => {
      this.marques = response.data.data;
    });
  }
};
</script>