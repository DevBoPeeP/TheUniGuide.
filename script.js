document
  .getElementById("registrationForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    if (password !== confirmPassword) {
      alert("Passwords do not match");
      return false;
    }

    if (password.length < 8) {
      alert("Password must be at least 8 characters long");
      return false;
    }

    // Additional criteria for password can be added here

    // If validation passes, you can submit the form
    this.submit();
  });

document
  .getElementById("institutionSelect")
  .addEventListener("change", function () {
    var institution = this.value;
    var faculties = [];

    switch (institution) {
      case "LASU":
        faculties = [
          "COL[BMS]",
          "COL[DENTISTRY]",
          "FOA",
          "FOL",
          "FOS",
          "FOC",
          "FOEd",
          "FSS",
          "FMS",
          "FOE",
          "FCS",
          "SCA",
          "SCT",
        ];
        break;
      default:
        faculties = [];
    }

    // Using the existing element with the faculties as options
    document.getElementById("facultySelect").innerHTML = "";

    for (let i = 0; i < faculties.length; i++) {
      const option = document.createElement("option");
      option.value = faculties[i];
      option.text = faculties[i];
      document.getElementById("facultySelect").appendChild(option);
    }
  });

// document
//   .getElementById("departmentSelect")
//   .addEventListener("change", function () {
//     var department = this.value;
//     var mapLink = "";

//     switch (department) {
//       case "COM[BMS]":
//         mapLink = "https://maps.app.goo.gl/VMewe7KkTJe6uRkM6";
//         break;
//       case "COM[DENTISTRY]":
//         mapLink = "https://maps.app.goo.gl/VMewe7KkTJe6uRkM6";
//         break;
//       case "FOA":
//         mapLink = "https://maps.app.goo.gl/M6tyhX4GPLwmjCRQ6";
//         break;
//       case "FOL":
//         mapLink = "https://maps.app.goo.gl/TDd8FqnYvsUPE9hf8";
//         break;
//       case "FOS":
//         mapLink = "https://maps.app.goo.gl/sWrGyBT9jpXwmugf7";
//         break;
//       case "FOC":
//         mapLink = "https://maps.app.goo.gl/hKZf4Yy646QJoJoj6";
//         break;
//       case "FOEd":
//         mapLink = "https://maps.app.goo.gl/wwHhfVputEXGy1u6A";
//         break;
//       case "FSS":
//         mapLink = "https://maps.app.goo.gl/HmykrpU3Fn64fhMZ6";
//         break;
//       case "FMS":
//         mapLink = "https://maps.app.goo.gl/K7Z7SGFMAutDKPMY7";
//         break;
//       case "FOE":
//         mapLink = "https://maps.app.goo.gl/yL5ibWXWeH5iu57X7";
//         break;
//       case "FCS":
//         mapLink = "https://maps.app.goo.gl/nynegVSPJN9Q8DEC8";
//         break;
//       case "SCT":
//         mapLink = "https://maps.app.goo.gl/L39TDbNEabxkzJo1A";
//         break;
//       case "SCA":
//         mapLink = "https://maps.app.goo.gl/uwnLs5FMWmJ2tCubA";
//         break;
//       default:
//         mapLink = "";
//     }

//     document.getElementById("mapLink").href = mapLink;
//     console.log(mapLink);
//   });
