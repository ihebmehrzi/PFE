<template>
  <div id="app">
    <div id="fakeloader">
      <div class="spinner5">
        <div class="cube1"></div>
        <div class="cube2"></div>
      </div>
    </div>
    <div id="main-wrapper">
      <header class="header">
        <div class="header-body">
          <div
            class="header-body"
            style="background: url('../Client/img/bgcar.jpg') top center no-repeat; background-size: cover;"
          >
            <div class="header-overlay"></div>
            <div class="container">
              <h1>DevRows helps you</h1>
              <p>Rent car to move from local hosts in 190+ countries.</p>
              <div class="rq-search-container">
                <div class="rq-search-single">
                  <div class="rq-search-content">
                    <span class="rq-search-heading">Location</span>
                    <select name="categories" class="category-option">
                      <option value="0">Pick a location</option>
                      <option value="AL">Alabama</option>
                      <option value="AK">Alaska</option>
                      <option value="AZ">Arizona</option>
                      <option value="AR">Arkansas</option>
                      <option value="CA">California</option>
                      <option value="CO">Colorado</option>
                      <option value="CT">Connecticut</option>
                      <option value="DE">Delaware</option>
                      <option value="DC">District of Columbia</option>
                      <option value="FL">Florida</option>
                      <option value="GA">Georgia</option>
                      <option value="HI">Hawaii</option>
                      <option value="ID">Idaho</option>
                      <option value="IL">Illinois</option>
                      <option value="IN">Indiana</option>
                    </select>
                  </div>
                </div>
                <div class="rq-search-single">
                  <div class="rq-search-content">
                    <span class="rq-search-heading">Pick up</span>
                    <input
                      type="text"
                      name="datefilter"
                      class="rq-form-element datepicker"
                      id="startdate"
                      placeholder="Pick up date"
                    >
                    <i class="ion-chevron-down datepicker-arrow"></i>
                  </div>
                </div>
                <div class="rq-search-single">
                  <div class="rq-search-content">
                    <span class="rq-search-heading">Return</span>
                    <input
                      type="text"
                      name="datefilter"
                      class="rq-form-element"
                      id="enddate"
                      placeholder="Return date"
                    >
                    <i class="ion-chevron-down datepicker-arrow"></i>
                  </div>
                </div>
                <div class="rq-search-single">
                  <div class="rq-search-content last-child">
                    <span class="rq-search-heading">Driver age</span>
                    <select name="categories" class="category-option">
                      <option value="0">25 Years old</option>
                      <option value="1">25 Years old</option>
                      <option value="2">25 Years old</option>
                      <option value="3">25 Years old</option>
                      <option value="4">25 Years old</option>
                      <option value="5">25 Years old</option>
                    </select>
                  </div>
                </div>
                <div class="rq-search-single search-btn">
                  <div class="rq-search-content">
                    <button class="rq-btn rq-btn-primary fluid-btn">
                      Search
                      <i class="arrow_right"></i>
                    </button>
                  </div>
                </div>
              </div>
              <!-- / .search-container -->
              <div class="rq-counting-list">
                <ul class="list-unstyled">
                  <li>
                    <span
                      class="count-result"
                      data-from="25"
                      data-to="12460"
                      data-speed="5000"
                      data-refresh-interval="50"
                    ></span>
                    <span class="count-category">User access</span>
                  </li>
                  <li>
                    <span
                      class="count-result"
                      data-from="25"
                      data-to="8960"
                      data-speed="5000"
                      data-refresh-interval="50"
                    ></span>
                    <span class="count-category">Cars</span>
                  </li>
                  <li>
                    <span
                      class="count-result"
                      data-from="25"
                      data-to="10360"
                      data-speed="5000"
                      data-refresh-interval="50"
                    ></span>
                    <span class="count-category">Reviews</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- /.header-body -->
        </div>
        <nav class="navbar navbar-default" id="sticker">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <!--<div class="navbar-header">-->
            <!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"-->
            <!--data-target="#bs-example-navbar-collapse-1" aria-expanded="false">-->
            <!--<span class="sr-only">Toggle navigation</span>-->
            <!--<span class="icon-bar"></span>-->
            <!--<span class="icon-bar"></span>-->
            <!--<span class="icon-bar"></span>-->
            <!--</button>-->
            <!--<a class="navbar-brand" href="index.html"></a>-->
            <!--</div>-->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li>
                  <router-link to="/container" class="nav-link">Accueil</router-link>
                </li>
                <li class="dropdown">
                  <router-link to="/carlist" class="nav-link">Voitures</router-link>
                </li>

                <li class="dropdown">
                  <router-link to="/createR" class="nav-link">Réservations</router-link>
                </li>

                <li class="dropdown">
                  <router-link to="/faq" class="nav-link">FAQ</router-link>
                </li>

                <li class="dropdown">
                  <router-link to="/contact" class="nav-link">Contact</router-link>
                </li>
                <li class="dropdown">
                  <router-link to="/aboutus" class="nav-link">About Us</router-link>
                </li>

                <!-- <li v-if="isConnected">
                  <a @click="logout" class="nav-link">Déconnexion</a>
                </li>
                <li v-if="!isConnected">
                  <router-link to="/login" class="nav-link">Login</router-link>
                </li>
                <li v-if="!isConnected">
                  <router-link to="/register" class="nav-link">Inscription</router-link>
                </li>-->

                <li v-if="isAuth==false" class="tr-dropdown">
                  <ul class="tr-dropdown-menu" role="menu">
                    <li>
                      <router-link to="/login" class="nav-link">Login</router-link>
                    </li>
                    <li>
                      <router-link to="/register" class="nav-link">Inscription</router-link>
                    </li>
                  </ul>
                </li>
               
                <li v-if="isAuth==true" class="tr-dropdown">
                  <ul class="tr-dropdown-menu" role="menu">
                    <li >
                  <a @click="logout" class="nav-link">Déconnexion</a>
                </li>
                    <li>
                      <router-link to="/profile" class="nav-link"> Mon Compte</router-link>
                    </li>
                  </ul>
                </li>
                <!--- --------------------------------->
              </ul>
            </div>
            <!-- /.navbar-collapse -->
          </div>
          <!-- /.container-fluid -->
        </nav>
      </header>
      <!-- end header -->
      <div>
        <div>
          <div class="row">
            <router-view></router-view>

            <!--<div>-->
            <!--<div class="rq-mission-block">-->
            <!--<div class="row">-->
            <!--<div >-->
            <!--<div class="mission-content">-->
            <!--<div>-->
            <!--<router-view></router-view>-->
            <!--</div>-->
            <!--</div>-->
            <!--</div>-->
            <!--</div>-->
            <!--</div>-->
            <!--</div>-->
          </div>
        </div>
      </div>

      <div
        class="modal fade"
        id="test"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel"
        aria-hidden="true"
      >
        <!-- <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Login</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body mx-3">
              <div class="md-form mb-4">
                <i class="fas fa-envelope prefix grey-text"></i>
                <input type="email" class="form-control validate" v-model="form.email">
                <label data-error="wrong" data-success="right">Your email</label>
              </div>
              <div class="md-form mb-4">
                <i class="fas fa-envelope prefix grey-text"></i>
                <input type="email" class="form-control validate" v-model="form.password">
                <label data-error="wrong" data-success="right">password</label>
              </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button class="btn btn-indigo" @click.prevent="login" data-dismiss="modal">
                Send
                <i class="fas fa-paper-plane-o ml-1"></i>
              </button>
            </div>
          </div>
        </div>-->
      </div>

      <div
        class="modal fade"
        id="test1"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Inscription</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body mx-3">
              <div class="md-form mb-5">
                <i class="fas fa-user prefix grey-text"></i>
                <input type="text" id="form3" class="form-control validate">
                <label data-error="wrong" data-success="right" for="form3">Your name</label>
              </div>

              <div class="md-form mb-4">
                <i class="fas fa-envelope prefix grey-text"></i>
                <input type="email" class="form-control validate">
                <label data-error="wrong" data-success="right">Your email</label>
              </div>
              <div class="md-form mb-4">
                <i class="fas fa-envelope prefix grey-text"></i>
                <input type="password" class="form-control validate">
                <label data-error="wrong" data-success="right">password</label>
              </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button class="btn btn-indigo" @click.prevent="register" data-dismiss="modal">
                Send
                <i class="fas fa-paper-plane-o ml-1"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end #main-wrapper -->
    <Footer></Footer>
  </div>
</template>



<script>
import Header1 from "../components/Header1";
import Footer from "../components/Footer";
import Container from "../components/Container";
import EventBus from "../components/eventBus";
export default {
  components: { Header1, Footer, Container },
  mounted:function(){
      this.check()
  },
  data() {
    return {
      isAuth: false,
      isGuest: false
    };
  },
  methods: {
    logout() {
      localStorage.clear();
      this.$router.push("/");
      Vue.swal({
        type: "success",
        title: "Logout successfully"
      });
      this.isAuth = false;
      this.isGuest = true;
      window.location.reload(true);
    },

    check() {
      if (localStorage.getItem("user_id")) {
        this.isAuth = true;
        this.isGuest = false;
      }
    }
  }
};
</script>