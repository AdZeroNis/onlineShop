// window.addEventListener("DOMContentLoaded", function () {
//   var storedUsername = localStorage.getItem("username");
//   var storedPassword = localStorage.getItem("password");
//   if (storedPassword == null && storedUsername == null) {
//     window.location.href = ".././php/login.php";
//   }

//   if (storedUsername && storedPassword) {
//     var usernameInput = document.querySelector(
//       "#login .input-box input[type='text']"
//     );
//     var passwordInput = document.querySelector(
//       "#login .input-box input[type='password']"
//     );

//     if (usernameInput && passwordInput) {
//       usernameInput.value = storedUsername;
//       passwordInput.value = storedPassword;
//     }
//   }
// });
document.addEventListener("DOMContentLoaded", function () {
  // Function to load content dynamically
  function loadContent(url) {
    if (url === ".././php/login.php") {
      window.location.href = url;
    } else {
      document.querySelector(".Outlet").style.display = "block";
      fetch(url)
        .then((response) => response.text())
        .then((data) => {
          document.querySelector(".Outlet").innerHTML = data;

          // Execute Chart.js scripts if necessary
          executeChartScripts();
        })
        .catch((error) => console.error("Error loading content:", error));
    }
  }

  // Function to toggle the afterClick class
  function toggleAfterClickClass(clickedItem) {
    document.querySelectorAll(".item").forEach(function (item) {
      item.classList.remove("afterClick");
    });
    clickedItem.classList.add("afterClick");
  }

  // Function to execute Chart.js scripts
  function executeChartScripts() {
    // Existing chart logic here...
  }

  // Load default content
  const defaultLink = document.querySelector(".item");
  loadContent(defaultLink.getAttribute("href"));
  toggleAfterClickClass(defaultLink);

  // Add event listeners for each item
  document.querySelectorAll(".item").forEach(function (item) {
    item.addEventListener("click", function (event) {
      event.preventDefault();
      const targetUrl = item.getAttribute("href");
      loadContent(targetUrl);
      toggleAfterClickClass(item);
    });
  });

  // Load products list when page is loaded
  loadContent('../php/productsList.php');
});
