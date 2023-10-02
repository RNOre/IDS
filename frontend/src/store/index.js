import {createStore} from "vuex";
import {students} from "./moduls/studentModule.js";
import {events} from "./moduls/eventModules.js";

export const store = createStore({
    modules: {
        students,
        events
    }
})