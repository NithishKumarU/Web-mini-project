function validateForm() {
    var x = document.forms["myForm"]["year"].value;
    if (x < "2020") {
      alert("Card Expired");
    //   return false;
    }
  }