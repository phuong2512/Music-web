document.addEventListener("DOMContentLoaded", function () {
  document.querySelector(".insert-form").onsubmit = function () {
    const title = document.querySelector("#title").value;
    const artist = document.querySelector("#artist").value;
    const image = document.querySelector("#image").value;

    if (title == "" || artist == "" || image == "") {
      alert("Hãy nhập đủ thông tin bài hát!");
      return false;
    }
    else{
      alert("Thêm bài hát thành công! Bạn có thể tiếp tục thêm bài hát hoặc trở về trang chủ!")
    }
  };
});
