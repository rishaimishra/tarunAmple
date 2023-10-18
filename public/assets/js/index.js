// Cart right slide code 
function toggleSidebarCart() {
  var sidebarCart = document.getElementById("sidebarCart");
  sidebarCart.style.right = sidebarCart.style.right === "0px" ? "-400px" : "0px"; /* Change left to right */
}

// card sidebar design
$("#sideTab1").click(function () {
  $("#sideTab-content1").show();
  $("#sideTab-content2").hide();
  $("#sideTab-content3").hide();
  $("#sideTab1").addClass('active');
  $("#sideTab2").removeClass('active');
  $("#sideTab3").removeClass('active');
});
$("#sideTab2").click(function () {
  $("#sideTab-content2").show();
  $("#sideTab-content1").hide();
  $("#sideTab-content3").hide();
  $("#sideTab1").removeClass('active');
  $("#sideTab2").addClass('active');
  $("#sideTab3").removeClass('active');
});
$("#sideTab3").click(function () {
  $("#sideTab-content3").show();
  $("#sideTab-content1").hide();
  $("#sideTab-content2").hide();
  $("#sideTab1").removeClass('active');
  $("#sideTab2").removeClass('active');
  $("#sideTab3").addClass('active');
});




// $("#memberSignUp").click(function () {
//   $("#memberSignInContent").hide();
//   $("#memberSignUpContent").show();
//   $("#memberSignUp").addClass('active');
//   $("#memberSignIn").removeClass('active');
// });

// $("#vendorSignIn").click(function () {
//   $("#vendorSignUpContent").hide();
//   $("#vendorSignInContent").show();
//   $("#vendorSignUp").removeClass('active');
//   $("#vendorSignIn").addClass('active');
// });
// $("#vendorSignUp").click(function () {
//   $("#vendorSignInContent").hide();
//   $("#vendorSignUpContent").show();
//   $("#vendorSignUp").addClass('active');
//   $("#vendorSignIn").removeClass('active');
// });



// tab button active class remove and add
function openTab(tabId) {
  // Get all tab buttons and content
  var tabButtons = document.getElementsByClassName("tab-button");
  var tabContents = document.getElementsByClassName("tab-content");
  // Remove the 'active' class from all tab buttons and content
  for (var i = 0; i < tabButtons.length; i++) {
    tabButtons[i].classList.remove("tab-active");
    tabContents[i].classList.remove("tab-active");
  }
  // Add the 'active' class to the clicked tab button and content
  document.getElementById(tabId).classList.add("tab-active");
  event.currentTarget.classList.add("tab-active");
}





// Function to open the default tab
function openDefaultTab() {
  var defaultTab = document.getElementById("tab1");
  defaultTab.style.display = "block";
}
// Function to open a specific tab
function openTab(tabId) {
  // Get all elements with class "tab-content" and hide them
  var tabContents = document.getElementsByClassName("tab-content");
  for (var i = 0; i < tabContents.length; i++) {
    tabContents[i].style.display = "none";
  }
  // Show the clicked tab content
  document.getElementById(tabId).style.display = "block";
}
// Open the default tab when the page loads
window.onload = openDefaultTab;

