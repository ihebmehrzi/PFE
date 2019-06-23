<template>
  <div class="col-12 grid-margin">
    <div class="rq-contact-us-form-content">
      <div class="rq-car-listing-wrapper">
        <div class="rq-listing-choose rq-listing-list">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <br>
              <br>
              <form>
                <div class="row">
                  <div class="col-md-6">
                    <label for="Phone">Name</label>
                    <div class="form-group">
                      <input
                        class="form-control"
                        name="name"
                        type="text"
                        placeholder="Your Name..."
                        value
                        size="30"
                        aria-required="true"
                        required="required"
                        v-model="userData.name"
                      >
                      <span v-if="errors.name" class="text-danger">{{errors.name[0]}}</span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="Phone">email</label>
                    <div class="form-group">
                      <input
                        class="form-control"
                        id="email"
                        name="email"
                        type="text"
                        placeholder="Your email..."
                        value
                        size="30"
                        aria-required="true"
                        required="required"
                        v-model="userData.email"
                      >
                      <span v-if="errors.email" class="text-danger">{{errors.email[0]}}</span>
                    </div>
                  </div>
                  <!-- /.row -->
                <div class="col-md-6">
                  <label for="Phone">Cin</label>
                  <div class="form-group">
                    <input
                      type="text"
                      name="cin"
                      class="form-control"
                      required="required"
                      rows="7"
                      placeholder="cin. . ."
                      v-model="userData.cin"
                    >
                    <span v-if="errors.cin" class="text-danger">{{errors.cin[0]}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="Phone">adresse</label>
                  <div class="form-group">
                    <input
                      type="text"
                      name="adresse"
                      class="form-control"
                      required="required"
                      rows="7"
                      placeholder="adresse . . ."
                      v-model="userData.address"
                    >
                    <span v-if="errors.address" class="text-danger">{{errors.address[0]}}</span>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="Phone">Phone</label>
                  <div class="form-group">
                    <input
                      type="text"
                      name="phonenumber"
                      class="form-control"
                      required="required"
                      rows="7"
                      placeholder="télephone . . ."
                      v-model="userData.phonenumber"
                    >
                    <span v-if="errors.phonenumber" class="text-danger">{{errors.phonenumber[0]}}</span>
                  </div>
                </div>
                </div>
                <div class="col-md">
 <button type="button" class="btn btn-primary btn-full" @click="Update">update</button>
</div>
                  </form>
              <!-- /.tr-form -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  mounted: function() {
    this.userDetails();
  },
  data() {
    return {
      fields: {},
      errors: [],
      userData: {}
    };
  },

  methods: {
    Update() {
      this.errors = [];
      axios
        .post("/api/auth/profile", this.userData, {
          headers: {
            Authorization: localStorage.getItem("Token")
          }
        })
        .then(response => {
          Vue.swal({
            type: "success",
            title: "Profil updated"
          });
          this.$router.push("/");
        })
        .catch(error => {
          Vue.swal({
            type: "error",
            title: "Vérifier les champs"
          });
        });
    },
    userDetails() {
      axios
        .get("/api/auth/user", {
          headers: {
            Authorization: localStorage.getItem("Token")
          }
        })
        .then(response => {
          console.log("userData", response.data);
          this.userData = response.data;
        })
        .catch(error => {
          console.log("userData", err.response.data);
        });
    }
  }
};
</script>