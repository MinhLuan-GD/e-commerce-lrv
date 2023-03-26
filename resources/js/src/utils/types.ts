import { CartItem } from "@/models/cart-item";
import { Category } from "@/models/category";
import { Product } from "@/models/product";
import { User } from "@/models/user";

interface State {
    "3cate": Category[];
    user: User | null;
    products: Product[];
    newProducts: Product[];
    topProducts: Product[];
    cart: CartItem[];
}

interface LoginResult {
    user: User;
    access_token: string;
}

export { State, LoginResult };
