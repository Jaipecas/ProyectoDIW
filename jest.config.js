module.exports = {
  // especifica alias para los import
  moduleNameMapper: {
    "^@components/(.*)$": "<rootDir>/resources/assets/js/components/$1", // @componets -> <rootDir>/resources/assets/js/components
    "^@/(.*)$": "<rootDir>/resources/assets/js/$1", // @ -> <rootDir>/resources/assets/js
    "^vue$": "vue/dist/vue.common.js",
  },
  // extensiones de fichero a ser testeados
  moduleFileExtensions: ["js", "vue"],
  // expresion regular usada para ubicar los ficheros de test en el proyecto
  // estaran dentro de la carpeta resources/assets/js/test/ teniendo como nombre
  // al menos un caracter y acabados por .spec.js o .test.js
  testRegex: "resources/assets/js/tests/.+\\.(test|spec)(\\.js)$",
  transform: {
    "^.+\\.js$": "babel-jest", // los ficheros js se trasnforman con babel-jest
    "^.+\\.(vue)$": "vue-jest", // los ficheros vue se trasnforman con vue-jest
  },
};
