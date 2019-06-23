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
                <div class="form-group">
                  <label for="email">E-mail</label>

                  <input
                    type="email"
                    id="email"
                    class="form-control"
                    placeholder="user@example.com"
                    v-model="fields.email"
                    required
                  >
                  <span v-if="errors.email" class="text-danger">{{errors.email[0]}}</span>
                </div>

                <div class="form-group">
                  <label for="password">Mot de passe</label>

                  <input
                    type="password"
                    id="password"
                    class="form-control"
                    v-model="fields.password"
                    required
                  >
                  <span v-if="errors.password" class="text-danger">{{errors.password[0]}}</span>
                </div>

                <button type="button" class="btn btn-default" @click="Login">Connexion</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      fields: {},
      errors: []
    };
  },

  methods: {
    destroyToken() {
      localStorage.removeItem("Token");
      localStorage.removeItem("expiration");
    },
    Login() {
      this.errors = [];

      axios
        .post("/api/auth/login", this.fields)
        .then(response => {
          localStorage.setItem("Token", "Bearer " + response.data.access_token);
          localStorage.setItem("user_id", response.data.user_id);
          localStorage.setItem("user_role", response.data.user_role);
          Vue.swal({
            type: "success",
            title: "login with success"
          });

          if (localStorage.getItem("user_role") == "user") {
            this.$router.push("/createR");
            window.location.reload(true);
          } else {
            this.$router.push("/Adminn");
            window.location.reload(true);
          }
        })
        .catch(err => {
          if (err.response.status === 422) {
            this.errors = err.response.data.errors;

            Vue.swal({
              type: "error",
              title: err.response.data.errors.message
            });
          }
          if (err.response) {
            Vue.swal({
              type: "error",
              title: err.response.data.message
            });
          }
        });
    },
    created: function() {
      this.destroyToken();
    }
  }
};
</script>