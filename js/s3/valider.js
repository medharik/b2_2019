function valider() {
  var np = document.getElementById("np");
  var np_error = document.getElementById("np_error");
  if (np.value.length < 3) {
    np_error.innerHTML =
      "<i class='fa fa-thumbs-down'></i>nombre de caracteres minimal est 3";
  } else {
    np_error.innerHTML = "<i class='fa fa-thumbs-up'></i>";
  }
}
