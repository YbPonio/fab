import ProductApi from "./product.api.js";
import Api from "./api.base.js";
// import axios from "axios";

let apiUrl = "http://127.0.0.1:8000/api/";

export default {
  product: new ProductApi(),

  store: new Api("store"),

  category: new Api("category"),
};
