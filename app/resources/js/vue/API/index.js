import axios from "axios";

const axiosInstance = axios.create({
    baseURL: "http://larv.local/api/"
})

export default axiosInstance;

