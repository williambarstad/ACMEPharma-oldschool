
var bannerImg = new Array();
  // Enter the names of the images below
  bannerImg[0]="no1.jpg";
  bannerImg[1]="no2.jpg";
  bannerImg[2]="no3.jpg";

var newBanner = 0;
var totalBan = bannerImg.length;

function cycleBan() {
  newBanner++;
  if (newBanner == totalBan) {
    newBanner = 0;
  }
  document.banner.src=bannerImg[newBanner];
  // set the time below for length of image display
  // i.e., "4*1000" is 4 seconds
  setTimeout("cycleBan()", 4*1000);
}
window.onload=cycleBan;
