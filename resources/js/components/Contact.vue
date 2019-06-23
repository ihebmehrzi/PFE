<template>
  <div>
    <!--<div class="inner-page-banner" style="background: url('img/inner-banner/contact-us.jpg') top center no-repeat; background-size: cover;">-->
    <!--<div class="rq-overlay"></div>-->
    <!--<div class="container">-->
    <!--<div class="rq-title-container bredcrumb-title text-center">-->
    <!--<h2 class="rq-title">Contact Us</h2>-->
    <!--<ol class="breadcrumb rq-subtitle">-->
    <!--<li><a href="#">Home</a></li>-->
    <!--<li class="active">Contact Us</li>-->
    <!--</ol>-->
    <!--</div>-->
    <!--</div>-->
    <!--</div> &lt;!&ndash; /. inner pagebanner &ndash;&gt;-->

    <div class="rq-page-content">
      <div class="rq-content-block">
        <div class="container">
          <div class="rq-contact-us-grid-block">
            <!-- start info portion -->
            <div class="row">
              <div class="col-md-4">
                <div class="grid-block-single">
                  <i class="icon_mobile"></i>
                  <h3>Phone</h3>
                  <p>Phone 01: (8801) 738 5678 64</p>
                  <p>Phone 02: (8801) 722 0008 99</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="grid-block-single">
                  <i class="icon_pin_alt"></i>
                  <h3>Address</h3>
                  <p>5th Floor, AH Building 1234 New Design</p>
                  <p>St. Melbourne, Australia</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="grid-block-single">
                  <i class="icon_mail_alt"></i>
                  <h3>Email</h3>
                  <p>info@yourdomain.com</p>
                  <p>support@yourdomain.com</p>
                </div>
              </div>
            </div>
          </div>
          <!-- end info portion -->

          <div class="rq-contact-us-form-content">
            <!-- start message form -->
            <h3>
              If you got any questions
              <br>please do not hesitate to send us a message
            </h3>
            <form @submit.prevent="SendMsg">
              <input
                type="text"
                class="contact-form-input"
                placeholder="Your name"
                v-model="contact.name"
              >
              <input
                type="email"
                class="contact-form-input"
                placeholder="Your email"
                v-model="contact.email"
              >
              <input
                type="text"
                class="contact-form-input"
                placeholder="Subject"
                v-model="contact.subject"
              >
              <textarea class="contact-form-input" placeholder="Message" v-model="contact.message"></textarea>
              <div class="submit-btn">
                <button type="submit" class="rq-btn rq-btn-primary">Send Message</button>
              </div>
            </form>
          </div>
          <!-- end message form -->
          <div class="rq-contact-us-map">
            <!-- start map portion -->
            <div id="map"></div>
          </div>
          <!-- end map portion -->
        </div>
      </div>
    </div>
    <!-- /. inner pagebanner -->
  </div>
</template>

<script>
export default {
  name: "Contact",
  data() {
    return {
      contact: {}
    };
  },
  methods: {
    SendMsg() {
      this.errors = [];
      console.log("test");
      this.axios
        .post("api/contact", this.contact)
        .then(response => {
          Vue.swal({
            type: "success",
            title: "Message sent successfully"
          });
        })
        .catch(error => {
          if (error.response.status == 422) {
            this.errors = error.response.data.errors;
          }
        });
    }
  }
};
</script>

<style scoped>
</style>