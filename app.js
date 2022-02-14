function copyFunction() {
  /* Get the text field */
  var copyText = document.getElementById("slug");

  /* Select the text field */
  copyText.select();

  /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);
  document.getElementById("success-message").innerHTML = `
  <div id="success-message" class="alert alert-success" role="alert">
  Successfully copied ${copyText.value}
    </div>
  `;
}
