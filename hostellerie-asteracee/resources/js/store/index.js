import { createStore } from 'vuex'

const storage = {
    // stocker des informations en localstorage
    set: function(key, value) {

      // je transforme la variable en JSON
      const json = JSON.stringify(value);

      //ajouter en storage
      localStorage.setItem(key, json);
    },
    // récupérer des informations en locastorage
    get: function(key) {
      const json = localStorage.getItem(key);
      //transformer une string en JSON
      const value = JSON.parse(json);
      return value;
    },

    //supprimer des informations en localstorage
    unset: function(key) {
      localStorage.removeItem(key);
    }

  };

  export default storage;
