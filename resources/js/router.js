import Vue from 'vue';
import VueRouter from 'vue-router';
import ExampleComponent from "./components/ExampleComponent";
import ContactCreate from "./views/ContactCreate";
import ContactsShow from "./components/ContactsShow";
import ContactEdit from "./views/ContactEdit";
import ContactIndex from "./views/ContactIndex";
import ContactBirthdays from "./views/ContactBirthdays";
import Logout from "./Actions/Logout";
Vue.use(VueRouter);
export default new VueRouter({
    routes: [
        {
            path: '/',
            component: ExampleComponent,
            meta: { title: 'Welcome' },
        },
        {
            path: '/contacts',
            component: ContactIndex,
            meta: { title: 'Contacts' },
        },
        {
            path: '/contacts/birthdays',
            component: ContactBirthdays,
            meta: { title: 'Birthdays' },
        },
        {
            path: '/contacts/create',
            component: ContactCreate,
            meta: { title: 'Contact Create' },
        },
        {
            path: '/contacts/:id',
            component: ContactsShow,
            meta: { title: 'Contact Details' },
        },
        {
            path: '/contacts/:id/edit',
            component: ContactEdit,
            meta: { title: 'Contact Edit' },
        },
        {
            path: '/logout',
            component: Logout,
            meta: { title: 'Log out ... | Fdi' },
        },

    ],
    mode: 'history'
});
