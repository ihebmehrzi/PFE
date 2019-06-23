<template>
  <div id="app">
    <h1>Send mail</h1>
    <form @submit.prevent="send">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>subject:</label>
            <input type="text" class="form-control" name="subject">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>email:</label>
            <input type="text" class="form-control" name="email">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>message:</label>
            <input type="text" class="form-control" name="message">
          </div>
        </div>
      </div>

      <div class="form-group">
        <button class="btn btsn-primary">send</button>
      </div>
    </form>
  </div>
</template>
<script>
export default {
  name: "email",

  data() {
    return {};
  },
  methods: {
    send() {
      console.log("test btn");
      this.axios.post("send/email").then(response => {
        console.log(response);
      });

      // this.axios.post('send/email',
      //  {email:this.info.email,bodycontent:this.info.bodycontent})
    }
  }
};
</script>
