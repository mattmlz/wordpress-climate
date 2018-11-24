let $url = document.location.href;

if( $url.match('testimonials')) {
    // define our colors
    const colors = ["#52A55D","#047713","#F5A623", "#FFFD59"]

    // get all of our images within a specified container element
    let $images = document.querySelectorAll('.testimonial')

    for (let i=0; i < $images.length; i++) {
        // get a random color from list
        let random_color = Math.floor(Math.random()*colors.length)

        // apply random color to current image
        $images[i].style.backgroundColor = colors[random_color];
    }
}