<template>
  <form @submit.prevent="onSubmit">
    <div class="container">
      <div class="card">
        <div class="card-header">
          <h3 class="mt-2">Edit Item</h3>
        </div>
        <div class="card-body" v-for="item in items" :key="item.id">
          <div class="mb-3">
            <label for="nama_item" class="form-label">Nama Item</label>
            <input
              type="text"
              class="form-control"
              id="nama_item"
              name="nama_item"
              v-model="item.nama_item"
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
              v-model="item.stok"
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
              v-model="item.harga_satuan"
              placeholder="Harga Satuan"
            />
          </div>
          <label for="satuan">Satuan</label>
          <select
            class="form-select"
            aria-label="Default select example"
            name="satuan"
            v-model="item.selected"
          >
            <option value="Pcs">Pcs</option>
            <option value="Kg">Kg</option>
          </select>
          <button type="submit" class="btn btn-primary mt-3">Edit</button>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
export default {
  name: "EditItem",

  data() {
    return {
      items: [],
    };
  },

  methods: {
    onSubmit() {
      const axios = require("axios").default;

      axios
        .put(`http://127.0.0.1:8000/api/edit/${this.$route.params.id}`, {
          nama_item: this.nama_item,
          stok: this.stok,
          harga_satuan: this.harga_satuan,
          unit: this.selected,
        })
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
          console.log("ERRRR:: ", error.response.data);
        });
    },
  },

  mounted() {
    const axios = require("axios").default;

    axios
      .get(`http://127.0.0.1:8000/api/items/edit/${this.$route.params.id}`)
      .then((response) => {
        console.log(response.data.data);
        this.items = response.data.data;
      })
      .catch((error) => {
        console.log("ERRRR:: ", error.response.data);
      });
  },
};
</script>
<style scoped>
.card-header {
  background-color: dimgray;
  padding: 10px;
  color: aliceblue;
}
</style>
