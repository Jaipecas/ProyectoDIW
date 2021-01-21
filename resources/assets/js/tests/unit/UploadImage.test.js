import { shallowMount } from "@vue/test-utils";
import UploadImage from "@components/UploadImageComponent";

// Crear una batería de tests (conjunto de test) llamada "Component: UploadImage"
describe("Component: UploadImage", () => {
  test("exists", () => {
    const wrapper = shallowMount(UploadImage, { propsData: { image: "" } });

    expect(wrapper.exists()).toBe(true);
  });

  it("input has input-file class", () => {
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
});
