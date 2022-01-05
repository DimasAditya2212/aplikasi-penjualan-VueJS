<template>
  <div class="container-fluid">
    <div class="d-flex justify-content-center">
      <div class="col-4 infoInputWrapper align-self-center">
        <h2>This is where you input new item</h2>
      </div>
      <div class="col-6">
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
                <label for="harga_satuan" class="form-label"
                  >Harga Satuan</label
                >
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
                <option value="" disabled selected hidden>Select Unit</option>
                <option value="pcs">Pcs</option>
                <option value="kg">Kg</option>
              </select>
              <button type="submit" class="btn btn-primary mt-3">Tambah</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// import Vue from "vue";

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
        .then((response) => {
          console.log(response);
          this.$router.push("/items");
        })
        .catch((error) => {
          console.log("ERRRR:: ", error.response);
        });
    },
  },
};
</script>
<style scoped>
.infoInputWrapper {
  margin: 0 20px 0 0;
}
.card-header {
  background-color: seashell;
  padding: 10px;
  color: rgb(94, 94, 94);
}
.card {
  border-radius: 10px;
}

.d-flex {
  margin-bottom: 20px;
  padding: 40px 30px 10px 30px;
}

.container-fluid {
  -webkit-animation: fadein 1.5s;
}
@keyframes fadein {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

@media (max-width: 767.98px) {
  .container-fluid .d-flex {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  .container-fluid {
    display: flex;
    /* background-color: khaki; */
  }
  .infoInputWrapper {
    margin: 40px 0 40px 0;
  }
}
</style>