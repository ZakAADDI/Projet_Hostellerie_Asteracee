import {createStore} from "vuex";
const store = createStore({
    state:{
        user: [

        ],
        language:[

        ]
    },
    getters:{
        oneUser(state){
            return state.user;
        },
        oneLanguage(state){
            return state.language;
        }
    },
    mutations:{
        addUser(state, newUser){
                state.user.push({
                    email: newUser.email,
                    token: newUser.token
                })
            },
        addLanguage(state, newLanguage){
                state.language.push({
                    currentLanguage : newLanguage
                })
            },
        removeUser(state){
                state.user = [
                ]
            },
        removeLanguage(state){
                state.language = [
                ]
        }

    }
}
)

export default store;
