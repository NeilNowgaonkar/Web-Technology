function sortArray(e) {
  e.preventDefault();
  var inarray = [];

  inarray.push(document.forms["inputForm"]["Ele[0]"].value);
  inarray.push(document.forms["inputForm"]["Ele[1]"].value);
  inarray.push(document.forms["inputForm"]["Ele[2]"].value);
  inarray.push(document.forms["inputForm"]["Ele[3]"].value);
  inarray.push(document.forms["inputForm"]["Ele[4]"].value);

  let len = inarray.length;

  for (let i = 0; i < len; i++) {
    inarray[i] = parseInt(inarray[i]);
  }

  for (let i = 0; i < len; i++) {
    for (let j = 0; j < len; j++) {
      if (inarray[j] > inarray[j + 1]) {
        let tmp = inarray[j];
        inarray[j] = inarray[j + 1];
        inarray[j + 1] = tmp;
      }
    }
  }

  for (let i = 0; i < len; i++) {
    const FORM = document.getElementById("Ele[" + i + "]");
    FORM.value = inarray[i];
  }
}
