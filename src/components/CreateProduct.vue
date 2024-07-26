<template>
  <h1>DogName: {{ appStore.dogName }}</h1>
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

        <v-select
          v-model="entity.store_id"
          label="Store"
          :items="stores"
          item-value="id"
        ></v-select>
        <v-select
          v-model="entity.category_id"
          label="Category"
          :items="categories"
          item-value="id"
          item-text="title"
        ></v-select>

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
          <tr v-for="product in appStore.products" :key="product.id">
            <td>{{ product.code }}</td>
            <td>{{ product.name }}</td>
            <td>{{ product.price }}</td>
            <td>{{ product.qty }}</td>
            <td>{{ product.image }}</td>
            <td>{{ product.store.title }}</td>
            <td>{{ product.category.title }}</td>
            <td>
              <v-btn @click="editProduct(product)">Edit</v-btn>
              <v-btn @click="deleteProduct(product)">Delete</v-btn>
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
import { ca } from "vuetify/locale";
import { useAppStore } from "@/stores/app";

let appStore = useAppStore();

let entity = ref({
  id: 0,
  code: "",
  name: "",
  price: "",
  qty: "",
  image: "",
  store_id: "",
  category_id: "",
});
let stores = ref([]);
let categories = ref([]);
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
  stores.value = (await api.store.get()).data;
  categories.value = (await api.category.get()).data;
  refresh();
});

async function refresh() {
  appStore.products = (await api.product.get()).data;
}

async function submitForm() {
  if (entity.value.id) {
    await api.product.update(entity.value);
  } else {
    await api.product.create(entity.value);
  }
  entity.value = {
    id: "",
    code: "",
    name: "",
    price: "",
    qty: "",
    image: "",
    store_id: "",
    category_id: "",
  };
  refresh();
}

async function editProduct(product) {
  entity.value = (await api.product.getById(product.id)).data;
  console.log(entity.value);
}

async function deleteProduct(product) {
  await api.product.delete(product.id);
  refresh();
}
</script>
