import { shallowMount } from "@vue/test-utils";
import UserData from "@components/UserDataComponent";

// Crear una batería de tests (conjunto de test) llamada "Component: UserData"
describe("Component: UserData", () => {
  /* ***************************************
   * configuración común a todos los test
   * *************************************** */

  // como el componente requere propiedades tengo que crearlas o dará
  // error en el montaje
  const propsData = {
    user: {
      id: 23,
      name: "Cameron Howe",
      email: "cameron.howe@mutiny.com",
      country: "USA",
      favourite_language: "en",
      updated_at: "2021-01-11T19:11:41.000000Z",
    },
    avatar: "",
  };

  // Crear un test unitario llamado "exists" que únicamente comprueba que el componente
  // pueda ser montado
  test("exists", () => {
    // las opciones se pasan como segundo parametro de la funcion.
    // las propiedades se definen con al key propsData (https://vue-test-utils.vuejs.org/api/options.html#propsdata)
    const wrapper = shallowMount(UserData, { propsData });

    /* ***********
     * validación
     * *********** */
    expect(wrapper.exists()).toBe(true);
  });

  // Cada test debe probar una sola cosa
  it("renders user.id", () => {
    const wrapper = shallowMount(UserData, { propsData });

    // text() devuelve una cadena de texto con lo que muestra el componente
    expect(wrapper.text()).toContain(propsData.user.id);
  });

  it("renders user.name", () => {
    const wrapper = shallowMount(UserData, { propsData });

    expect(wrapper.text()).toContain(propsData.user.name);
  });

  it("renders user.country", () => {
    const wrapper = shallowMount(UserData, { propsData });

    expect(wrapper.text()).toContain(propsData.user.country);
  });

  it("renders user.language", () => {
    const wrapper = shallowMount(UserData, { propsData });

    expect(wrapper.text()).toContain(propsData.user.favourite_language);
  });

  it("renders user.updated_at", () => {
    const wrapper = shallowMount(UserData, { propsData });

    let date = new Date(propsData.user.updated_at);
    let dateStr =
      date.getDate().toString().padStart(2, "0") +
      "/" +
      (1 + date.getMonth()).toString().padStart(2, "0") +
      "/" +
      date.getFullYear() +
      " " +
      date.getHours() +
      ":" +
      date.getMinutes();

    expect(wrapper.text()).toContain(dateStr); // esta debería fallar
  });

  it("renders a link to the user.email with user.email as text", () => {
    const wrapper = shallowMount(UserData, { propsData });
    // busco un elemento dentro de componente
    const a = wrapper.find("a");

    expect(a.text()).toBe(propsData.user.email);
    // compruebo uno de los atributos
    expect(a.attributes().href).toBe("mailto:" + propsData.user.email);
  });

  it("each info has data and value", () => {
    const wrapper = shallowMount(UserData, { propsData });
    // findAll devuelve un array, a diferencia de find que sólo devuelve uno
    const info = wrapper.findAll(".info");

    // recorro todos los elementos de cada info
    info.wrappers.forEach((wrapper) => {
      expect(wrapper.find(".data").exists()).toBe(true);
      expect(wrapper.find(".value").exists()).toBe(true);
    });
  });

  it("has upload-image-component component", () => {
    const wrapper = shallowMount(UserData, { propsData });

    // para comprobar que un componente existe busco por la etiqueta name
    expect(
      wrapper.findComponent({ name: "UploadImageComponent" }).exists()
    ).toBe(true);
  });
});
