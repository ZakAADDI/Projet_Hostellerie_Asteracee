import storage from "./localStorageProvider";
import axios from "axios";

const axiosProvider = {
    baseUrl: "/api",

    get: (endpoint) => {
        return axios.get(axiosProvider.baseUrl + endpoint, axiosProvider.getConfig());
    },

    postWithOutAuth: async (endpoint, body) => {
        return axios.post(axiosProvider.baseUrl + endpoint, body)

    },
    getWithParameters: async (endpoint, parameters) => {
        // console.log(parameters[0])
        return axios.get(axiosProvider.baseUrl + endpoint,
            {
                params:
                    {starting: parameters[0],ending: parameters[1]},
                headers:
                    {"Accept-Language": storage.get("language")}
            })

    },

    getAuthorization: async () => {
       return storage.get("user")[1];

    },

    getConfig: () => {
        return {
            headers: {"Accept-Language": storage.get("language")}
        }
    },

    patch: async (endpoint, body)=>{
        return axios.patch(axiosProvider.baseUrl + endpoint, body)
    }
}

export default axiosProvider;
