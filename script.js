// Form validation
const form = document.getElementById("contact-form");
form.addEventListener("submit", (event) => {
  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const subject = document.getElementById("subject").value.trim();
  const message = document.getElementById("message").value.trim();

  // Check if all fields are filled out
  if (!name || !email || !subject || !message) {
    event.preventDefault();
    alert("Please fill out all fields.");
  }

  // Check if email address is valid
  if (!isValidEmail(email)) {
    event.preventDefault();
    alert("Please enter a valid email address.");
  }
});

// Email validation helper function
function isValidEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}
