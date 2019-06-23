<template>
  <div>
    <h1>Category</h1>
    <div class="row">
      <div class="col-md-10"></div>
      <div class="col-md-2">
        <router-link :to="{ name: 'createCarCategory' }" class="btn btn-primary">Create Category</router-link>
      </div>
    </div>
    <br>

    <input @keyup="getAll" type="text" class="form-control" name="search" v-model="search">

    <table class="table table-hover">
      <thead>
        <tr>
          <th>Reference Category</th>
          <th>Name Category</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="category in CategoyCar" :key="category.id">
          <td>{{category.id_categorie}}</td>
          <td>{{category.nom_categorie}}</td>
          <td>
            <router-link
              :to="{name: 'editCategory', params: { id: category.id }}"
              class="btn btn-primary"
            >Edit</router-link>
            <button class="btn btn-danger" @click.prevent="deleteModel(category.id)">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
    <br>

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
  </div>
</template>

<script>
export default {
  data() {
    return {
      CategoyCar: [],
      url: "api/category",
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
        this.CategoyCar = response.data.data;
        this.makePagination(response.data);
        console.log(this.CategoyCar);
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
          this.axios.delete("api/category/" + id).then(response => {
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
    this.axios.get("api/category").then(response => {
      this.marquesCar = response.data;
    });
  }
};
</script>