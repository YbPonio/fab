import axios from "axios";

class Api {
  constructor(apiName) {
    this.apiUrl = "http://127.0.0.1:8000/api/";
    this.apiName = apiName;
  }
  get() {
    return axios.get(this.apiUrl + this.apiName);
  }

  getById(id) {
    return axios.get(`${this.apiUrl}${this.apiName}/${id}`);
  }

  create(entity) {
    return axios.post(this.apiUrl + this.apiName, entity);
  }

  delete(id) {
    return axios.delete(this.apiUrl + this.apiName + "/" + id);
  }
  update(product) {
    return axios.patch(this.apiUrl + this.apiName + "/" + product.id, product);
  }
}

export default Api;
