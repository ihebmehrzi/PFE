<template>
  <div class="rq-contact-us-form-content">
    <h1>Réservations</h1>
    <div class="row">
      <div class="col-md-10"></div>
      <div class="col-md-2">
        <!--<router-link :to="{ name: 'createR' }" class="btn btn-primary">Create Reservation</router-link>-->
      </div>
    </div>
    <br>

    <div style="overflow-x:auto;">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Réf Réservation</th>
            <th>Nom</th>

            <th>Date pris en charge</th>
            <th>Date fin reservation</th>
            <th>Tel</th>
            <th>Email</th>
            <th>Client</th>
            <th>Car Réservé</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="reservation in reservations" :key="reservation.id">
            <td>{{reservation.id}}</td>
            <td>{{reservation.nom}} {{reservation.prenom}}</td>

            <td>{{reservation.date_pris_en_charge}}</td>
            <td>{{reservation.date_fin_reservation}}</td>
            <td>{{reservation.tel}}</td>
            <td>{{reservation.email}}</td>
            <td>{{reservation.client_id}}</td>
            <td>{{reservation.cars.v_matricule}}</td>
            <td>
              <router-link
                :to="{name: 'ConfirmReservation', params:{ id: reservation.id }}"
                class="btn btn-primary"
              >
                <span class="menu-title">Confirmer</span>
              </router-link>
              <button class="btn btn-danger" @click.prevent>Annuler</button>
            </td>
            <!--<td><router-link :to="{name: 'editR', params: { id: reservation.id }}" class="btn btn-primary">Edit</router-link>-->
            <!--<button class="btn btn-danger" @click.prevent="deleteReservation(reservation.id)">Delete</button></td>-->
          </tr>
        </tbody>
      </table>
    </div>
    <br>
    <br>
    <div class="pagination">
      <button
        class="btn btn-default"
        v-on:click="fetchPaginateCategories(pagination.prev_page_url)"
        :disabled="!pagination.prev_page_url"
      >Previous</button>

      <span>&nbsp;&nbsp; Page {{pagination.current_page}} of {{pagination.last_page}} &nbsp &nbsp;</span>

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
      reservations: [],
      url: "api/reservations",
      pagination: []
    };
  },
  methods: {
    getAll() {
      this.axios.get(this.url).then(response => {
        this.reservations = response.data.data;
        this.makePagination(response.data);
        console.log(this.reservations);
      });
    },
    deleteReservation(id) {
      this.axios.delete("api/reservations/" + id).then(response => {
        this.getAll();
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
    // this.axios.get('api/reservations').then(response => {
    //     this.reservations = response.data.data;
    //     console.log(this.reservations);
    // });
  }
};
</script>