import storage from "./localStorageProvider";
import axios from "axios";

const axiosProvider = {
    baseUrl: "http://127.0.0.1:8000/api",

    get: (endpoint) => {
        return axios.get(axiosProvider.baseUrl + endpoint, axiosProvider.getConfig());
    },

    post: async (endpoint, body) => {
        return axios.post(axiosProvider.baseUrl + endpoint, body),
        {
            hearders: { Authorization: 'Bearer' + getAuthorization()}
        }
    },

    getAuthorization: async () => {
        this.user = storage.get("user");
       return this.token = this.user[1];

    },

    getConfig: () => {
        return {
            headers: {"Accept-Language": storage.get("language")}
        }
    }
}

export default axiosProvider;
