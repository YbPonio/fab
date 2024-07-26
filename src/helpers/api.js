import ProductApi from "./product.api.js";
import Api from "./api.base.js";

export default {
  product: new ProductApi(),

  store: new Api("store"),

  category: new Api("category"),
};
