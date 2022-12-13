import storage from "./localStorageProvider";
import axios from "axios";

const axiosProvider = {
    baseUrl: "http://127.0.0.1:8000/api",

    get: (endpoint) => {
        return axios.get(axiosProvider.baseUrl + endpoint, axiosProvider.getConfig());
    },

    postWithAuth: async (endpoint, body) => {
        const token = storage.get("user")[1]
        const option = {
            headers: {
                Authorization: 'Bearer ' + token
            }
    }
    const response = axios.post(axiosProvider.baseUrl + endpoint, body,option);
    return response;
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

    getWithBody: async (endpoint, body) => {
        // console.log(parameters[0])
        return axios.get("http://127.0.0.1:8000/" + endpoint, body)

    },


    getAuthorization: async () => {
       return storage.get("user")[1];

    },

    getConfig: () => {
        return {
            headers: {"Accept-Language": storage.get("language")}
        }
    }
}

export default axiosProvider;
