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
                        v-model="fields.name"
                      >
                      <span v-if="errors.name" class="text-danger">{{errors.name[0]}}</span>
                    </div>
                  </div>
                  <div class="col-md-6">
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
                        v-model="fields.email"
                      >
                      <span v-if="errors.email" class="text-danger">{{errors.email[0]}}</span>
                    </div>
                  </div>
                </div>
                <!-- /.row -->

                <div class="form-group">
                  <input
                    type="password"
                    name="password"
                    class="form-control"
                    required="required"
                    rows="7"
                    placeholder="Password. . ."
                    v-model="fields.password"
                  >
                  <span v-if="errors.password" class="text-danger">{{errors.password[0]}}</span>
                </div>
                <div class="form-group">
                  <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    required="required"
                    rows="7"
                    placeholder="password_confirmation . . ."
                    v-model="fields.password_confirmation"
                  >
                  <span
                    v-if="errors.password_confirmation"
                    class="text-danger"
                  >{{errors.password_confirmation[0]}}</span>
                </div>

                <button type="button" class="btn btn-primary btn-full" @click="Register">Register</button>
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
  data() {
    return {
      fields: {},
      errors: []
    };
  },

  methods: {
    Register() {
      this.errors = [];
      console.log(this.fields);

      axios
        .post("/api/auth/signup", this.fields)
        .then(response => {
          this.$router.push("/login");
          Vue.swal({
            type: "success",
            title: "Registred with success"
          });
        })
        .catch(error => {
          Vue.swal({
            type: "error",
            title: "Vérifier les champs"
          });
        });
    }
  },
  mounted: function() {}
};
</script>