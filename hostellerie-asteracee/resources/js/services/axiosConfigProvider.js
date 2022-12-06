import storage from "./localStorageProvider";
import axios from "axios";

const axiosProvider = {
    baseUrl: "http://127.0.0.1:8000/api",

    get: (endpoint) => {
        return axios.get(axiosProvider.baseUrl + endpoint, axiosProvider.getConfig());
    },

    postWithAuth: async (endpoint, body) => {
        return axios.post(axiosProvider.baseUrl + endpoint, body),
        {
            hearders: { Authorization: 'Bearer' + getAuthorization()}
        }
    },
    postWithOutAuth: async (endpoint, body) => {
        return axios.post(axiosProvider.baseUrl + endpoint, body)

    },
    getWithParameters: async (endpoint, parameters) => {
        // console.log(parameters[0])
        return axios.get(axiosProvider.baseUrl + endpoint, {params: {starting: parameters[0],ending: parameters[1]}})

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
