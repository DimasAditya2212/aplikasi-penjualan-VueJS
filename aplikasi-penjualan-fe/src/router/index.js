import { createRouter, createWebHistory } from "vue-router";
import TablePage from "../views/TablePage.vue";
import CreateItem from "../views/CreateItem.vue";
import EditItem from "../views/EditItem.vue";
import Home from "../views/Home.vue";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/items",
    name: "TablePage",
    component: TablePage,
  },
  {
    path: "/createItem",
    name: "Createitem",
    component: CreateItem,
  },
  {
    path: "/items/edit/:id",
    name: "Edititem",
    component: EditItem,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
