function countMe(element, delay, speed) {
  if (delay !== undefined && speed !== undefined) {
    let count = 0;
    let targetValue = parseInt(element.getAttribute("data-target")) || 0; // Use data-target attribute for target value

    // Start counting after the delay
    setTimeout(() => {
      let intervalId = setInterval(() => {
        count++;
        element.textContent = count;

        // Stop the interval when count matches the target value
        if (count >= targetValue) {
          clearInterval(intervalId);
        }
      }, speed);
    }, delay);
  } else {
    alert("Warning!\ndelay and speed can't be empty!");
  }
}

window.onload = () => {
  // Get elements by their IDs
  let num1 = document.getElementById("num1");
  let num2 = document.getElementById("num2");
  let num3 = document.getElementById("num3");

  // Set the target values in a data attribute
  num1.setAttribute("data-target", "");
  num2.setAttribute("data-target", "3");
  num3.setAttribute("data-target", "15");

  // Call countMe with the respective delay and speed
  countMe(num1, 40, 65);
  countMe(num2, 30, 30);
  countMe(num3, 40, 50);
};
