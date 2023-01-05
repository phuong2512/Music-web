const song = document.getElementById("song");
const playBtn = document.querySelector(".play-music");
const nextBtn = document.querySelector(".next-music");
const prevBtn = document.querySelector(".prev-music");
const search = document.querySelector(".search-form");
const searchBtn = document.querySelector(".search-button");

let isPlaying = true;
let audioIndex = 0;
const audio = [
  "Waiting for love.mp3",
  "Polish cow.mp3",
  "Blank Space.mp3",
  "SORRY SORRY.mp3",
  "Yoru ni Kakeru.mp3",
];

song.setAttribute("src", `Audio/${audio[audioIndex]}`);
playBtn.addEventListener("click", function () {
  playMusic();
});
nextBtn.addEventListener("click", function () {
  changeMusic("next");
});
prevBtn.addEventListener("click", function () {
  changeMusic("back");
});
searchBtn.disabled = true;
search.addEventListener("keyup", function () {
  searchBtn.disabled = false;
});

function changeMusic(Btn) {
  if (Btn === "next") {
    // next song
    audioIndex++;
    if (audioIndex >= audio.length) {
      audioIndex = 0;
    }
    isPlaying = true;
  } else if (Btn === "back") {
    // previous song
    audioIndex--;
    if (audioIndex < 0) {
      audioIndex = audio.length - 1;
    }
    isPlaying = true;
  }
  song.setAttribute("src", `Audio/${audio[audioIndex]}`);
  playMusic();
}

function playMusic() {
  if (isPlaying) {
    song.play();
    document.querySelector(".play-music").innerHTML =
      '<ion-icon name="pause-outline"></ion-icon>';
    isPlaying = false;
  } else {
    song.pause();
    document.querySelector(".play-music").innerHTML =
      '<ion-icon name="play"></ion-icon>';
    isPlaying = true;
  }
}
