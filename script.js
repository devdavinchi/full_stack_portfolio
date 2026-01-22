// Background video auto controls handled by HTML autoplay

// Drawing board
const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");
let drawing = false;
let color = "#ffffff";

canvas.addEventListener("mousedown", () => (drawing = true));
canvas.addEventListener("mouseup", () => (drawing = false));
canvas.addEventListener("mousemove", draw);

function draw(e) {
  if (!drawing) return;
  ctx.fillStyle = color;
  ctx.beginPath();
  ctx.arc(e.offsetX, e.offsetY, 5, 0, Math.PI * 2);
  ctx.fill();
}

// Color buttons
const colorBtns = document.querySelectorAll(".clr");
colorBtns.forEach(btn => {
  btn.addEventListener("click", () => {
    color = btn.dataset.c;
  });
});

// Clear canvas
const clearBtn = document.getElementById("clearCanvas");
clearBtn.addEventListener("click", () => {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
});

// Buttons
const downloadBtn = document.querySelector(".download");
const gitBtn = document.querySelector(".git");

downloadBtn.addEventListener("click", () => {
  window.location.href = "your-cv.pdf";
});

gitBtn.addEventListener("click", () => {
  window.open("https://github.com/", "_blank");
});
