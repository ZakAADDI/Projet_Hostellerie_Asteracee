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
            hearders: { Authorization: 'Bearer' + axiosProvider.getAuthorization()}
        }
    },

    getAuthorization: async () => {
        const user = await axios.get(axiosProvider.baseUrl + '/users');
        /* can work because of missing token for 'get->/users' secured by isAdmin Middleware */
        return user.token;
    },

    getConfig: () => {
        return {
            headers: {"Accept-Language": storage.get("language")}
        }
    }
}

export default axiosProvider;
