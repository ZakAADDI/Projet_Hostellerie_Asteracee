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
                    currentLanguage: newLanguage.language
                })
            },
        removeUser(state){
                state.user = {}
            }
        }
}
)

export default store;
