/* funciones de ayuda para hacer pruebas */

// Post a path con los parámetros indicados
// Basado en: https://stackoverflow.com/questions/133925/javascript-post-request-like-a-form-submit#5533477
// migrado a Vanilla JS
function post(path, parameters) {
  var form = document.createElement("form");
  form.setAttribute("method", "post");
  form.setAttribute("action", path);

  for (var key in parameters) {
    var field = document.createElement("input"); //input element, text
    field.setAttribute("type", "hidden");
    field.setAttribute("name", key);
    field.setAttribute("value", parameters[key]);

    form.appendChild(field);
  }

  document.body.appendChild(form);
  form.submit();
}

export { post };
