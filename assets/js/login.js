function login() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  if (authenticate(username, password)) {
    // Set expiration time 24 hours from now
    var expirationTime = new Date();
    expirationTime.setHours(expirationTime.getHours() + 24);

    // Store authentication status and expiration time in sessionStorage
    sessionStorage.setItem("isLoggedIn", "true");
    sessionStorage.setItem("expirationTime", expirationTime.getTime());

    window.location.href = "/dash";
  } else {
    alert("Wrong username or password");
  }
}

function authenticate(username, password) {
  return username === "snovn" && password === "snovn292973";
}
