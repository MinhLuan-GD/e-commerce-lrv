import { Category } from "@/models/category";
import api from ".";

const get3Cate = () => api.get<Category>("categories-three");

export { get3Cate };
