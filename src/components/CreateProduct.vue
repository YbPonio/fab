<template>
  <v-container>
    <v-col>
      <v-form>
        <v-text-field v-model="entity.code" label="Code"></v-text-field>
        <v-text-field v-model="entity.name" label="Name"></v-text-field>
        <v-text-field
          v-model="entity.price"
          label="Price"
          type="number"
        ></v-text-field>
        <v-text-field
          v-model="entity.qty"
          label="Quantity"
          type="number"
        ></v-text-field>
        <v-text-field v-model="entity.image" label="Image URL"></v-text-field>
        <v-text-field
          v-model="entity.store_id"
          label="Store ID"
          type="number"
        ></v-text-field>
        <v-text-field
          v-model="entity.category_id"
          label="Category ID"
          type="number"
        ></v-text-field>
        <v-btn @click="submitForm">Submit</v-btn>
      </v-form>
    </v-col>

    <v-col>
      <v-table>
        <thead>
          <tr>
            <th v-for="header in headers" :key="header">
              {{ header }}
            </th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="product in products" :key="product.id">
            <td>{{ product.code }}</td>
            <td>{{ product.name }}</td>
            <td>{{ product.price }}</td>
            <td>{{ product.qty }}</td>
            <td>{{ product.image }}</td>
            <td>{{ product.store.title }}</td>
            <td>{{ product.category.title }}</td>
            <td>
              <v-btn @click="deleteProduct">Delete</v-btn>
            </td>
          </tr>
        </tbody>
      </v-table>
    </v-col>
  </v-container>
</template>

<script setup>
import api from "@/helpers/api";
import { onMounted, ref } from "vue";

let entity = ref({
  code: "",
  name: "",
  price: 0,
  qty: 0,
  image: "",
  store_id: 1,
  category_id: 1,
});

let products = ref([]);
let headers = ref([
  "Code",
  "Name",
  "Price",
  "Quantity",
  "Image",
  "Store",
  "Category",
]);

onMounted(async function () {
  products.value = (await api.product.getAll()).data;
});

function submitForm() {
  api.product.create(entity.value);
}

function deleteProduct() {
  api.product.delete();
}
</script>
