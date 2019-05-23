//jQuery Smooth Scroll
$('.nav a').on('click', function(e) {
  const hash = this.hash;
  console.log(hash);
  if(this.hash != '') {
    e.preventDefault();
    $('html, body').animate(
      {
        scrollTop: $(hash).offset().top
      }, 
      800
    );
  }
});
