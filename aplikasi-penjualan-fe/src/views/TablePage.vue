<template>
  <section>
    <div class="container">
      <table class="table table-light table-striped border-dark">
        <thead class="text-center">
          <tr>
            <th scope="col">Nama Item</th>
            <th scope="col">Unit</th>
            <th scope="col">Stok</th>
            <th scope="col">Harga Satuan</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody class="text-center">
          <tr v-for="item in items" :key="item.id">
            <td scope="row">{{ item.nama_item }}</td>
            <td>{{ item.unit }}</td>
            <td>{{ item.stok }}</td>
            <td>{{ item.harga_satuan }}</td>
            <td class="d-flex justify-content-around">
              <router-link :to="{ name: 'Edititem', params: { id: item.id } }">
                <i class="fas fa-edit fa-lg edits"></i>
              </router-link>
              <button @click.prevent="deleteClick(item.id, index)">
                <i class="fas fa-trash fa-lg deletes"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
</template>

<script>
export default {
  name: "Tablepage",

  data() {
    return {
      items: [],
      itemPut: [],
    };
  },

  methods: {
    deleteClick(id, index) {
      const axios = require("axios").default;

      axios
        .delete(`http://127.0.0.1:8000/api/items/${id}`, {
          data: { id: id },
        })
        .then((response) => {
          console.log(response);
          this.items.splice(index, 1);
        });
      // .catch((error) => {
      //   console.log("ERRRR:: ", error.response.data);
      // });
    },
  },

  mounted() {
    const axios = require("axios").default;
    axios.get("http://127.0.0.1:8000/api/items").then((response) => {
      console.log(response.data.data);
      this.items = response.data.data;
    });
  },
};
</script>

<style scoped>
td i {
  color: darkslategrey;
  transition: 0.2s;
}

td button {
  border: 0;
}

td i:hover {
  transform: scale(1.2);
}

section {
  background: hsla(186, 66%, 40%, 1);

  background: linear-gradient(
    90deg,
    hsla(186, 66%, 40%, 1) 0%,
    hsla(188, 78%, 69%, 1) 100%
  );

  background: -moz-linear-gradient(
    90deg,
    hsla(186, 66%, 40%, 1) 0%,
    hsla(188, 78%, 69%, 1) 100%
  );

  background: -webkit-linear-gradient(
    90deg,
    hsla(186, 66%, 40%, 1) 0%,
    hsla(188, 78%, 69%, 1) 100%
  );

  filter: progid: DXImageTransform.Microsoft.gradient( startColorstr="#239EAB", endColorstr="#74DEEE", GradientType=1 );

  
  padding: 50px 0 40vh 0;
}

.container {
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
</style>

