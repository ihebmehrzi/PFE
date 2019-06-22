/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import ListModel from "./components/ListModel";
import ConfirmReservation from "./components/ConfirmReservation";




require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
Vue.use(VueRouter);

 import AppClient from "./components/AppClient";
Vue.component('AppClient',require('./components/AppClient.vue').default);



import Swal from 'sweetalert2'
window.Swal=Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 8000
});
window.Toast=Toast;

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);



import CreateReservationn from "./components/CreateReservationn";
import ListCar from "./components/ListCar";
import EditReservation from "./components/EditReservation";
import CreateCarr from "./components/CreateCarr";
import ListReservation from "./components/ListReservation";
import EditModelCar from "./components/EditModelCar";
import CreateCarModel from "./components/CreateCarModel";
import EditCar from "./components/EditCar";
import CreateCarMarque from "./components/CreateCarMarque";
import ListMarque from "./components/ListMarque";
import EditCarMarque from "./components/EditCarMarque";
import ListCategory from "./components/ListCategory";
import CreateCarCategory from "./components/CreateCarCategory";
import EditCarCategory from "./components/EditCarCategory";
import CreateMaintenance from "./components/CreateMaintenance";
import ListMaintenance from "./components/ListMaintenance";
import ExampleComponent from "./components/ExampleComponent";
import Registration from "./components/Registration";
import details from "./components/details";

import Test from "./components/Test";
import Header1 from "./components/Header1";
import Footer from "./components/Footer";


import Container from "./components/Container";

import Login from "./components/Auth/Login";
import Register from "./components/Auth/Register";
import CarList from "./components/CarList";
import testImage from "./components/testImage";
import email from "./components/Auth/email";
import Contact from "./components/Contact";
import AboutUs from "./components/AboutUs";
import FAQ from "./components/FAQ";

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('ExampleComponent', require('./components/ExampleComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const routes = [
    {
        name: 'createM', path: '/createM', component: CreateMaintenance
    },

    {name: 'createR', path: '/createR', component: CreateReservationn},
    {name: 'listR', path: '/listR', component: ListReservation},
    {name: 'createV', path: '/createV', component: CreateCarr},
    {name: 'editR', path: '/editR', component: EditReservation},

    {name: 'listV', path: '/listV', component: ListCar},
    {name: 'listModel', path: '/listModel', component: ListModel},
    {name: 'listCategory', path: '/listCategory', component: ListCategory},
    {name: 'listMarque', path: '/listMarque', component: ListMarque
    },
    {name: 'editModel', path: '/editModel', component: EditModelCar
    },
    {name: 'createModel', path: '/createModel', component: CreateCarModel
    },
    {name: 'createCarCategory', path: '/createCarCategory', component: CreateCarCategory
    },
    {name: 'editCategory', path: '/editCategory', component: EditCarCategory
    },
    {name: 'editCar', path: '/editCar', component: EditCar},
    {name: 'createCarMarque', path: '/createCarMarque', component: CreateCarMarque
    },
    {name: 'editCarMarque', path: '/editCarMarque', component: EditCarMarque
    },
    {name: 'listM', path: '/listM', component:ListMaintenance
    },
    {name: 'AppClient', path: '/AppClient', component:AppClient
    },
    {name: 'registration', path: '/registration', component:Registration
    },
    {name: 'login', path: '/login', component:Login
    },
    {name: 'regitser', path: '/regitser', component:Register
    },
    {name: 'container', path: '/container', component:Container
    },
    {name: 'carlist', path: '/carlist', component:CarList
    },
    {name: 'details', path: '/details', component:details
    },
    {name: 'testimage', path: '/testimage', component:testImage
    },
    {name: 'ConfirmReservation', path: '/ConfirmReservation', component:ConfirmReservation
    },
    {name: 'email', path: '/email', component: email},
    {name: 'contact', path: '/contact', component: Contact},
    {name: 'aboutus', path: '/aboutus', component: AboutUs},
    {name: 'faq', path: '/faq', component: FAQ},

];


const router = new  VueRouter({ mode: 'history', routes: routes});


const app = new Vue({
    el: '#app',
    router,
   components:{ Header1, Test, Footer ,ExampleComponent,Container,email}
});
