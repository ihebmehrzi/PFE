<template></template>


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
            title: "Model added successfully"
          });

          this.$router.push({ name: "listModel" });
        })
        .catch(error => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;
          }
        });
    },
    addModel1() {
      this.errors = [];
      this.axios
        .post("api/modelCars", this.modelCar)
        .then(response => {
          Vue.swal({
            type: "success",
            title: "Model added successfully"
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