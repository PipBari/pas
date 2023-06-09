function validateLatinInput(event) {
  const textarea = event.target;
  const value = textarea.value;

  textarea.value = value.replace(/[^a-zA-Z]/g, '');
}
