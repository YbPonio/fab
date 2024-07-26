<template>
  <h1>Categories</h1>
  {{ appStore.categories }}
  <h1>Products</h1>
  {{ appStore.products }}
  <h1 @click="changeName()">Dog name: {{ appStore.dogName }}</h1>
</template>

<script setup>
import api from "@/helpers/api";
import { useAppStore } from "@/stores/app";
import { onMounted } from "vue";

const appStore = useAppStore();

onMounted(refresh);

async function refresh() {
  console.log(appStore.dogName);
  appStore.categories = (await api.category.get()).data;
  appStore.products = (await api.product.get()).data;
}

function changeName() {
  appStore.dogName = "Fido";
}
</script>

<style scoped></style>
