import axios from "axios";

class Api {
  constructor(apiName) {
    this.apiUrl = "http://127.0.0.1:8000/api/";
    this.apiName = apiName;
  }
  getAll() {
    return axios.get(this.apiUrl + this.apiName);
  }

  create(entity) {
    return axios.post(this.apiUrl + this.apiName, entity);
  }

  delete(id) {
    return axios.delete(this.apiUrl + this.apiName + "/" + id);
  }
}

export default Api;
