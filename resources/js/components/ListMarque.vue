<template>
  <div>
    <h1>Marques</h1>
    <div class="row">
      <div class="col-md-10"></div>
      <div class="col-md-2">
        <router-link :to="{ name: 'createCarMarque' }" class="btn btn-primary">Create Marque</router-link>
      </div>
    </div>
    <br>
    <input @keyup="getAll" type="text" class="form-control" name="search" v-model="search">

    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Reference Marque</th>
          <th>Name Marque</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="marqueCar in marquesCar" :key="marqueCar.id">
          <td>{{marqueCar.id}}</td>
          <td>{{marqueCar.id_marque}}</td>
          <td>{{marqueCar.nom_marque}}</td>
          <td>
            <router-link
              :to="{name: 'editCarMarque', params: { id: marqueCar.id }}"
              class="btn btn-primary"
            >Edit</router-link>
            <button class="btn btn-danger" @click.prevent="deleteModel(marqueCar.id)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>

    <div class="pagination">
      <button
        class="btn btn-default"
        v-on:click="fetchPaginateUsers(pagination.prev_page_url)"
        :disabled="!pagination.prev_page_url"
      >Previous</button>

      <span>&nbsp;Page {{pagination.current_page}} of {{pagination.last_page}} &nbsp;</span>

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
      marquesCar: [],
      url: "api/marque",
      pagination: [],
      search: ""
    };
  },
  methods: {
    // test(){
    //     console.log('test');
    // },
    getAll() {
      this.axios.get(`${this.url}?search=${this.search}`).then(response => {
        this.marquesCar = response.data.data;
        this.makePagination(response.data);
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
          this.axios.delete("api/marque/" + id).then(response => {
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

    fetchPaginateUsers(url) {
      this.url = url;
      this.getAll();
    }
  },
  created() {
    this.getAll();
  }
};
</script>