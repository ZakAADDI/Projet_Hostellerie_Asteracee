import storage from ".";

const axiosProvider = {
    baseUrl: "http://127.0.0.1:8000/api",

    get: (endpoint) => {
        return axios.get(axiosProvider.baseUrl + endpoint, axiosProvider.getConfig());
    },

    post: async (endpoint, body) => {

    },

    getConfig: () => {
        return {
            headers: {"Accept-Language": storage.get("language")}
        }
    }
}

export default axiosProvider;