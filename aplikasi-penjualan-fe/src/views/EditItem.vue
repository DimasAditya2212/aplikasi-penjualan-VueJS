<template>
  <form @submit.prevent="onSubmit">
    <div class="container-fluid d-flex justify-content-center">
      <div class="col-3 align-self-center">
        <h3>edit your item data here</h3>
      </div>
      <div class="card col-7">
        <div class="card-header">
          <h3 class="mt-2">Edit Item</h3>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <label for="nama_item" class="form-label">Nama Item</label>
            <input
              type="text"
              class="form-control"
              id="nama_item"
              name="nama_item"
              v-model="items.nama_item"
              placeholder="Nama Item"
            />
          </div>
          <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input
              type="number"
              name="stok"
              class="form-control"
              id="stok"
              v-model="items.stok"
              placeholder="Stok"
            />
          </div>
          <div class="mb-3">
            <label for="harga_satuan" class="form-label">Harga Satuan</label>
            <input
              type="number"
              name="harga_satuan"
              class="form-control"
              id="harga_satuan"
              v-model="items.harga_satuan"
              placeholder="Harga Satuan"
            />
          </div>
          <label for="satuan">Satuan</label>
          <select
            class="form-select"
            aria-label="Default select example"
            name="satuan"
            v-model="items.unit"
          >
            <option value="pcs">Pcs</option>
            <option value="kg">Kg</option>
          </select>
          <button type="submit" value="Submit" class="btn btn-primary mt-3">
            Edit
          </button>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
import { onMounted, reactive } from "vue";
import { useRouter, useRoute } from "vue-router";
import axios from "axios";

export default {
  name: "EditItem",

  setup() {
    let items = reactive({
      nama_item: "",
      harga_satuan: "",
      stok: "",
      unit: "",
    });

    const router = useRouter();
    const route = useRoute();

    onMounted(() => {
      axios
        .get(`http://127.0.0.1:8000/api/items/edit/${route.params.id}`)
        .then((response) => {
          console.log(response.data.data);
          items.nama_item = response.data.data[0].nama_item;
          items.harga_satuan = response.data.data[0].harga_satuan;
          items.stok = response.data.data[0].stok;
          items.unit = response.data.data[0].unit;
        })
        .catch((error) => {
          console.log("ERRRR:: ", error.response.data);
        });
    });

    function onSubmit() {
      console.log(this.items);

      axios
        .put(`http://127.0.0.1:8000/api/items/edit/${route.params.id}`, items)
        .then((response) => {
          console.log(response);
          router.push({
            name: "TablePage",
          });
        })
        .catch((error) => {
          console.log("ERRRR:: ", error.response.data);
        });
    }

    return {
      items,
      onSubmit,
      router,
    };
  },

  // data() {
  //   return {
  //     items: [],

  //     // stok: null,
  //     // harga_satuan: null,
  //     // selected: null,
  //   };
  // },

  // methods: {
  //   onSubmit() {
  //     console.log(this.items);
  //     const axios = require("axios").default;

  //     axios
  //       .put(`http://127.0.0.1:8000/api/items/edit/${this.$route.params.id}`, {
  //         itemProses,
  //       })
  //       .then((response) => {
  //         console.log(response);
  //       })
  //       .catch((error) => {
  //         console.log("ERRRR:: ", error.response.data);
  //       });
  //   },
  // },

  // mounted() {

  //   axios
  //     .get(`http://127.0.0.1:8000/api/items/edit/${this.$route.params.id}`)
  //     .then((response) => {
  //       console.log(response.data.data);
  //       this.items = response.data.data;
  //     })
  //     .catch((error) => {
  //       console.log("ERRRR:: ", error.response.data);
  //     });
  // },
};
</script>
<style scoped>
.card-header {
  background-color: seashell;
  padding: 10px;
  color: rgb(94, 94, 94);
}
.container-fluid {
  -webkit-animation: fadein 1.5s;
  padding: 50px;
}
@keyframes fadein {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}
</style>
