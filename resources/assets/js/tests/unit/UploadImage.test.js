import { shallowMount } from "@vue/test-utils";
import "regenerator-runtime/runtime.js"; // necesario para babel si vamos a uitilizar async
import UploadImage from "@components/UploadImageComponent";

// Algunos test utilizan el mock de módulo axios. Está definido en la carpeta __mocks__

// Crear una batería de tests (conjunto de test) llamada "Component: UploadImage"
describe("Component: UploadImage", () => {
  // para cada test de la bateria
  beforeEach(() => {
    // El registro de módulos y el estado de los mocks se mantiene enter test, así
    // es que conveniente resetear los módulos y limpiar los mocks
    jest.resetModules();
    jest.clearAllMocks();
  });

  test("exists", () => {
    const wrapper = shallowMount(UploadImage, { propsData: { image: "" } });

    expect(wrapper.exists()).toBe(true);
  });

  it("[T007] input has input-file class", () => {
    const wrapper = shallowMount(UploadImage, { propsData: { image: "" } });
    const input = wrapper.find("input");

    expect(input.classes()).toContain("input-file"); // el elemento tiene una determinada clase CSS asignada
  });

  it("if image exists => img label does not exists", () => {
    const wrapper = shallowMount(UploadImage, { propsData: { image: "" } });

    expect(wrapper.find("img").exists()).toBe(false);
  });

  it("if image exists => img label exists", () => {
    const wrapper = shallowMount(UploadImage, {
      propsData: { image: "fakeImage.png" }, // la imagen no existe en realidad
    });

    expect(wrapper.find("img").exists()).toBe(true);
  });

  it("if image exists => opacity != 0", () => {
    const wrapper = shallowMount(UploadImage, {
      propsData: { image: "fakeImage.png" }, // la imagen no existe en realidad
    });
    const input = wrapper.find(".dropbox");

    expect(input.classes("opacityon")).toBe(true); // el elemento tiene una determinada clase CSS asignada
  });

  it("takes the file from the event", () => {
    const wrapper = shallowMount(UploadImage, {
      propsData: { image: "fakeImage.png" },
    });

    const file = { size: 1000, type: "image/png", name: "avatar.png" };
    const event = {
      target: {
        files: [file],
      },
    };

    expect(wrapper.vm.takeFile(event)).toEqual(file);
  });

  // utilizo async para que devuelva una promesa y poder usar await
  it("[T009] if avatar changes => emit event avatar-change", async () => {
    // construyo el objeto fake imagen que utilizo para la prueba
    const imageFile = new Blob(["This is an image fake"], {
      type: "image/png",
    });

    // creo un mock que espia el método takeFile de UploadImage
    // ese mock sólo devuelve la imagen
    jest
      .spyOn(UploadImage.methods, "takeFile")
      .mockImplementation(() => imageFile);
    // monto el componente
    const wrapper = shallowMount(UploadImage, {
      propsData: { image: "fakeImage.png" },
    });

    /* v1, ya obsoleta */
    // creo un mock que devuelve la imagen
    // const takeFile = jest.fn().mockReturnValueOnce(imageFile);
    // sustituyo el método takeFile por el mock
    // wrapper.setMethods({ takeFile: takeFile });

    // await hace que el programa espere hasta que se procese el trigger
    await wrapper.find("input").trigger("change");
    // compruebo que se haya emitido el evento avatar-change
    expect(wrapper.emitted("avatar-change")).toBeTruthy();
    // ademś compruebo que el evento lleva como parametro el path a la imagen
    // emitted devuelve un array por cada uno de los eventos de ese tipo emitidos
    // como en este caso solo hemos emitido uno [0]
    // por cada entrada hay un array con los posible parámetros. Como solo hay uno [0]
    expect(wrapper.emitted("avatar-change")[0][0]).toBe("\\path\\to\\image");
  });
});
