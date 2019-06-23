<template>
  <div class="rq-page-content">
    <div class="rq-content-block gray-bg small-padding-top">
      <div class="container">
        <div class="rq-listing-top-bar-filter-option">
          <div class="filter-list">
            <h5>Filter by</h5>
            <div class="filter-single">
              <div class="btn-group">
                <button
                  type="button"
                  class="btn btn-default dropdown-toggle"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  Brand
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li>
                    <span class="rq-checkbox">
                      <input type="checkbox" id="brand-one">
                      <label for="brand-one">Ford Shelby</label>
                    </span>
                  </li>
                  <li>
                    <span class="rq-checkbox">
                      <input type="checkbox" id="brand-two">
                      <label for="brand-two">BMW M6 Gran</label>
                    </span>
                  </li>
                  <li>
                    <span class="rq-checkbox">
                      <input type="checkbox" id="brand-three">
                      <label for="brand-three">AUDI R8 2011</label>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="filter-single">
              <div class="btn-group">
                <button
                  type="button"
                  class="btn btn-default dropdown-toggle"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  Class
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li>
                    <span class="rq-checkbox">
                      <input type="checkbox" id="class-a">
                      <label for="class-a">A class</label>
                    </span>
                  </li>
                  <li>
                    <span class="rq-checkbox">
                      <input type="checkbox" id="class-b">
                      <label for="class-b">B class</label>
                    </span>
                  </li>
                  <li>
                    <span class="rq-checkbox">
                      <input type="checkbox" id="class-c">
                      <label for="class-c">C class</label>
                    </span>
                  </li>
                  <li>
                    <span class="rq-checkbox">
                      <input type="checkbox" id="class-d">
                      <label for="class-d">D class</label>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="filter-single">
              <div class="btn-group">
                <button
                  type="button"
                  class="btn btn-default dropdown-toggle"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  Fuel
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li>
                    <span class="rq-checkbox">
                      <input type="checkbox" id="fule-one">
                      <label for="fule-one">50 liter</label>
                    </span>
                  </li>
                  <li>
                    <span class="rq-checkbox">
                      <input type="checkbox" id="fuel-two">
                      <label for="fuel-two">100 liter</label>
                    </span>
                  </li>
                  <li>
                    <span class="rq-checkbox">
                      <input type="checkbox" id="fuel-three">
                      <label for="fuel-three">120 liter</label>
                    </span>
                  </li>
                  <li>
                    <span class="rq-checkbox">
                      <input type="checkbox" id="fuel-four">
                      <label for="fuel-four">130 liter</label>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="filter-single">
              <div class="btn-group">
                <button
                  type="button"
                  class="btn btn-default dropdown-toggle"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  Price
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li>
                    <div class="rq-pricing-slider">
                      <div id="slider-range"></div>
                      <p>
                        <label for="amount">range:</label>
                        <input type="text" id="amount">
                      </p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <input
            @keyup="getAllVoitures"
            type="text"
            name="search"
            v-model="search"
            placeholder="Search.."
          >

          <div class="rq-grid-list-view-option">
            <a href="#" data-class="rq-listing-grid">
              <i class="ion-grid"></i>
            </a>
            <a class="active" href="#" data-class="rq-listing-list">
              <i class="ion-navicon"></i>
            </a>
          </div>
        </div>
        <div class="rq-car-listing-wrapper">
          <div class="rq-listing-choose rq-listing-list">
            <div class="row">
              <div class="topnav"></div>

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card-columns">
                  <div class="listing-single" v-for="voiture in voitures" :key="voiture.id">
                    <div class="listing-img">
                      <img
                        v-bind:src="/images/ + voiture.photo"
                        alt="image"
                        class="card-img-top"
                        width="300"
                        height="300"
                      >
                    </div>
                    <div class="listing-details">
                      <h5 class="car-brand">FORD</h5>
                      <h3 class="car-name">
                        <a href="#">{{voiture.marques.nom_marque}}</a>
                      </h3>
                      <ul class="rating-list">
                        <li>
                          <i class="ion-star"></i>
                        </li>
                        <li>
                          <i class="ion-star"></i>
                        </li>
                        <li>
                          <i class="ion-star"></i>
                        </li>
                        <li>
                          <i class="ion-star"></i>
                        </li>
                        <li>
                          <i class="ion-star"></i>
                        </li>
                      </ul>
                      <ul>
                        <li>
                          Matricule:
                          <span>{{voiture.v_matricule}}</span>
                        </li>
                        <li>
                          Kilometrage:
                          <span>{{voiture.kilometrage}}</span>
                        </li>
                        <li>
                          Couleur:
                          <span>{{voiture.couleur}}</span>
                        </li>
                        <li>
                          Disponibilite:
                          <span>{{voiture.disponibilite}}</span>
                        </li>
                        <li>
                          <b>Marque</b>
                          <span>{{voiture.marques.nom_marque}}</span>
                        </li>
                      </ul>
                      <div class="listing-footer">
                        <!--<span><a href="#">Details</a></span>-->
                        <span>
                          <li>
                            <router-link
                              :to="{name: 'details', params: { id: voiture.id }}"
                              class="nav-link"
                            >Details</router-link>
                          </li>
                        </span>

                        <!--<router-link :to="{name: 'details', params: { id: voiture.id }}" > Details</router-link>-->

                        <span>
                          Starting at
                          <span class="price">{{voiture.prix}}DT</span> / day
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- <div class="pagination">
                    <button class="btn btn-default" v-on:click="fetchPaginateUsers(pagination.prev_page_url)" :disabled="!pagination.prev_page_url">
                        <i class="arrow_left"></i>Previous</button>
                    <span>  Page {{pagination.current_page}} of {{pagination.last_page}}    </span>
                    <button class="btn btn-default" v-on:click="fetchPaginateUsers(pagination.next_page_url)"  :disabled="!pagination.next_page_url">
                        Next<i class="arrow_right"></i></button>
        </div>-->
      </div>
    </div>
    <!-- /.rq-content-block -->
  </div>
</template>
<script>
export default {
  data() {
    return {
      voitures: {},
      url: "api/cars",
      url1: "api/marque",
      marque: {},
      search: ""
    };
  },
  methods: {
    getAllVoitures() {
      this.axios.get(`${this.url}?search=${this.search}`).then(response => {
        this.voitures = response.data.data;
        this.makePagination(response.data);
        console.log(response.data);
        // console.log(response.data[0]['marques']);
      });
    },
    deleteCar(id) {
      Swal.fire({
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

            Swal.fire("Car Deleted!", "Your file has been deleted.", "success");
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
    },

    getMarques() {
      this.axios.get(`${this.url1}?search=${this.search}`).then(response => {
        this.marquesCar = response.data.data;
      });
    }
  },
  created() {
    this.getAllVoitures();
    this.getMarques();

    // console.log("cars ",this.voitures);
  }
};
</script>