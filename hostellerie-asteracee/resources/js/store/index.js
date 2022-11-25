const store = {
    state:{
        user: [
                {
                    email: '',
                    token: ''
                }
        ]
    },
    getters:{
        oneUser(state){
            return state.user;
        }
    },
    mutations:{
        addUser(state, newUser){
            // if(newUser.token !== undefined && newUser.email == 'string'){
                state.user.push({
                    email: newUser.email,
                    token: newUser.token
                })
            },
            removeUser(state){

            }
        }
}


export default store;
