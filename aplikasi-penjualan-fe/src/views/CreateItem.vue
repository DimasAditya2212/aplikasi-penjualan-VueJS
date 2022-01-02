<template>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h3 class="mt-2">Input Item</h3>
      </div>
      <div class="card-body">
        <form @submit="onSubmit" method="post">
          <div class="mb-3">
            <label for="nama_item" class="form-label">Nama Item</label>
            <input
              type="text"
              class="form-control"
              id="nama_item"
              name="nama_item"
              v-model="nama_item"
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
              v-model="stok"
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
              v-model="harga_satuan"
              placeholder="Harga Satuan"
            />
          </div>
          <label for="satuan">Satuan</label>
          <select
            class="form-select"
            aria-label="Default select example"
            name="satuan"
            v-model="selected"
          >
            <option value="pcs">Pcs</option>
            <option value="kg">Kg</option>
          </select>
          <button type="submit" class="btn btn-primary mt-3">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CreateItem",

  data() {
    return {
      nama_item: "",
      stok: "",
      harga_satuan: "",
      selected: "",
    };
  },

  methods: {
    onSubmit(e) {
      e.preventDefault();

      // const newData = {};

      // console.log(newData);
      //   (async () => {
      //     await fetch("http://127.0.0.1:8000/createItem", {
      //       headers: {
      //         Accept: "application/json",
      //         "Content-Type": "application/json",
      //       },
      //       method: "POST",
      //       body: JSON.stringify(newData),
      //     });
      //   })();

      const axios = require("axios").default;
      axios
        .post("http://127.0.0.1:8000/api/createItem", {
          nama_item: this.nama_item,
          stok: this.stok,
          harga_satuan: this.harga_satuan,
          unit: this.selected,
        })
        .then(function (response) {
          console.log(response);
          this.$router.push("/items");
        })
        .catch((error) => {
          console.log("ERRRR:: ", error.response.data);
        });
    },
  },
};
</script>
<style scoped>
.card-header {
  background-color: dimgray;
  padding: 10px;
  color: aliceblue;
}
.card {
  border-radius: 10px;
}
</style>