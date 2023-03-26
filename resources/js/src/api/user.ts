import { SignModel } from "@/models/sign";
import { User } from "@/models/user";
import api from ".";

const getCurrentUser = () =>
    api.get<User>("auth/user-profile", {
        headers: {
            Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
    });
const login = (signModel: SignModel) => api.post<User>("auth/login", signModel);
const signup = (signModel: SignModel) =>
    api.post<User>("auth/register", signModel);

export { getCurrentUser, login, signup };
